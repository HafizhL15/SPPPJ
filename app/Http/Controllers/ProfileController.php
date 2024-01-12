<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $user = User::where('id', Auth::user()->id)->first();
        return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
    	 $this->validate($request, [
            'password'  => 'confirmed',
        ]);

    	$user = User::where('id', Auth::user()->id)->first();
    	$user->name = $request->name;
        $user->last_name = $request->last_name;
    	$user->email = $request->email;
    	$user->no_telepon = $request->no_telepon;
    	if(!empty($request->password))
    	{
    		$user->password = Hash::make($request->password);
    	}
    	
    	$user->update();

    	Alert::success('Profile Berhasil diupdate', 'Success');
    	return redirect('profile');
    }

    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'last_name' => 'nullable|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
    //         'current_password' => 'nullable|required_with:new_password',
    //         'new_password' => 'nullable|min:8|max:12|required_with:current_password',
    //         'password_confirmation' => 'nullable|min:8|max:12|required_with:new_password|same:new_password'
    //     ]);


    //     $user = User::findOrFail(Auth::user()->id);
    //     $user->name = $request->input('name');
    //     $user->last_name = $request->input('last_name');
    //     $user->email = $request->input('email');

    //     if (!is_null($request->input('current_password'))) {
    //         if (Hash::check($request->input('current_password'), $user->password)) {
    //             $user->password = $request->input('new_password');
    //         } else {
    //             return redirect()->back()->withInput();
    //         }
    //     }

    //     $user->save();

    //     return redirect()->route('profile')->withSuccess('Profile updated successfully.');
    // }
}
