<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use \Illuminate\Foundation\Auth\AuthenticatesUsers;

    /**
     * Ke mana user diarahkan setelah login.
     */
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Override redirect setelah login sesuai role.
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') {
            return redirect()->route('dashboard'); // /admin/dashboard
        }

        if ($user->role === 'anggota') {
            return redirect()->route('anggota.dashboard'); // /anggota/dashboard
        }

        return redirect('/'); // fallback kalau role aneh
    }
}
