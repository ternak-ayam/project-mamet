<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pembelian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PesertaKelasController extends Controller
{
    public function detail_member($id)
    {
        $users = Pembelian::where('user_id', $id)->with('kelas', 'days', 'times')->get();
        $data = User::findOrFail($id);
        // dd($users);
        return view('admin.peserta-kelas.detail', compact('users', 'data'));
    }
    public function index()
    {
        $datauser = User::where('role', 'user')->orWhere('role', 'nonuser')->get();
        // dd($datakelas);
        return view('admin.peserta-kelas.index', compact('datauser'));
    }
    public function cari(Request $request)
    {
        try {
            $cari = $request->keyword;
            $filter = $request->filter;
            $datauser = User::where(function ($query) use ($cari) {
                $query->where('name', 'like', "%" . $cari . "%")
                    ->orWhere('email', 'LIKE', '%' . $cari . '%');
            })->where(function ($query) {
                $query->where('role', 'user')->orWhere('role', 'nonuser');
            })->where(function ($query) use ($filter) {
                if ($filter != "all") {
                    $query->where('role', $filter);
                }
            })
                ->get();
            return view('admin.peserta-kelas.index', compact('datauser'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     $role = User::groupBy('role')
    //         ->where('role', 'like', "%" . 'user' . "%")
    //         ->orWhere('role', 'like', "%" . 'nonuser' . "%")
    //         ->get();
    //     return view('admin.list-user.add', compact('role'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     try {
    //         $this->validate($request, [
    //             'name' => 'required', 'string', 'max:255',
    //             'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
    //             'nama_orangtua' => 'required', 'string', 'max:255',
    //             'no_telp' => 'required', 'string', 'max:255',
    //             'alamat' => 'required', 'string', 'max:255',
    //             'password' => 'required', 'string', 'min:8', 'confirmed',
    //             'role' => 'required',
    //         ]);
    //         User::create([
    //             'name' => $request->name,
    //             'email' => $request->email,
    //             'nama_orangtua' => $request->nama_orangtua,
    //             'no_telp' =>  $request->no_telp,
    //             'alamat' =>  $request->alamat,
    //             'email_verified_at' => Carbon::now(),
    //             'password' => Hash::make($request->password),
    //             'role' =>  $request->role,
    //         ]);
    //         return redirect()->route('list-member')->with(['success' => 'Akun Berhasil Dibuat!']);
    //     } catch (\Exception $e) {
    //         return $e->getMessage();
    //     }
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit(Kelas $kelas, $id)
    {
        $data = Kelas::findOrFail($id);
        return view('admin.data-kelas.edit', compact('data'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, $id)
    {
        if ($request->file('gambar_kelas') == "") {
            //validate form
            $this->validate($request, [
                'nama_kelas'     => 'required',
                'deskripsi'     => 'required',
                'harga'   => 'required',
                'kuota'   => 'required',
            ]);
        } else {
            //validate form
            $this->validate($request, [
                'nama_kelas'     => 'required',
                'deskripsi'     => 'required',
                'harga'   => 'required',
                'kuota'   => 'required',
                'gambar_kelas' => 'required|image|mimes:png,jpg,jpeg,pdf'
            ]);
        }

        $kelas = Kelas::findOrFail($id);

        // dd($request->kuota);
        if ($request->file('gambar_kelas') == "") {

            $kelas->update([
                'nama_kelas'     => $request->nama_kelas,
                'deskripsi'     => $request->deskripsi,
                'harga'         => $request->harga,
                'kuota'         => $request->kuota,
            ]);
            $kelas->kuota = request('kuota');
            $kelas->save();
        } else {

            //hapus old image
            Storage::disk('local')->delete('public/gambar_kelas/' . $kelas->gambar_kelas);

            //upload new image
            $image = $request->file('gambar_kelas');
            $image->storeAs('public/gambar_kelas', $image->hashName());

            $kelas->update([
                'nama_kelas'     => $request->nama_kelas,
                'deskripsi'      => $request->deskripsi,
                'harga'          => $request->harga,
                'kuota'          => $request->kuota,
                'gambar_kelas'   => $image->hashName(),
            ]);
            $kelas->kuota = request('kuota');
            $kelas->save();
        }
        //redirect to index
        if ($kelas) {
            return redirect()
                ->route('data-kelas')
                ->with([
                    'success' => 'Data Berhasil Diubah!'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Ada kesalahan, coba lagi'
                ]);
        }
    }
    public function update_payment(Request $request, $id)
    {
        // dd($request);
        try {
            $data = Pembelian::where('id', '=', $id)->get();

            foreach ($data as $datas) {
                $datas->status_pembayaran = $request->status_pembayaran;
                $datas->save();
            }
            if ($data) {
                if ($request->status_pembayaran == "1") {
                    //redirect dengan pesan sukses
                    return redirect()->route('detail-data-kelas', $request->kelas_id)->with(['success' => 'Bukti Pembayaran Berhasil Diapprove!']);
                }
                if ($request->status_pembayaran == "0") {
                    //redirect dengan pesan sukses
                    return redirect()->route('detail-data-kelas', $request->kelas_id)->with(['success' => 'Bukti Pembayaran Berhasil Ditolak!']);
                }
            } else {
                //redirect dengan pesan error
                return redirect()->route('detail-data-kelas', $request->kelas_id)->with(['error' => 'Data Gagal Diupdate!']);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }





    public function edit_sertif(Pembelian $pembelian, $id)
    {
        $data = Pembelian::findOrFail($id);
        return view('admin.data-kelas.add-sertif', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update_sertif(Request $request, Pembelian $pembelian, $id)
    {
        try {
            $this->validate($request, [
                'user_id' => 'required',
                'kelas_id' => 'required',
                'days_id' => 'required',
                'times_id' => 'required',
                'sertifikat'     => 'required|mimes:image/png,png,jpg,jpeg,pdf',
                'bukti_pembayaran' => 'required',
            ]);
            //get data Blog by ID
            $pembelian = Pembelian::findOrFail($id);

            // //hapus old image
            Storage::disk('local')->delete('public/bukti_pembayaran/' . $pembelian->bukti_pembayaran);

            // upload new image
            $sertifikat = $request->file('sertifikat');
            $sertifikat->storeAs('public/sertifikat', $sertifikat->hashName());

            $pembelian->update([
                'user_id'           => $request->user_id,
                'kelas_id'          => $request->kelas_id,
                'days_id'          => $request->days_id,
                'times_id'          => $request->times_id,
                'sertifikat'        => $sertifikat->hashName(),
                'bukti_pembayaran'  => $request->bukti_pembayaran,
            ]);
            if ($pembelian) {
                //redirect dengan pesan sukses
                return redirect()->route('dashboard-admin.index')->with(['success' => 'Data Berhasil Diupdate!']);
            } else {
                //redirect dengan pesan error
                return redirect()->route('dashboard-admin.index')->with(['error' => 'Data Gagal Diupdate!']);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        Storage::disk('local')->delete('public/gambar_kelas/' . $kelas->gambar_kelas);
        $kelas->delete();
        if ($kelas) {
            return redirect()
                ->route('data-kelas')
                ->with([
                    'success' => 'Data berhasil dihapus!'
                ]);
        } else {
            return redirect()
                ->route('data-kelas')
                ->with([
                    'error' => 'Ada beberapa kesalahan, mohon ulang lagi'
                ]);
        }
    }
}
