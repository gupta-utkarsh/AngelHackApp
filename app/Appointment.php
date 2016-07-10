<?php

namespace App;

use App\User;
use App\Doctor;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointment_logs';

    protected $fillable = [
    	'started_at', 'ended_at', 'user_id', 'disease'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }

    public static function getCurrentAppointmentForUser(User $user)
    {
    	return $user->appointments()->where('ended_at', '=', null)->get()->first();
    }

    public static function getCurrentAppointmentsForDoctor(Doctor $user)
    {
    	return $user->appointments()->where('ended_at', '=', null)->get();
    }

    public static function UpdateAppointmentLog()
    {
    	//
    }
}
