<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pembelian;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Jorenvh\Share\Share;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $data = Kelas::findOrFail($id);
        // Share button 1
        $share = new Share;
        $shareButtons1 = $share->page('https://mamet.arkaya.tech/dashboard-admin/' . $id, 'Ada Kelas Baru Go Kreatif untuk Meningkatkan Kreatifitas Anda !%0AAyo Daftar Sekarang Melalui tautan berikut ! %0A')
            ->facebook()
            ->twitter()
            ->telegram()
            ->whatsapp();

        return view('admin.show', compact('data', 'shareButtons1'));
    }
    public function sendEmail(Request $request)
    {
        // ini logika mass email
        $link = 'http://127.0.0.1:8000/detail-product/' . $request->id;
        $datas = [];
        $data = User::where('role', 'user')->orWhere('role', 'nonuser')->get();
        foreach ($data as $items => $key) {
            $datas[] = $key->email;
        }
        $emails = $datas;
        $request->merge([
            'link' => $link,
        ]);

        Mail::send('mass_email', array(
            'id' => $request->get('id'),
            'link' => $request->get('link'),
        ), function ($message) use ($emails) {
            $message->from('admin@example.com');
            $message->to($emails)->subject('Ada Kelas Baru nih di Go Kreatif !');
        });
        var_dump(Mail::failures());
        // exit;
        return redirect()->route('dashboard-admin.index')->with('success', 'Email berhasil dikirimkan kepada user!');
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
