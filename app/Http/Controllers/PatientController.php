<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Medical_log;


class PatientController extends Controller
{
    $user = self::getCurrentUser();

    public function index($name)
    {
    	if($user->is_doctor())
    	{
    		$patient = User::getUserBy('name', $name);

    		$all_common_logs = Medical_log::getAllUserLogsforDoctor($user, $patient->id); 

    		// your view goes here
       	}
    }

    public function appendLogs(Request $request, $name)
    {
    	$patient = User::getUserBy('name', $name);

    	if($user->is_doctor())
    	{
    		$user->createMedicalLogForUser($patient, $request->body());
    	}
    	else
    	{
    		//
    	}
    }

    public function familyIndex($name)
    {
    	$patient = User::getUserBy('name', $name);

    	$object_array = $patient->relationsLeftToRight;

    	//$object_array[i]->pivot->first_user = PATIENT ENTERED (center one)
    	//$object_array[i]->pivot->second_user = Which is to be drawn on tree
    	//$object_array[i]->pivot->relations = how second_user is related to first (center one)

    	if($user->is_doctor())
    	{
    		
    		
    		// for doctors /patients/{name}/family
    		
    		// family view with search box
    	}
    	else
    	{
    		if($user->name == $name)
    		{
    			
    			// patients - > their family only. /patients/$user->name/family
    			// family view without search box
    			// with option to add family members via email
    		}

    		
    	}
    }
}
