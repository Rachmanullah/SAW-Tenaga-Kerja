<?php

namespace App\Http\Controllers;

use App\Models\role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = role::all();

        return view('admin.role.index', ['data' => $data]);
    }


    public function store(Request $request)
    {
        $roles = new role([
            'role' => $request->role,
        ]);

        $roles->save();

        return redirect()->route('data.role')->with('meassage', 'Berhasil di Tambahkan');
    }


    public function update(Request $request)
    {
        role::find($request->id)->update(['role' => $request->role]);

        return redirect()->route('data.role')->with('message', 'Berhasil Update');
    }

    public function destroy($id)
    {
        role::find($id)->delete();
        return redirect()->route('data.role')->with('message', 'Berhasil Dihapus');
    }
}
