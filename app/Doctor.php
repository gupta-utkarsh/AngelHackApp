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
}
