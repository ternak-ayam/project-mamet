<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ListMemberController extends Controller
{
    public function detail_member($id)
    {
        $detailgambar = Pembelian::where('user_id', $id)->with('kelas', 'days', 'times')->get();
        // dd($gambarkelas);
        return view('admin.list-user.detail', compact('detailgambar'));
    }
    public function index()
    {
        $gambarkelas = User::where('role', 'user')->orWhere('role', 'nonuser')->get();
        // dd($gambarkelas);
        return view('admin.list-user.index', compact('gambarkelas'));
    }
    public function cari(Request $request)
    {
        try {
            $cari = $request->keyword;
            $gambarkelas = User::where(function ($query) use ($cari) {
                $query->where('name', 'like', "%" . $cari . "%")
                    ->orWhere('email', 'LIKE', '%' . $cari . '%');
            })->where(function ($query) {
                $query->where('role', 'user')->orWhere('role', 'nonuser');
            })
                ->get();
            return view('admin.list-user.index', ['gambarkelas' => $gambarkelas]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create()
    {
        $role = User::groupBy('role')
            ->where('role', 'like', "%" . 'user' . "%")
            ->orWhere('role', 'like', "%" . 'nonuser' . "%")
            ->get();
        return view('admin.list-user.add', compact('role'));
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function store(Request $request)
    {
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
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'nama_orangtua' => $request->nama_orangtua,
                'no_telp' =>  $request->no_telp,
                'alamat' =>  $request->alamat,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($request->password),
                'role' =>  $request->role,
            ]);
            return redirect()->route('list-member')->with(['success' => 'Akun Berhasil Dibuat!']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

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
    // public function edit(GambarKegiatanKelas $gambarKegiatanKelas, $id)
    // {
    //     $data = GambarKegiatanKelas::findOrFail($id);
    //     return view('admin.gambar-kegiatan-kelas.edit', compact('data'));
    // }
    public function editrole(User $user, $id)
    {
        $data = User::findorFail($id);
        $role = User::groupBy('role')
            ->where('role', 'like', "%" . 'user' . "%")
            ->orWhere('role', 'like', "%" . 'nonuser' . "%")
            ->get();
        return view('admin.list-user.edit-role', compact('data', 'role'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function updaterole(Request $request, $id)
    {

        try {
            $this->validate($request, [
                'name' => 'required', 'string', 'max:255',
                'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
                'nama_orangtua' => 'required', 'string', 'max:255',
                'no_telp' => 'required', 'string', 'max:255',
                'alamat' => 'required', 'string', 'max:255',
                'role' => 'required',
            ]);
            // dd($request);

            $user = User::findOrFail($id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'nama_orangtua' => $request->nama_orangtua,
                'no_telp' =>  $request->no_telp,
                'alamat' =>  $request->alamat,
                'email_verified_at' => Carbon::now(),
                'role' =>  $request->role,
            ]);
            return redirect()->route('list-member')->with(['success' => 'Role Berhasil Diubah!']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    // public function update(Request $request, $id)
    // {
    //     try {
    //         $this->validate($request, [
    //             'jenis_kelas_id'  => 'required',
    //             'images' => 'required'
    //         ]);
    //         $gambarKegiatanKelas = GambarKegiatanKelas::findOrFail($id);

    //         if ($request->hasFile('images')) {
    //             $files = $request->file('images');
    //             foreach ($files as $file) {
    //                 $filename = $file->hashName();
    //                 $request['gambar']  = $filename;
    //                 Storage::disk('local')->delete('public/gambar_kegiatan_kelas/' . $gambarKegiatanKelas->gambar);

    //                 $file->storeAs('public/gambar_kegiatan_kelas', $file->hashName());
    //                 $gambarKegiatanKelas->update($request->all());
    //             }
    //         }
    //         return redirect()->route('gambar-kegiatan-kelas')->with(['success' => 'Data Berhasil Disimpan!']);
    //     } catch (\Exception $e) {
    //         return $e->getMessage();
    //     }

    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        if ($user) {
            return redirect()
                ->route('list-member')
                ->with([
                    'success' => 'Data berhasil dihapus!'
                ]);
        } else {
            return redirect()
                ->route('list-member')
                ->with([
                    'error' => 'Ada beberapa kesalahan, mohon ulang lagi'
                ]);
        }
    }
}
