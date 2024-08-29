<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nis' => 'required|integer',
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            // 'username' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'kelas' => ['required', 'integer', 'between:1,12'],
            'jenjang' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'tgl_lahir' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // dd($request->all());
        // die;
        $user = User::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            // 'username' => $request->username,
            'gender' => $request->gender,
            'kelas' => $request->kelas,
            'jenjang' => $request->jenjang,
            'tgl_lahir' => $request->tgl_lahir,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Siswa',
        ]);

        event(new Registered($user));

        Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
        return redirect()->intended('/dashboard')->with('success', 'Selamat datang ' . Auth::user()->nama);
    }
}
