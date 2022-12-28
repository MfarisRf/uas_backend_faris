<?php

namespace App\Http\Controllers;

use App\Models\Data63;
use App\Models\User;
use Illuminate\Http\Request;

class Register63Controller extends Controller
{
    public function register63(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users63',
            'password' => 'required|min:8',
            'repassword' => 'required|same:password',
        ]);

        $userData = $request->all();
        $userData["password"] = bcrypt($request->password);
        $userData["is_active"] = 0;

        $user = new User();
        $user->fill($userData);
        $save = $user->save();

        $detailUser = new Data63();
        $detailUser->id_user = $user->id;
        $detailUser->save();

        if ($save && $detailUser) {
            return redirect('/login63')->with('success', 'Register Success');
        } else {
            return back()->with('error', 'Register failed!');
        }
    }
}
