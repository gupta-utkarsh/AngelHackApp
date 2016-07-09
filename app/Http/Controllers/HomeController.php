<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = self::getCurrentUser();

        $current_appointment = Appointment::getCurrentAppointmentForUser($user);

        //$current_doc = $current_appointment->doctor_id;

        return view('home');
    }
}
