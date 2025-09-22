<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return redirect()->route('dashboard');
    }

    public function profil()
    {
        $user = Auth::user();
        return view('profil.index', compact('user'));
    }
}
