<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $name = $request->input('name');
        $password = $request->input('password');

        // Get the user by name
        $user = Admin::where('name', $name)->first();
        Session::put('AdminName', $user->name);
        // Check if the user exists and verify the password manually
        if ($user && \Hash::check($password, $user->password)) {
            // Authentication passed, log in the user
            Auth::login($user);
            return redirect()->route('admin.dashboard'); // Replace 'admin.dashboard' with your desired route
        } else {
            // Authentication failed, redirect back to login page with an error message
            return redirect()->route('admin')->with('error', 'Invalid credentials');
        }
    }
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/admin/admin_login');
    }
}
