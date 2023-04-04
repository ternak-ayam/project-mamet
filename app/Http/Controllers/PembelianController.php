<?php

namespace App\Http\Controllers;

use App\Models\Days;
use App\Models\Kelas;
use App\Models\Pembelian;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = Kelas::findOrFail($id);
        $days = Days::all();
        $times = Time::all();
        return view('checkout', compact('data', 'days', 'times'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'user_id'     => 'required',
                'kelas_id'   => 'required',
                'bukti_pembayaran'     => 'required|image|mimes:png,jpg,jpeg,pdf',
                'sertifikat' => 'nullable'
            ]);
            //upload image
            $image = $request->file('bukti_pembayaran');
            $image->storeAs('public/bukti_pembayaran', $image->hashName());

            $pembelian = Pembelian::create([
                'user_id'     => $request->user_id,
                'kelas_id'   => $request->kelas_id,
                'bukti_pembayaran'     => $image->hashName(),
                'sertifikat'     => '-',
            ]);
            
            $kelas = Kelas::find($request->kelas_id);
            $kelas->decrement('kuota',1);
            $kelas->save();


            if ($pembelian) {
                if ($pembelian->user->role == 'nonuser') {
                    return redirect()->route('dashboard-nonuser')->with(['success' => 'Data Berhasil Disimpan!']);
                } elseif ($pembelian->user->role == 'user') {
                    //redirect dengan pesan sukses
                    return redirect()->route('dashboard-user')->with(['success' => 'Data Berhasil Disimpan!']);
                }
            } else {
                //redirect dengan pesan error
                return redirect()->route('checkout')->with(['error' => 'Data Gagal Disimpan!']);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian, $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pembelian, $id)
    {
        $data = Pembelian::findOrFail($id);
        return view('admin.sertifikat.add-sertifikat', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembelian $pembelian, $id)
    {
        try {
            $this->validate($request, [
                'user_id' => 'required',
                'kelas_id' => 'required',
                'sertifikat'     => 'required|mimes:png,jpg,jpeg,pdf',
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        //
    }
}
