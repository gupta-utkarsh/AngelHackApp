<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $guard = 'doctors';

    private $is_doctor = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function patients()
    {
        return $this->hasMany('App\User');
    }

    public function medical_logs()
    {
        return $this->hasMany('App\Medical_log');
    }

    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }

    public function is_doctor()
    {
        return $this->is_doctor;
    }

    public function createAppointmentForUser(User $user)
    {
        $this->appointments()->create([
                'started_at' => date("Y-m-d H:i:s"),
                'ended_at' => null,
                'disease' => null,
                'user_id' => $user->id,
            ]);
    }
    public function createMedicalLogForUser(User $user, $params)
    {
        $this->medical_logs()->create([
                'symptoms' => $params['symptoms'],
                'diagnosis' => $params['diagnosis'],
                'medicines' => $params['medicines'],
                'user_id' => $user->id
            ]);
    }

    public static function getAllAppointments(Doctor $user)
    {
        return $user->appointments()->orderBy('created_at', 'desc')->get();
    }

}
