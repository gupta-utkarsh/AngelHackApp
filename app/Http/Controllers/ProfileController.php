<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class ProfileController extends Controller
{

    public function index()
    {
    	$user = self::getCurrentUser();
    	
    	// user info
    }

}
