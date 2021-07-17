<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getLogout']]);
    }

    public function getLogin()
    {
        return View::make('login');
    }

    public function postLogin(LoginRequest $request)
    {
        $authData = $request->only([
            'email', 'password'
        ]);

        if (Auth::attempt($authData, $request->has('rememeber'))) {
            return Redirect::action([BoardController::class, 'show']);
        } else {
            return Redirect::back()
                ->withErrors(['msg' => '帳號或密碼輸入錯誤'])
                ->withInput($request->except('password'));
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::action([BoardController::class, 'show']);
    }
}