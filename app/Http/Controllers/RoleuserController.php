<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roleuser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RoleuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas['user'] = User::all();
        return view('user.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create',['roles' => Roleuser::all()]);
    }

    /**     
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = [
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'password' => $request->password,
            'role_id' => $request->role_id,
        ];
        User::create($datas);
        return redirect()->route('user.index')->with('berhasil', 'Data Telah Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Roleuser  $roleuser
     * @return \Illuminate\Http\Response
     */
    public function show(Roleuser $roleuser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = User::find($id);
        return view('user.edit', $data, ['roles' => Roleuser::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pengguna = User::findOrFail($id);
        $datas = [
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'password' => $request->password,
            'role_id' => $request->role_id,
        ];
        $pengguna->update($datas);
        return redirect()->route('user.index')->with('berhasil', 'Data Telah Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect()->route('user.index')->with('berhasil','Data Telah Dihapus');
    }
}
