<?php

namespace App\Http\Controllers;

use App\Models\GambarKegiatanKelas;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Storage;
class GambarKegiatanKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail_gambar($id)
    {
        $detailgambar = GambarKegiatanKelas::where('jenis_kelas_id', $id)->with('nama_kelas')->get();
        // dd($gambarkelas);
        return view('admin.gambar-kegiatan-kelas.detail-image', compact('detailgambar'));
    }
    public function index()
    {
        $gambarkelas = GambarKegiatanKelas::groupBy('jenis_kelas_id')->with('nama_kelas')->get();
        // dd($gambarkelas);
        return view('admin.gambar-kegiatan-kelas.index', compact('gambarkelas'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create()
    {
        return view('admin.gambar-kegiatan-kelas.add');
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
                'jenis_kelas_id'  => 'required',
                'images' => 'required'
            ]);
            if ($request->hasFile('images')) {
                $files = $request->file('images');
                foreach ($files as $file) {
                    $filename = $file->hashName();
                    $request['gambar']  = $filename;
                    $file->storeAs('public/gambar_kegiatan_kelas', $file->hashName());
                    GambarKegiatanKelas::create($request->all());
                }
            }
            return redirect()->route('gambar-kegiatan-kelas')->with(['success' => 'Data Berhasil Disimpan!']);
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
    public function edit(GambarKegiatanKelas $gambarKegiatanKelas, $id)
    {
        $data = GambarKegiatanKelas::findOrFail($id);
        return view('admin.gambar-kegiatan-kelas.edit', compact('data'));
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
        try {
            $this->validate($request, [
                'jenis_kelas_id'  => 'required',
                'images' => 'required'
            ]);
            $gambarKegiatanKelas = GambarKegiatanKelas::findOrFail($id);

            if ($request->hasFile('images')) {
                $files = $request->file('images');
                foreach ($files as $file) {
                    $filename = $file->hashName();
                    $request['gambar']  = $filename;
                    Storage::disk('local')->delete('public/gambar_kegiatan_kelas/' . $gambarKegiatanKelas->gambar);

                    $file->storeAs('public/gambar_kegiatan_kelas', $file->hashName());
                    $gambarKegiatanKelas->update($request->all());
                }
            }
            return redirect()->route('gambar-kegiatan-kelas')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $kelas = GambarKegiatanKelas::findOrFail($id);
         Storage::disk('local')->delete('public/gambar_kegiatan_kelas/' . $kelas->gambar);
        $kelas->delete();
        if ($kelas) {
            return redirect()
                ->route('gambar-kegiatan-kelas')
                ->with([
                    'success' => 'Data berhasil dihapus!'
                ]);
        } else {
            return redirect()
                ->route('gambar-kegiatan-kelas')
                ->with([
                    'error' => 'Ada beberapa kesalahan, mohon ulang lagi'
                ]);
        }
    }
}
