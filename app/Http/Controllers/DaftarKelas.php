<?php

namespace App\Http\Controllers;

use App\Models\Days;
use App\Models\Kelas;
use App\Models\Pembelian;
use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DaftarKelas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function peserta($id)
    {
        $datakelas = Pembelian::where('kelas_id', $id)->with('kelas', 'user', 'days', 'times')->get();
        $namakelas = Kelas::where('id', $id)->first();
        return view('admin.daftar-kelas', compact('datakelas', 'namakelas'));
    }
    public function index()
    {
        $datakelas = Pembelian::with('kelas', 'user', 'days', 'times')->get();
        // dd($datakelas);
        return view('admin.dashboard-admin', compact('datakelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $days = Days::all();
        $times = Time::all();
        return view('admin.add-kelas', compact('days','times'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        //validate form
        $this->validate($request, [
            'nama_kelas'  => 'required',
            'deskripsi'   => 'required',
            'harga'       => 'required',
            'kuota'   => 'required',
            'gambar_kelas' => 'required|image|mimes:png,jpg,jpeg,pdf'
        ]);
        //upload image
        $image = $request->file('gambar_kelas');
        $image->storeAs('public/gambar_kelas', $image->hashName());

        //create post
        Kelas::create([
            'nama_kelas'            => $request->nama_kelas,
            'deskripsi'             => $request->deskripsi,
            'harga'                 => $request->harga,
            'gambar_kelas'          => $image->hashName(),
        ]);
        $kelas = new Kelas();
        $kelas->kuota = request('kuota');
        $kelas->save();
        //redirect to index
        return redirect()->route('dashboard-admin.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
    public function edit(Kelas $kelas, $id)
    {
        $data = Kelas::findOrFail($id);
        return view('admin.edit-kelas', compact('data'));
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
                ->route('dashboard-admin.index')
                ->with([
                    'success' => 'Data Berhasil Diubah!'
                ]);
        }
         else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Ada kesalahan, coba lagi'
                ]);
        }

        // return redirect()->route('daftar-kelas.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        Storage::disk('local')->delete('public/gambar_kelas/' . $kelas->gambar_kelas);
        $kelas->delete();

        if ($kelas) {
            return redirect()
                ->route('dashboard-admin.index')
                ->with([
                    'success' => 'Data berhasil dihapus!'
                ]);
        } else {
            return redirect()
                ->route('dashboard-admin.index')
                ->with([
                    'error' => 'Ada beberapa kesalahan, mohon ulang lagi'
                ]);
        }
    }
}
