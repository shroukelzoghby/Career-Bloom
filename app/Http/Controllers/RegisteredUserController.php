<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployerRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request )
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $logoPath = $request->logo->store('logos');
        $user->employer()->create([
            'name'=> $request->employer,
            'logo'=> $logoPath,
        ]);

        Auth::login($user);
        return redirect('/');

    }

}
