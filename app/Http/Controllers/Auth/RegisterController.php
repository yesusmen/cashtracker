<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');

    }

    public function store(RegisterRequest $request)
    {
        $validated = $request->validated();

        $user = User::create($validated);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('verification.notice');
    }
}
