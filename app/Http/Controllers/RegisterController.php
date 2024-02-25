<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:5',
            ], [
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
                'email.unique' => 'The email has already been taken.',
                'password.required' => 'The password field is required.',
                'password.min' => 'The password must be at least :min characters.',
            ]);


            User::create([
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            // Redirect to login with success message
            return redirect('/login')->with('success', 'Registration successful! Please log in.');
        } catch (ValidationException $e) {
            // Validation error occurred
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Other error occurred
            return back()->withInput()->withErrors(['error' => 'Registration failed. Please try again later.']);
        }
    }
}
