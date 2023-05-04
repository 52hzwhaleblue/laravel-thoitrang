<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

    }

    public function show($id)
    {
        $rowUser  = User::where('id',$id)->first();
        return view('template.user.user',compact('rowUser'));
    }
}
