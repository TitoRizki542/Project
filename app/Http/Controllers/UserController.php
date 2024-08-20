<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    public function index()
    {
       $user = User::get()->all();

       return view('admin.user.indexuser', compact('user'));
    }
}
