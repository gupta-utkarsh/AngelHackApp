<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medical_log extends Model
{
    protected $table = 'medical_logs';

    protected $fillable = [
        'symptoms', 'diagnosis', 'medicines',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function doctor()
    {
    	return $this->belongsTo('App\Doctor');
    }

    public static function getAllUserLogs(User $user)
    {
        /*$user = User::find($id);*/
        return $user->medical_logs()->orderBy('created_at', 'desc')->get();
    }

    public static function getAllDoctorLogs(Doctor $user)
    {
        /*$user = Doctor::find($id);*/
        return $user->medical_logs()->orderBy('created_at', 'desc')->get();
    }

    public static function getAllDoctorLogsforUser(User $user, $doctor_id)
    {
        
        return $user->medical_logs()->where('doctor_id', '=', $doctor_id)->orderBy('created_at', 'desc')->get();
    }
    
}
