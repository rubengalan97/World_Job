<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Empresa;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if($request->rol == 'usuario') {
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'ultimos_estudios' => $request->ultimos_estudios,
                'descripcion' => $request->descripcion,
                'imagen' => 'defaultUser.png',
                'rol' => $request->rol,
            ]);
        }

        if($request->rol == 'empresa') {
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'imagen' => 'defaultUser.png',
                'rol' => $request->rol,
            ]);

            $empresa = Empresa::create([
                'nombre' =>  $request->nombre,
                'descripcion' =>  $request->descripcion,
                'idUsu' => $user->idUsu,
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
