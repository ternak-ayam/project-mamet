<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\Kelas;
use App\Models\Nonusers;
use App\Models\Pembelian;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $daftarkelas = Kelas::latest()->get();
        return view('home', compact('daftarkelas'));
    }
    public function kelas()
    {
        $daftarkelas = Kelas::latest()->get();
        return view('kelas', compact('daftarkelas'));
    }




    public function show($id)
    {
        $data = Kelas::findOrFail($id);
        return view('detail-product', compact('data'));
    }




    public function filldatadiri($id)
    {
        // dd($id);
        session(['id' => $id]);
        return view('data-diri');
    }

    public function storedatadiri(Request $request)
    {

        $id = session('id');


        if (User::where('name', '=', $request->name)->where('email', '=', $request->email)->exists()) {
            $iduser = User::where('name', $request->name)
                ->where('email', $request->email)
                ->first()->id;
            $nameuser = User::where('name', $request->name)
                ->where('email', $request->email)
                ->first()->name;
            $emailuser = User::where('name', $request->name)
                ->where('email', $request->email)
                ->first()->email;

            // dd($id);
            $idusers = User::where('name', $request->name)
                ->where('email', $request->email)
                ->first()->id;
            session(['idusers' => $idusers]);
            // dd(session(['idusers' => $idusers]));

            return redirect()->route('checkout.create', $id)
                ->with(['success' => 'Data Sudah Ada!'])
                ->with(['id_user' => $iduser])
                ->with(['name_user' => $nameuser])
                ->with(['email_user' => $emailuser]);
        } else {
            try {
                //validate form
                $this->validate($request, [
                    'name' => 'required', 'string', 'max:255',
                    'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
                    'nama_orangtua' => 'required', 'string', 'max:255',
                    'no_telp' => 'required', 'string', 'max:255',
                    'alamat' => 'required', 'string', 'max:255',
                ]);
                //create post
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'nama_orangtua' => $request->nama_orangtua,
                    'no_telp' =>  $request->no_telp,
                    'alamat' =>  $request->alamat,
                    'email_verified_at' => Carbon::now(),
                    'role' =>  'nonuser',
                ]);
                if (User::where('name', '=', $request->name)->where('email', '=', $request->email)->exists()) {
                    $iduser = User::where('name', $request->name)
                        ->where('email', $request->email)
                        ->first()->id;
                    $nameuser = User::where('name', $request->name)
                        ->where('email', $request->email)
                        ->first()->name;
                    $emailuser = User::where('name', $request->name)
                        ->where('email', $request->email)
                        ->first()->email;
                    // dd($id);
                    $idusers = User::where('name', $request->name)
                        ->where('email', $request->email)
                        ->first()->id;
                    // dd(session(['idusers' => $idusers]));
                    session(['idusers' => $idusers]);
                    return redirect()->route('checkout.create', $id)
                        ->with(['success' => 'Data Berhasil Disimpan!'])
                        ->with(['id_user' => $iduser])
                        ->with(['name_user' => $nameuser])
                        ->with(['email_user' => $emailuser]);
                }
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }

        // dd($request);

    }
    public function dashboardNonUser()
    {
        $id = session('idusers');
        // dd($id);
        $data = Pembelian::where('user_id', $id)->with(['user', 'kelas'])->latest()->get();
        return view('nonuser.dashboard-nonuser', compact('data'));
    }
    public function viewregisterNonUser()
    {
        $id = session('idusers');
        // dd($id);
        $data = User::where('id', $id)->first();
        return view('nonuser.register-nonuser', compact('data'));
    }
    public function registerNonUser(Request $request)
    {
        $id = session('idusers');

        try {
            // dd($request);
            $this->validate($request, [
                'name'              => ['required', 'string', 'max:255'],
                'email'             => ['required', 'string', 'email', 'max:255'],
                'nama_orangtua'     => ['required', 'string', 'max:255'],
                'no_telp'           => ['required', 'string', 'max:255'],
                'alamat'            => ['required', 'string', 'max:255'],
                'password'          => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            //get data Blog by ID
            $user = User::findOrFail($id);


            $user->update([
                'name'              => $request->name,
                'email'             => $request->email,
                'email_verified_at' => Carbon::now(),
                'nama_orangtua'     => $request->nama_orangtua,
                'nama_ibu'          => $request->nama_ibu,
                'no_telp'           => $request->no_telp,
                'alamat'            => $request->alamat,
                'role'              => 'user',
                'password'          => Hash::make($request->password),
            ]);

            if ($user) {
                //redirect dengan pesan sukses
                return redirect()->route('login')->with(['success' => 'Data Berhasil Diupdate!']);
            } else {
                //redirect dengan pesan error
                return redirect()->route('login')->with(['error' => 'Data Gagal Diupdate!']);
            }
        } catch (\Exception $e) {
            $id = session('idusers');
            // dd($e->getMessage());
            $data = User::where('id', $id)->first();
            if ($request->password !== $request->password_confirmation) {
                return redirect()->route('view-register-nonuser')->with(['data' => $data])->with(['error' => 'Password tidak sama dengan password confirmation!']);
            }
            return redirect()->route('view-register-nonuser')->with(['data' => $data])->with(['error' => $e->getMessage()]);
        }
    }


    public function contactUs(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'phone_number' => 'required',
            'message' => 'required'
        ]);

        $contact = new ContactUs;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->phone_number = $request->phone_number;
        $contact->message = $request->message;

        $contact->save();

        Mail::send(
            'contact_email',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'subject' => $request->get('subject'),
                'phone_number' => $request->get('phone_number'),
                'user_message' => $request->get('message'),
            ),
            function ($message) use ($request) {
                $message->from($request->email);
                $message->to('admin@example.com');
            }
        );


        return back()->with('success', 'Your message was sent, Thank you for contact us!');
    }
}
