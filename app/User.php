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

    protected $inverse = array(
        'child' => 'parent',
        'parent'=> 'child',
        'sibling' => 'sibling',
        'grandparent' => 'grandchild',
        'grandchild' => 'grandparent'
        );
    protected $assigned_doctor;

    private $is_doctor = false;

    public function doctor()
    {
        $assigned_doctor =  $this->belongsTo('App\Doctor');
        return $assigned_doctor;
    }

    public function medical_logs()
    {
        return $this->hasMany('App\Medical_log');
    }

    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }

    public function relationsLeftToRight()
    {
        return $this->belongsToMany('App\User', 'patient_relations', 'first_user', 'second_user')->withPivot('relations')->withTimestamps();
    }

    public function relationsRightToLeft()
    {
        return $this->belongsToMany('App\User', 'patient_relations', 'second_user', 'first_user')->withPivot('relations')->withTimestamps();;
    }

    public function family_invites_received()
    {
        return $this->belongsToMany('App\User', 'family_invites', 'to', 'from');
    }

    public function family_invites_sent()
    {
        return $this->belongsToMany('App\User', 'family_invites', 'from', 'to');
    }

    public function is_doctor()
    {
        return $this->is_doctor;
    }

    public function addRelationToUserBy($col, $arg, $role)
    {
        $second_user = User::where($col, '=', $arg)->get()->first();
        $this->relationsLeftToRight()->attach($second_user->id, ['relation'=>$role]);
        $this->relationsRightToLeft()->attach($second_user->id, ['relation' => $this->inverse[$role]]);
    }

    public static function CheckUserExistsBy($col, $arg)
    {
        $user = User::where($col, '=', $arg)->get()->first();

        if(!is_null($user))
            return true;

        return false;
    }

    public static function getUserBy($col, $arg)
    {
        $user = User::where($col, '=', $arg)->get()->first();

        return $user;
    }
}
