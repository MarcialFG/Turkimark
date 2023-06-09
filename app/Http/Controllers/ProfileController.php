<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit()
{
    $user = User::find(Auth::user()->id);

    return view('profile.edit')->with('user', $user);
}

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        
        $user->save();
    
        return redirect()->route('Inicio')->with('success', 'Usuario actualizado correctamente');
    }
    
    /**
     * Delete the user(método por defecto para plantillla blade)
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
     /**
     * Delete the user(metodo nuevo para utilizarlo en la vista normal)
     */
    public function destroyUser($id)
    {
        $users = User::find($id)->delete();

        return redirect()->route('Usuarios')
            ->with('success', 'User deleted successfully');
    }
}
