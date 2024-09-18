<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $restaurants = $admin->restaurants()->get();

        return view('admin.admin-dashboard', compact('restaurants'));
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $admin = Auth::guard('admin')->user();
            $restaurants = $admin->restaurants()->get();

            return redirect()->route('admin.dashboard')->with('restaurants', $restaurants);
        } else {
            return back()->withErrors(['error' => 'Invalid credentials'])
                ->withInput($request->except('password'));
        }
    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login.form');
    }
}
