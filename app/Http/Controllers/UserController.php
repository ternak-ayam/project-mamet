<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $data = Pembelian::where('user_id', auth()->user()->id)->with(['user', 'kelas'])->latest()->get();
        return view('user.dashboard-user', compact('data'));
    }
    public function profile($id)
    {
        $data = User::findorFail($id);
        return view('user.profile', compact('data'));
    }
    public function profile_update(Request $request, $id)
    {
        // dd($request);
        try {
            $this->validate($request, [
                'name' => 'required', 'string', 'max:255',
                'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
                'nama_orangtua' => 'required', 'string', 'max:255',
                'no_telp' => 'required', 'string', 'max:255',
                'alamat' => 'required', 'string', 'max:255',
                'password' => 'required', 'string', 'min:8', 'confirmed',
                'role' => 'required',
            ]);
            // dd($request);
            if (User::where('email', $request->email)->first() != null) {
                if ($request->email == auth()->user()->email) {
                    $user = User::findOrFail($id);
                    $user->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'nama_orangtua' => $request->nama_orangtua,
                        'no_telp' =>  $request->no_telp,
                        'alamat' =>  $request->alamat,
                        'email_verified_at' => Carbon::now(),
                        'password' => Hash::make($request->password),
                        'role' =>  $request->role,
                    ]);
                    return redirect()->route('dashboard-user')->with(['success' => 'Profile berhasil diubah!']);

                }
                return redirect()->route('edit-profile',$id)->with(['error' => 'Maaf Email Sudah Ada Yang Punya!']);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function jadwal_kelas()
    {
        $data = Pembelian::where(function ($query) {
            $query->where('user_id', '=', auth()->user()->id);
        })
            ->with(['user', 'kelas', 'days', 'times'])
            ->latest()->get();
        return view('user.jadwal-kelas', compact('data'));
    }





    public function cetakPdf($id)
    {
        // $data = Pembelian::where('user_id', auth()->user()->id)->with(['user','kelas'])->get();
        // return view('user.cetak_pdf');
        $data = Pembelian::with('user', 'kelas')->findOrFail($id);
        $pdf = PDF::loadview('user.cetak_pdf', ['data' => $data]);
        return $pdf->download('Bukti-Pembayaran.pdf');
    }






    public function cetakSertifikat($id)
    {
        $data = Pembelian::with('kelas')->findOrFail($id);
        $file = 'public/sertifikat/' . $data->sertifikat;
        $path = pathinfo($file);
        $file_name = 'Sertifikat ' . $data->kelas->nama_kelas . '.' . $path['extension'];

        return Storage::download($file, $file_name);
    }


    public function updatebpview($id)
    {
        $data = Pembelian::with('user', 'kelas', 'days', 'times')->findOrFail($id);
        return view('user.update_bukti_pembayaran', compact('data'));
    }
    public function updateBuktiPembayaran(Request $request, $id)
    {
        try {
            $data = Pembelian::where('id', '=', $id)->get();

            $this->validate($request, [
                'bukti_pembayaran'     => 'required|image|mimes:png,jpg,jpeg,pdf'
            ]);
            foreach ($data as $item) {
                Storage::disk('local')->delete('public/bukti_pembayaran/' . $item->bukti_pembayaran);
            }
            //upload image
            $image = $request->file('bukti_pembayaran');
            $image->storeAs('public/bukti_pembayaran', $image->hashName());

            foreach ($data as $datas) {
                $datas->bukti_pembayaran = $image->hashName();
                $datas->status_pembayaran = '-';
                $datas->save();
            }
            if ($data) {
                return redirect()->route('dashboard-user')->with(['success' => 'Bukti Pembayaran berhasil Diupdate!']);
            } else {
                //redirect dengan pesan error
                return redirect()->route('dashboard-user')->with(['error' => 'Data Gagal Diupdate!']);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
