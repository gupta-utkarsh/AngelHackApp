<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $patient = Auth::user();
        $doctor = Auth::guard('doctors')->user();

        if($patient){
            return view('pages/patient_index');
        }
        else if($doctor){
            return view('pages/doctor_index');
        }
        else{
            return view('pages/login_index',[
                    'title' => "Doctor"
                ]);
        }    
    }
}
