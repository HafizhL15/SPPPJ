<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FeedbackController extends Controller
{
    public function index()
    {   
        $this->middleware('admin');
        $feedback = Feedback::all();
        return view('admin.feedback', compact('feedback'));
    }

    public function create()
    {
        return view('feedback.form');
    }

    public function store(Request $request)
    {
        $feedback = new Feedback;
        $feedback->name = $request->name;
        $feedback->email = $request->email;
        $feedback->kritik_saran = $request->kritik_saran;
        $feedback->save();

        Alert::success('Terimakasih Atas Kritik & Saran Yang Telah Diberikan', 'Success');
        return redirect('/');
    }
}
