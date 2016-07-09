<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
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
        $this->middleware('auth', ['except' => ['/']]);

    }
        
       
    public function index()
    {
        $user = self::getCurrentUser();

        $patient = Auth::user();
        $doctor = Auth::guard('doctors')->user();

        if($patient)
        {

            $current_appointment = Appointment::getCurrentAppointmentForUser($user);

            //$current_doc = $current_appointment->doctor_id;

            return view('pages/patient_index');
        }
        else if($doctor)
        {
            $current_appointments = Appointment::getCurrentAppointmentsForDoctor($user);

            $specific_logs = 

            return view('pages/doctor_index');
        }
        else
        {
            return view('pages/login_index',[
                    'title' => "Doctor"
                ]);
        }    
    }


}
