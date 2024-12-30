<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        
        $query = Anggota::query()->latest();
        $keyword = $request->input('search');
        $nikKeyword = $request->input('search');

        if ($keyword) {
            $query->where('nama', 'LIKE', '%' . $keyword . '%');
        }

        if ($nikKeyword) {
            $query->orWhere('nik', 'LIKE', '%' . $nikKeyword . '%');
        }

        $anggotas = $query->get();

        return view('anggota.index', compact('anggotas'));
    }

    public function tambah()
    {
        return view('anggota.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'nik' => 'required|numeric|unique:anggotas,nik',
            'tmpt_lahir' => 'required|max:225',
            'tgl_lahir' => 'required|max:225',
            'alamat' => 'required|max:225',
            'no_telp' => 'required|numeric',
        ]);
    
        // Get the currently authenticated user
        $user = Auth::user();
    
        // Create a new Anggota record and associate it with the authenticated user
        $anggota = new Anggota($request->all());
        $anggota->user()->associate($user);
        $anggota->save();
        return redirect('/anggota')->with('success', 'Post created successfully.');
    }

    public function edit($id)
    {
        $anggotas = DB::table('anggotas')->where('id',$id)->get();

        return view('anggota.edit', ['anggotas' => $anggotas]);
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'nama' => 'required|max:255',
            'nik' => 'required|numeric',
            'tmpt_lahir' => 'required|max:225',
            'tgl_lahir' => 'required|max:225',
            'alamat' => 'required|max:225',
            'no_telp' => 'required|numeric',
          ]);

          $anggota = Anggota::find($id);
          $anggota->update($request->all());
          return redirect('/anggota')->with('success', 'Post updated successfully.');
    }

    public function hapus($id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();
        return redirect('/anggota')->with('success', 'Post deleted successfully');
    }
    
}
