<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $id = $request->input('id');
        $password = $request->input('password');

        $user = DB::table('users')->where('id', $id)->first();

        if ($user && Hash::check($password, $user->password)) {
            return response()->json(['status' => 'success', 'message' => 'Login successful']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Invalid ID or password']);
        }
    }
}
