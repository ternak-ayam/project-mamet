<?php

namespace App\Http\Controllers;

use App\Exports\ExportNonUser;
use App\Exports\JadwalExport;
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
		return Excel::download(new ExportNonUser, 'user.xlsx');
	}
    public function jadwal_export_excel()
	{
		return Excel::download(new JadwalExport, 'jadwal_kelas.xlsx');
	}
    public function peserta_export_excel()
	{
		return Excel::download(new PesertaExport, 'peserta.xlsx');
	}
}
