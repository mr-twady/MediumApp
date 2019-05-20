<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    //The only responsibility of this function is to display an admin's profile
    public function show($userId)
    {
        $userId = preg_replace("/[^0-9]+/", "",$userId); // sanitize admin id, allow only integers
        return view('admin-profile', ['userId'=>$userId]);
    }
    
}
