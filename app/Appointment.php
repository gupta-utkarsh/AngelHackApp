<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointment_logs';

    protected $fillable = [
    	'started_at', 'ended_at', 'user_id', 'disease'
    ];

    public static function getCurrentAppointmentForUser(User $user)
    {
    	return $user->appointments()->where('ended_at', '=', null);
    }

    public static function getCurrentAppointmentsForDoctor(Doctor $user)
    {
    	return $user->appointments()->where('ended_at', '=', null);
    }

    public static function UpdateAppointmentLog()
    {
    	//
    }
}
