<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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
            ->route('login')
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

        return redirect()->route('login');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'login' => ['required', 'string', 'max:255', 'unique:users,login'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('admin.index')->with('success', 'Usuário criado para o administrativo.');
    }

    public function update(Request $request, User $usuario)
    {
        $data = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($usuario)],
            'login' => ['required', 'string', 'max:255', Rule::unique('users', 'login')->ignore($usuario)],
            'password' => ['nullable', 'string', 'min:6'],
        ]);

        if (! empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $usuario->update($data);

        return redirect()->route('admin.index')->with('success', 'Usuário atualizado.');
    }

    public function destroy(User $usuario)
    {
        if (Auth::id() === $usuario->id) {
            return redirect()->route('admin.index')->withErrors('Você não pode excluir o próprio usuário logado.');
        }

        $usuario->delete();

        return redirect()->route('admin.index')->with('success', 'Usuário removido.');
    }
}
