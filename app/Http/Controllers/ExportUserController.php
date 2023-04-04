<?php

namespace App\Http\Controllers;

use App\Exports\BelumLunasExport;
use App\Exports\ExportNonUser;
use App\Exports\HistoryPesertaExport;
use App\Exports\JadwalExport;
use App\Exports\JenisKelasExport;
use App\Exports\KelasUserExport;
use App\Exports\PembayaranFilterExport;
use App\Exports\PesertaExport;
use App\Exports\UserExport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportUserController extends Controller
{
    public function export_excel()
	{
		return Excel::download(new UserExport, 'user.xlsx');
	}
    public function export_nonuser()
	{
		return Excel::download(new ExportNonUser, 'nonuser.xlsx');
	}
    public function jadwal_export_excel()
	{
		return Excel::download(new JadwalExport, 'jadwal_kelas.xlsx');
	}
    public function peserta_export_excel()
	{
		return Excel::download(new PesertaExport, 'peserta.xlsx');
	}
    public function filterpembayaran_export_excel()
	{
		return Excel::download(new PembayaranFilterExport, 'ListPembayaranLunas.xlsx');
	}
    public function belumlunas_export_excel()
	{
		return Excel::download(new BelumLunasExport, 'ListPembayaranBelumLunas.xlsx');
	}
    public function historypeserta_export_excel()
	{
		return Excel::download(new HistoryPesertaExport, 'HistoryPeserta.xlsx');
	}
    public function jeniskelas_export_excel($id)
	{
		return Excel::download(new JenisKelasExport($id), 'JenisKelas.xlsx');
	}
    public function kelaspeserta_export_excel($id)
	{
		return Excel::download(new KelasUserExport($id), 'KelasPeserta.xlsx');
	}
}
