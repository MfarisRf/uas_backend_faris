<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FormatApi;
use App\Models\Agama63;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Agama63Controller extends Controller
{
    public function getAgama63(Request $request)
    {
        $agama = Agama63::all();

        return new FormatApi(true, 'Berhasil mendapatkan data agama', $agama);
    }

    public function getDetailAgama63(Request $request, $id)
    {
        $agama = Agama63::find($id);

        if (!$agama) {
            return new FormatApi(false, 'Agama tidak ditemukan', null);
        }

        return new FormatApi(true, 'Berhasil mendapatkan data agama', $agama);
    }

    public function postAgama63(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_agama' => 'required',
        ]);

        if ($validator->fails()) {
            return new FormatApi(false, 'Validasi gagal', $validator->errors()->all());
        }

        $createUser = Agama63::create([
            'nama_agama' => $request->nama_agama,
        ]);

        if ($createUser) {
            return new FormatApi(true, 'Berhasil menambahkan data agama', $createUser);
        } else {
            return new FormatApi(false, 'Gagal menambahkan data agama', null);
        }
    }

    public function putAgama63(Request $request, $id)
    {
        $agama = Agama63::find($id);

        if (!$agama) {
            return new FormatApi(false, 'Agama tidak ditemukan', null);
        }

        $validator = Validator::make($request->all(), [
            'nama_agama' => 'required',
        ]);

        if ($validator->fails()) {
            return new FormatApi(false, 'Validasi gagal', $validator->errors()->all());
        }

        $agama->update([
            'nama_agama' => $request->nama_agama,
        ]);

        return new FormatApi(true, 'Berhasil mengubah data agama', null);
    }

    public function deleteAgama63(Request $request, $id)
    {
        $agama = Agama63::find($id);

        if (!$agama) {
            return new FormatApi(false, 'Agama tidak ditemukan', null);
        }

        $agama->delete();

        return new FormatApi(true, 'Berhasil menghapus data agama', null);
    }
}
