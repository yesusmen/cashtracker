<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;

abstract class Controller
{
    public function index()
    {
        return view("auth.login");
    }

    public function store(LoginRequest $request)
    {
        dd('Login successful');
    }
}
