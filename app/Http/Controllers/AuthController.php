<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        session()->remove('name');
        session()->remove('role');
        return view('home');
    }

    public function login(Request $request)
    {
        validator($request->all(), [
            'passcode' => 'required',
        ])->validate();

        $user = User::where('passcode', request()->passcode)->first(['id', 'name', 'role_id']);
        if (!$user)
            return back()->withErrors('Passcode not found');

        $request->session()->put('name', $user->name);
        $request->session()->put('role', $user->role_id);

        return session()->get('role') === 1 ?
            redirect(route('score.index')) :
            redirect(route('event.index'));
    }
}
