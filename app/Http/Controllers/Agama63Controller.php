<?php

namespace App\Http\Controllers;

use App\Models\Agama63;
use Illuminate\Http\Request;

class Agama63Controller extends Controller
{
    public function agamaPage63()
    {
        $agama = Agama63::all();

        return view('agama', ['all_agama' => $agama]);
    }

    public function editAgamaPage63(Request $request)
    {
        $id = $request->id;

        $agama = Agama63::find($id);

        if (!$agama) {
            return back()->with('error', 'Agama tidak ditemukan');
        }

        $all_agama = Agama63::all();

        return view('agama', ['all_agama' => $all_agama, 'agama' => $agama]);
    }

    public function updateAgama63(Request $request)
    {
        $id = $request->id;
        $agama = Agama63::find($id);

        if (!$agama) {
            return redirect('/agama63')->with('error', 'Agama tidak ditemukan');
        }

        $request->validate([
            'nama_agama' => 'required'
        ]);

        $updateAgama = $agama->update([
            'nama_agama' => $request->nama_agama
        ]);

        if ($updateAgama) {
            return redirect('/agama63')->with('success', 'Agama berhasil diubah');
        } else {
            return redirect('/agama63')->with('error', 'Agama gagal diubah');
        }
    }

    public function createAgama63(Request $request)
    {
        $request->validate([
            'nama_agama' => 'required'
        ]);

        $createAgama = Agama63::create([
            'nama_agama' => $request->nama_agama
        ]);

        if ($createAgama) {
            return back()->with('success', 'Agama berhasil ditambahkan');
        } else {
            return back()->with('error', 'Agama gagal ditambahkan');
        }
    }

    public function deleteAgama63(Request $request)
    {
        $id = $request->id;
        $agama = Agama63::find($id);

        if (!$agama) {
            return redirect('/agama63')->with('error', 'Agama tidak ditemukan');
        }

        $deleteAgama = $agama->delete();


        if ($deleteAgama) {
            return redirect('/agama63')->with('success', 'Agama berhasil dihapus');
        } else {
            return redirect('/agama63')->with('error', 'Agama gagal dihapus');
        }
    }
}
