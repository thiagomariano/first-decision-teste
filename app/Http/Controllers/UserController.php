<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rules;

class UserController extends Controller
{

    public function show(): View
    {
        return view('cadastrar', []);
    }

    public function lista(): View
    {
        $users = User::all();
        return view('dashboard', [
            'users' => $users
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('editar', [
            'user' => $user,
        ]);
    }
    public function cadastrar()
    {
        return view('cadastrar', []);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        $request->user()->save();

        return redirect()->route('lista')->with('success', 'Usuário alterado com sucesso!')->setStatusCode(201);

    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50', 'min:3'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'min:3', 'max:20', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));

        return redirect()->route('lista')->with('success', 'Usuário registrado com sucesso!')->setStatusCode(201);

    }

    public function delete(Request $request): RedirectResponse
    {
        $user = $request->user();
        $user->delete();

        return redirect()->to('/lista')->with('message', 'Usuário excluido com sucesso!');

    }
}
