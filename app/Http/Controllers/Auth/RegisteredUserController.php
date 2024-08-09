<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('auth.register'); 
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        // Verifica si ya existe un administrador
        $adminExists = User::where('is_admin', true)->exists();

        // Si ya existe un administrador, solo se pueden registrar usuarios normales
        if ($adminExists) {
            $isAdmin = false;
        } else {
            // Si no hay administrador, este usuario será administrador
            $isAdmin = true;
        }

        // Crea el usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $isAdmin,
        ]);

        auth()->login($user);

        return redirect($this->redirectTo);
    }
}
