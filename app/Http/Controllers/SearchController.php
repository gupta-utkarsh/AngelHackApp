<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Doctor;
use App\Appointment;
use App\Medical_log;

class SearchController extends Controller
{
    

   	public function index(Request $request, $name)
   	{
   		$user = self::getCurrentUser();

         $result =  array();
         $result['diseases'] = array();
         $result['symptoms'] = array();
         $result['medicines']= array();

   		$patient = User::getUserBy('name', $name);

   		$object_array = $patient->relationsLeftToRight;

   		$param = $request->input('value');

   		foreach ($object_array as $object) 
   		{
   			// appointment logs objects

   			array_push($result['diseases'], $this->searchDiseases($object->pivot->second_user, $param));

   			// medical logs objects
            array_push($result['symptoms'], $this->searchSymptoms($object->pivot->second_user, $param));

   			array_push($result['medicines'], $this->searchMeds($object->pivot->second_user, $param));
   		}

         dd($result);


   	}

   	protected function searchDiseases($user_id, $param)
   	{	
   		$user = User::getUserBy('id', $user_id);

   		//$meds = explode(', ', $user->medical_logs->medicines);

   		return $user->appointments()->whereNotNull('disease')->where('disease', 'LIKE', '%'.$param.'%')->get();

   		//return $result;
   	}

   	protected function searchSymptoms($user_id, $param)
   	{	

   		$user = User::getUserBy('id', $user_id);

   		//$meds = explode(', ', $user->medical_logs->medicines);

   		return $user->medical_logs()->whereNotNull('symptoms')->where('symptoms', 'LIKE', '%'.$param.'%')->get();

   		//return $result;
   	}

   	protected function searchMeds($user_id, $param)
   	{	

   		$user = User::getUserBy('id', $user_id);

   		//$meds = explode(', ', $user->medical_logs->medicines);

   		return $user->medical_logs()->whereNotNull('medicines')->where('medicines', 'LIKE', '%'.$param.'%')->get();

   		//return $result;
   	}
}
