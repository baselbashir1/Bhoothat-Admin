<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewSignUp()
    {
        return view('pages-rtl.authentication.boxed.signup', ['title' => 'SignUp']);
    }

    public function register(AdminRequest $request)
    {
        $formFields = $request->all();
        $formFields['password'] = bcrypt($formFields['password']);

        $admin = Admin::create($formFields);
        auth()->login($admin);

        return redirect('/ar/dashboard');
    }

    public function viewSignIn()
    {
        return view('pages-rtl.authentication.boxed.signin', ['title' => 'SignIn']);
    }

    public function login(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/ar/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/sign-in');
    }

    public function profile()
    {
        return view('pages-rtl.user.profile', ['title' => 'Profile']);
    }
}
