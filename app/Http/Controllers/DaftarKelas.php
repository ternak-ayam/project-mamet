<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
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
    public function index()
    {
        $datakelas = Kelas::all();
        return view('admin.daftar-kelas', compact('datakelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-kelas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama_kelas'  => 'required',
            'deskripsi'   => 'required',
            'harga'       => 'required',
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

        //redirect to index
        return redirect()->route('daftar-kelas.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        //validate form
        $this->validate($request, [
            'nama_kelas'     => 'required',
            'deskripsi'     => 'required',
            'harga'   => 'required',
            'gambar_kelas' => 'required|image|mimes:png,jpg,jpeg,pdf'
        ]);
        $kelas = Kelas::findOrFail($id);


        if ($request->file('gambar_kelas') == "") {

            $kelas->update([
                'nama_kelas'     => $request->nama_kelas,
                'deskripsi'     => $request->deskripsi,
                'harga'   => $request->harga
            ]);
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
                'gambar_kelas'   => $image->hashName(),
            ]);
        }
        //redirect to index
        if ($kelas) {
            return redirect()
                ->route('daftar-kelas.index')
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
        $kelas->delete();

        if ($kelas) {
            return redirect()
                ->route('daftar-kelas.index')
                ->with([
                    'success' => 'Data berhasil dihapus!'
                ]);
        } else {
            return redirect()
                ->route('daftar-kelas.index')
                ->with([
                    'error' => 'Ada beberapa kesalahan, mohon ulang lagi'
                ]);
        }
    }
}
