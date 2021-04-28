<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return response()->json(['users' => $users], 200);
    }
}
