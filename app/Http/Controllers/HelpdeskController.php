<?php

namespace App\Http\Controllers;
use App\Models\Helpdesk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class HelpdeskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       $helpdesks =  Helpdesk::where('user_id', Auth::user()->id)->get();
       return view('helpdesk.index', compact('helpdesks'));
    }
    public function create()
    {
        return view('helpdesk.form');
    }
    public function store(Request $request)
    {
        $tanggal = Carbon::now();
        $helpdesk = new Helpdesk;
        $helpdesk->user_id = Auth::user()->id;
        $helpdesk->nama = Auth::user()->fullname;
        $helpdesk->tanggal = $tanggal;
        $helpdesk->permasalahan = $request->permasalahan;
        $helpdesk->keterangan = $request->keterangan;
        $helpdesk->status = 0;
        $helpdesk->komentar = $request->komentar;
        $helpdesk->save();

        Alert::success('Permasalahanmu Akan Kami Proses, Silahkan Menunggu Jawaban', 'Success');
        return redirect('/helpdesk');
    }


}
