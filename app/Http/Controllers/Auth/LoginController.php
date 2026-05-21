<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
     public function index()
    {
        return view("auth.login");
    }
    public function store(LoginRequest $request)
    {
        $data = $request->validated();

        if (!Auth::attempt($data)) {
            return back()->withErrors(['password' => 'Las credenciales proporcionadas son incorrectas.'])->withInput();
        }

       return redirect()->route('dashboard');

    }
}
