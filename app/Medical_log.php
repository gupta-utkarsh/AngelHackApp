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
}
