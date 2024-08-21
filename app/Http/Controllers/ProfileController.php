<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'user_type' => 'required|in:user,admin',
        ]);

        $credentials = $request->only('email', 'password');
        $userType = $request->input('user_type');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->is_admin == 1) {
                return redirect()->intended('admin/dashboard');
            }
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $user = $request->user();
    
        // Actualizar nombre y correo electrónico si se proporcionan
        if (isset($validatedData['nombre'])) {
            $user->nombre = $validatedData['nombre'];
        }
    
        if (isset($validatedData['email'])) {
            $user->email = $validatedData['email'];
            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
            }
        }

        if ($request->hasFile('profile_photo')) {

             // Procesar imagen
             $imagen = $request->file("profile_photo");
    
             // Generar un nombre único para la imagen
             $imageName = uniqid() . '.' . $imagen->getClientOriginalExtension();
             $imagen->move(public_path('images/foto_perfil'), $imageName);
     
             // Agregar la ruta de la imagen al validatedData
             $imagenPath = 'images/foto_perfil/' . $imageName;

             $user->profile_photo = $imagenPath;
        }
    
        // Actualizar peso, calorías, estatura, edad, y sexo si se proporcionan
        if (isset($validatedData['peso'])) {
            $user->peso = $validatedData['peso'];
        }
    
        if (isset($validatedData['calorias'])) {
            $user->calorias = $validatedData['calorias'];
        }
    
        if (isset($validatedData['estatura'])) {
            $user->estatura = $validatedData['estatura'];
        }
    
        if (isset($validatedData['edad'])) {
            $user->edad = $validatedData['edad'];
        }
    
        if (isset($validatedData['sexo'])) {
            $user->sexo = $validatedData['sexo'];
        }


    
        // Guardar los cambios
        $user->save();
    
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
