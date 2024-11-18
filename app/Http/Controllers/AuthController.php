<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        session()->remove('user');
        session()->remove('role');
        session()->remove('name');
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

        $request->session()->put('user', $user->id);
        $request->session()->put('role', $user->role_id);
        $request->session()->put('name', $user->name);

        return session()->get('role') === 1 ?
            redirect(route('score.index')) :
            redirect(route('event.index'));
    }
}
