<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
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
        $data = Pembelian::with(['user', 'kelas'])->latest()->get();
        return view('admin.dashboard-admin', compact('data'));
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
