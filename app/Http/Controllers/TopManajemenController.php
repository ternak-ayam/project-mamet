<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;
use Illuminate\Database\Eloquent\Builder;

class TopManajemenController extends Controller
{
    public function index()
    {
        $datakelas = Pembelian::with(['user', 'kelas', 'days', 'times'])
        ->where('status_pembayaran', '1')
        ->get();
        return view('topmanajemen.dashboard-topmanajemen', compact('datakelas'));
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
            return view('topmanajemen.dashboard-topmanajemen', ['datakelas' => $datakelas]);
        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
