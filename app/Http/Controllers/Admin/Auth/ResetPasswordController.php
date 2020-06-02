<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    public function showResetForm(Request $request, $token = null)
    {
        return view('admin.auth.passwords.reset', [
            'token' => $token,
            'email' => $request->input('email'),
        ]);
    }

    public function broker()
    {
        return Password::broker('admins');
    }

    public function guard()
    {
        return Auth::guard('admin');
    }
}
