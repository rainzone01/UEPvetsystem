<?php
//Controller for Admin Login
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string|min:8',  
    ]);

    // Attempt to authenticate the admin user using the custom guard
    if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
        // Authentication passed, redirect to the dashboard
        return redirect()->route('admindashboard')->with('success', 'Login successful!');
    }

    // Authentication failed, return back with error message
    return back()->withErrors(['login_failed' => 'Invalid username or password.']);
}


    public function logout()
    {
        // Use Laravel's built-in logout method
        Auth::logout();

        // Redirect to login page after logout
        return redirect()->route('admin.login');
    }
}
