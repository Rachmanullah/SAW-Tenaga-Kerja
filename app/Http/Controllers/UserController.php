<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $role = role::all();

        $data = [
            'user' => $user,
            'role' => $role
        ];
        return view('admin.user.index', $data);
    }

    public function store(Request $request)
    {
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => hash('sha512', $request->password),
            'phone' => $request->phone,
            'role_id' => $request->position,
        ]);
        $user->save();

        return redirect()->route('data.user')->with('message', 'data berhasil ditambahkan');
    }

    public function update(Request $request)
    {
        $user = User::find($request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'position' => $request->position,
        ]);

        return redirect()->route('data.user')->with('message', 'Berhasil Update Data');
    }

    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('data.user')->with('message', 'Data Berhasil Dihapus');
    }

    public function print()
    {
        $user = User::all();
        $data = [
            'user' => $user,
            'date' => date("d-M-Y"),
        ];
        $pdf = Pdf::loadView('admin.user.print', $data);
        return $pdf->download('user.pdf');
    }
}
