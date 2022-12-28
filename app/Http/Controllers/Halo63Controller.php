<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Agama63;


class Halo63Controller extends Controller
{
    public function halo63()
    {
        $user = User::where('role', 'user')->get();
        $agama = Agama63::all();

        return view('welcome', ['data' => $user, 'agama' => $agama]);
    }
}
