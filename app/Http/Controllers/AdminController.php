<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewSignUp()
    {
        return view('pages-rtl.authentication.boxed.signup', ['title' => __('trans.bhoothat')]);
    }

    public function register(AdminRequest $request)
    {
        $formFields = $request->all();
        $formFields['password'] = bcrypt($formFields['password']);

        $admin = User::create($formFields);
        auth()->login($admin);

        return redirect('/dashboard');
    }

    public function viewSignIn()
    {
        return view('pages-rtl.authentication.boxed.signin', ['title' => __('trans.bhoothat')]);
    }

    public function login(Request $request)
    {
        $formFields = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/dashboard');
        }

        // return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
        return back()->withErrors(['username' => 'اسم المستخدم او كلمة المرور خطأ'])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/sign-in');
    }

    // public function profile()
    // {
    //     return view('pages-rtl.user.profile', ['title' => 'Profile']);
    // }
}
