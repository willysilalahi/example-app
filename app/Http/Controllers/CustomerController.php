<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Models\RoleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    function __invoke()
    {
        return view('welcome');
    }


    function login()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        } else {
            return view('login');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    function test()
    {
        return view('test');
    }

    function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    function dashboard()
    {
        $name = 'DASHBOARD';
        return view('customer', compact('name'));
    }

    function products()
    {
        $name = 'PRODUCTS YA BANG JAGO';
        $product = ProductModel::whereIn('id', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10])->get();
        $product->dd();
        return view('customer', compact('name'));
    }

    function detail($id)
    {
        $name = 'DETAIL';
        return view('customer', compact('name'));
    }

    function add()
    {
        $name = 'ADD VIEW';
        return view('customer', compact('name'));
    }
}
