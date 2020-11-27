<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest as Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class PasswordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = User::firstWhere('email', $request->email);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login');
    }
}
