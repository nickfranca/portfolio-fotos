<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('login', $request->login)->first();

        // dd($user);

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('admin.index');
        }

        return redirect()
            ->route('admin')
            ->withInput()
            ->with([
                'msg' => true,
                'tipo' => 'danger',
                'mensagem' => 'Usuário/Senha incorreto'
            ]);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('index');
    }
}
