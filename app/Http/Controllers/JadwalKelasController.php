<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pembelian;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JadwalKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datakelas = Pembelian::with(['user', 'kelas', 'days', 'times'])
        ->where('status_pembayaran', '1')
        ->get();

        // if ($request->ajax()) {
        //     return Datatables::of($datakelas)
        //             ->addIndexColumn()
        //             ->addColumn('action', function($row){

        //                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

        //                     return $btn;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        // }
        
        // dd($datakelas);
        // $collection = $datakelas->map(function ($array) {
        //     return collect($array)->unique('kelas_id')->all();
        // });
        // $results1= DB::table('pembelians')->where('status_pembayaran','1')
        //      ->select('kelas_id','days_id','times_id', DB::raw('count(*) as count'))
        //      ->groupBy(['kelas_id','days_id','times_id'])
        //      ->get();
        //  dd($results1);
        // // foreach($datakelas as $data){
        // //     dd($data);

        // // }
        // $uniqueData = DB::table('pembelians')
        //         //   ->groupBy(['kelas_id', 'days_id','times_id'])
        //           ->select(['kelas_id'], (DB::raw('count(*) as count')))
        //           ->get()
        //           ->toArray();
        //            dd($uniqueData);  
        // $duplicates = DB::table('pembelians')
        // ->select('kelas_id', (DB::raw('COUNT(kelas_id)')))
        // ->groupBy('kelas_id')
        // ->get();
        // dd($duplicates);
        return view('admin.jadwal-kelas.index', compact('datakelas'));
    }
     
    public function cari(Request $request)
    {
        try{
            $cari = $request->keyword;
            $datakelas = Pembelian::with(['user', 'kelas', 'days', 'times'])
            ->where('status_pembayaran', '1')
            ->WhereHas('user', function($query) use($cari) {
                $query->where('name', 'like', "%".$cari."%");
            })
            ->orWhereHas('kelas', function (Builder $query) use ($cari) {
                $query->where('nama_kelas', 'LIKE', '%'.$cari.'%');
            })
            ->orWhereHas('days', function (Builder $query) use ($cari) {
                $query->where('daysname', 'LIKE', '%'.$cari.'%');
            })
            ->orWhereHas('times', function (Builder $query) use ($cari) {
                $query->where('jam_kelas', 'LIKE', '%'.$cari.'%');
            })
            ->paginate(15);
            return view('admin.jadwal-kelas.index', ['datakelas' => $datakelas]);
        }catch (\Exception $e) {
            return $e->getMessage();
        }
        
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
        Pembelian::create([
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
    public function edit(Pembelian $pembelian, $id)
    {
        $data = Pembelian::findOrFail($id);
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
        $kelas = Pembelian::findOrFail($id);


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
        $kelas = Pembelian::findOrFail($id);
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
