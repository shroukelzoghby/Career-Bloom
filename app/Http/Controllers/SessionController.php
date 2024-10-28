<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8'
        ]);
        if(auth()->attempt($validated)){
            request()->session()->regenerate();
            return redirect('/');
        }
        return redirect('/login')->withErrors([
                'email' => 'No matching user found with the provided email and password',
            ]);




    }



    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
