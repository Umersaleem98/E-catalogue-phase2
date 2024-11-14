<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function dashboardview()
    {
        $totalStudents = Student::count(); // Total number of students
        $ugStudents = Student::where('degree', 'UG')->count(); // Assuming 'degree' field exists
        $pgStudents = Student::where('degree', 'MS')->count();
        $Adopedstudents = Student::where('make_pledge', 0)
        ->where('payment_approved', 0)
        ->count(); // Assuming 'degree_level' field exists

        return view('dashboard', compact('totalStudents', 'ugStudents', 'pgStudents', 'Adopedstudents'));
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // Show registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('dashboard');
    }

    public function userlist()
    {
        $users = User::all();
        return view('adminpage.users.list', compact('users'));
    }
   
    public function edit($id)
    {
        $users = User::find($id);
        return view('adminpage.users.edit', compact('users'));
    }


    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        'user_type' => 'required|string',
    ]);

    $user = User::findOrFail($id);
    $user->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'user_type' => $request->input('user_type'),
    ]);

    return redirect()->back()->with('success', 'User updated successfully');
}
}
