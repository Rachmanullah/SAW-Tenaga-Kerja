<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function viewAkun()
    {
        $akun = User::find(auth()->user()->id);

        return view('admin.akun', ['data' => $akun]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'foto' => 'mimes:jpeg,png,jpg|max:2048'
        ]);
        if ($request->file('foto')) {
            File::delete('assets/image/' . auth()->user()->foto);
            $image = time() . '-' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('assets/image', $image);
        } else {
            $image = auth()->user()->foto;
        }
        User::find(auth()->user()->id)->update([
            'foto' => $image,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('akun')->with('message', 'Berhasil Update Profile');
    }
    public function logout()
    {
        session()->invalidate();
        return redirect('/admin/login');
    }
}
