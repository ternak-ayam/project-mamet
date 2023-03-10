<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pembelian;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $kelas = Kelas::all();
        // $namakelas = [];
        // foreach ($kelas as $item => $key) {
        //     $namakelas[] = $key->nama_kelas;
        // }
        // $kelasobject = collect($namakelas);
        // $kelascollection = json_encode($kelasobject);
        // $kelas_data = str_replace([':', '\\', '/', '*', '[', ']'], ' ', $kelascollection);


        // $kelas = Kelas::all();
        // $users = [];
        // $nonusers = [];
        // foreach ($kelas as $values) {
        //     $users[] = Pembelian::with(['kelas', 'user'])->where('kelas_id', $values->id)
        //     ->whereHas('user', function($query){
        //         $query->where('role', 'user');
        //     })
        //     ->count();
        //     $nonusers[] = Pembelian::with(['kelas', 'user'])->where('kelas_id', $values->id)
        //     ->whereHas('user', function($query){
        //         $query->where('role', 'nonuser');
        //     })
        //     ->count();
        // }
        // $usersobject = collect($users);
        // $collectusers = json_encode($usersobject);
        // $users_data = str_replace([':', '\\', '/', '*', '[', ']'], ' ', $collectusers);


        // $nonusersobject = collect($nonusers);
        // $collectnonusers = json_encode($nonusersobject);
        // $nonusers_data = str_replace([':', '\\', '/', '*', '[', ']'], ' ', $collectnonusers);

        // $bothusers = array_merge($users, $nonusers);

        // $data = Pembelian::with(['user', 'kelas'])->latest()->get();
        // $data_member =  User::where('role', 'user')->get();
        // $data_nonmember =  User::where('role', 'nonuser')->get();
        // $data_peserta =  Pembelian::where('status_pembayaran', 1)->get();
        $datakelas = Kelas::all();

        return view('admin.dashboard-admin', compact('datakelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = Pembelian::where('id', '=', $id)->get();

            foreach ($data as $datas) {
                $datas->status_pembayaran = $request->status_pembayaran;
                $datas->save();
            }
            if ($data) {
                if ($request->status_pembayaran == "1") {
                    //redirect dengan pesan sukses
                    return redirect()->route('dashboard-admin.index')->with(['success' => 'Bukti Pembayaran Berhasil Diapprove!']);
                }
                if ($request->status_pembayaran == "0") {
                    //redirect dengan pesan sukses
                    return redirect()->route('dashboard-admin.index')->with(['success' => 'Bukti Pembayaran Berhasil Ditolak!']);
                }
            } else {
                //redirect dengan pesan error
                return redirect()->route('dashboard-admin.index')->with(['error' => 'Data Gagal Diupdate!']);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
