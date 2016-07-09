<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function doctor()
    {
        return $this->belongsTo('App\doctor');
    }

    public function medical_logs()
    {
        return $this->hasMany('App\Medical_log');
    }

    public function relations_one()
    {
        return $this->belongsToMany('App\User', 'patient_relations', 'first_user', 'second_user');
    }

    public function relations_two()
    {
        return $this->belongsToMany('App\User', 'patient_relations', 'second_user', 'first_user ');
    }

    public function family_invites_received()
    {
        return $this->belongsToMany('App\User', 'family_invites', 'to', 'from');
    }

    public function family_invites_sent()
    {
        return $this->belongsToMany('App\User', 'family_invites', 'from', 'to');
    }



}
