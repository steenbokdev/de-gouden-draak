<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\TabletLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display the login resource.
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Display the login resource for tablets.
     */
    public function loginTablet()
    {
        return view('auth.login-tablet');
    }

    /**
     * Handle an authentication attempt.
     */
    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'employee_id' => __('employee/employee.employee_id.invalid')
        ])->onlyInput('employee_id');
    }

    /**
     * Handle an authentication attempt for tablets.
     */
    public function authenticateTablet(TabletLoginRequest $request)
    {
        $credentials = $request->validated();
        $credentials['employee_id'] = 'tablet_' . $credentials['tablet_id'];
        unset($credentials['tablet_id']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'tablet_id' => __('tablet/tablet.tablet_id.invalid')
        ])->onlyInput('tablet_id');
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
