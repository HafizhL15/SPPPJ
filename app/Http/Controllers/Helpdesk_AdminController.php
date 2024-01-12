<?php

namespace App\Http\Controllers;

use App\Models\Helpdesk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Helpdesk_AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->check() && ((auth()->user()->role_id == 1) || auth()->user()->role_id == 2)) {
            $helpdesks =  Helpdesk::all();
            return view('admin.helpdesk', compact('helpdesks'));
        }
        Alert::error('Halaman Tidak Dapat Diakses', 'Error');
        return redirect('/');
        
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
     * @param  \App\Models\Helpdesk  $helpdesk
     * @return \Illuminate\Http\Response
     */
    public function show(Helpdesk $helpdesk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Helpdesk  $helpdesk
     * @return \Illuminate\Http\Response
     */
    public function edit(Helpdesk $helpdesk, $id)
    {
        if (auth()->check() && ( auth()->user()->role_id == 2)) {
            $helpdesk = Helpdesk::find($id);

            return view('admin.edit_helpdesk', compact('helpdesk'));
        }
        Alert::error('Halaman Tidak Dapat Diakses', 'Error');
        return redirect('/');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Helpdesk  $helpdesk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->check() && ( auth()->user()->role_id == 2)) {
            $helpdesk = Helpdesk::findOrFail($id);
            $datas = [
                'status' => $request->status,
                'komentar' => $request->komentar,
            ];
            $helpdesk->update($datas);
            return redirect('/admin_helpdesk')->with('berhasil', 'Data Telah Diubah');
        }
        Alert::error('Halaman Tidak Dapat Diakses', 'Error');
        return redirect('/');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Helpdesk  $helpdesk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Helpdesk $helpdesk)
    {
        //
    }
}
