<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Pembelian;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TopManajemenController extends Controller
{
    public function detail_member($id)
    {
        $users = Pembelian::where('kelas_id', $id)->with('kelas', 'days', 'times')->get();
        $data = Kelas::findOrFail($id);

        // dd($users);
        return view('topmanajemen.data-kelas.detail', compact('users', 'data'));
    }
    public function index()
    {
        $datakelas = Kelas::all();
        // dd($datakelas);
        return view('topmanajemen.data-kelas.dashboard-topmanajemen', compact('datakelas'));
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
        return view('topmanajemen.list-user.add', compact('role'));
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
    public function update_payment(Request $request, $id){
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
                    return redirect()->route('detail-data-kelas-topmanajemen', $request->kelas_id)->with(['success' => 'Bukti Pembayaran Berhasil Diapprove!']);
                }
                if ($request->status_pembayaran == "0") {
                    //redirect dengan pesan sukses
                    return redirect()->route('detail-data-kelas-topmanajemen', $request->kelas_id)->with(['success' => 'Bukti Pembayaran Berhasil Ditolak!']);
                }
            } else {
                //redirect dengan pesan error
                return redirect()->route('detail-data-kelas-topmanajemen', $request->kelas_id)->with(['error' => 'Data Gagal Diupdate!']);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }





    public function edit_sertif(Pembelian $pembelian, $id)
    {
        $data = Pembelian::findOrFail($id);
        return view('topmanajemen.data-kelas.add-sertif', compact('data'));
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
                return redirect()->route('detail-data-kelas-topmanajemen', $request->kelas_id)->with(['success' => 'Data Berhasil Diupdate!']);
            } else {
                //redirect dengan pesan error
                return redirect()->route('detail-data-kelas-topmanajemen', $request->kelas_id)->with(['error' => 'Data Gagal Diupdate!']);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function editrole(User $user, $id)
    {
        $data = User::findorFail($id);
        $role = User::groupBy('role')
            ->where('role', 'like', "%" . 'user' . "%")
            ->orWhere('role', 'like', "%" . 'nonuser' . "%")
            ->get();
        return view('topmanajemen.list-user.edit-role', compact('data', 'role'));
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






    // data-peserta
    public function detail_member_topmanajemen($id)
    {
        $users = Pembelian::where('user_id', $id)->with('kelas')->get();
        $data = User::findOrFail($id);
        return view('topmanajemen.peserta-kelas.detail', compact('users', 'data'));
    }
    public function index_topmanajemen()
    {
        $datauser = User::where('role', 'user')->orWhere('role', 'nonuser')->orWhere('role', 'admin')->orWhere('role', 'topmanajemen')->get();
        // dd($datakelas);
        return view('topmanajemen.peserta-kelas.index', compact('datauser'));
    }
    // public function index_list_user_topmanajemen($id)
    // {
    //     $users = Pembelian::where('user_id', $id)->with('kelas', 'days', 'times')->get();
    //     $data = User::findOrFail($id);
    //     // dd($users);
    //     return view('topmanajemen.peserta-kelas.detail', compact('users', 'data'));
    // }
    public function cari_topmanajemen(Request $request)
    {
        try {
            $cari = $request->keyword;
            $filter = $request->filter;
            $datauser = User::where(function ($query) use ($cari) {
                $query->where('name', 'like', "%" . $cari . "%")
                    ->orWhere('email', 'LIKE', '%' . $cari . '%');
            })->where(function ($query) {
                $query->where('role', 'user')->orWhere('role', 'nonuser')->orWhere('role', 'admin')->orWhere('role', 'topmanajemen');
            })->where(function ($query) use ($filter) {
                if ($filter != "all") {
                    $query->where('role', $filter);
                }
            })
                ->get();
            return view('topmanajemen.peserta-kelas.index', compact('datauser'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create_topmanajemen()
    {
        $role = User::groupBy('role')
            ->where('role', 'like', "%" . 'user' . "%")
            ->orWhere('role', 'like', "%" . 'nonuser' . "%")
            ->get();
        return view('topmanajemen.list-user.add', compact('role'));
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function store_topmanajemen(Request $request)
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
    public function update_payment_topmanajemen(Request $request, $id){
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
                    return redirect()->route('detail-peserta-kelas-topmanajemen', $request->kelas_id)->with(['success' => 'Bukti Pembayaran Berhasil Diapprove!']);
                }
                if ($request->status_pembayaran == "0") {
                    //redirect dengan pesan sukses
                    return redirect()->route('detail-peserta-kelas-topmanajemen', $request->kelas_id)->with(['success' => 'Bukti Pembayaran Berhasil Ditolak!']);
                }
            } else {
                //redirect dengan pesan error
                return redirect()->route('detail-peserta-kelas-topmanajemen', $request->kelas_id)->with(['error' => 'Data Gagal Diupdate!']);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }





    public function edit_sertif_topmanajemen(Pembelian $pembelian, $id)
    {
        $data = Pembelian::findOrFail($id);
        return view('topmanajemen.peserta-kelas.add-sertif', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update_sertif_topmanajemen(Request $request, Pembelian $pembelian, $id)
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
                return redirect()->route('detail-peserta-kelas-topmanajemen', $request->kelas_id)->with(['success' => 'Data Berhasil Diupdate!']);
            } else {
                //redirect dengan pesan error
                return redirect()->route('detail-peserta-kelas-topmanajemen', $request->kelas_id)->with(['error' => 'Data Gagal Diupdate!']);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function editrole_topmanajemen(User $user, $id)
    {
        $data = User::findorFail($id);
        $role = User::groupBy('role')
            ->where('role', 'like', "%" . 'user' . "%")
            ->orWhere('role', 'like', "%" . 'nonuser' . "%")
            ->get();
        return view('topmanajemen.list-user.edit-role', compact('data', 'role'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function updaterole_topmanajemen(Request $request, $id)
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
    public function destroy_topmanajemen($id)
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
