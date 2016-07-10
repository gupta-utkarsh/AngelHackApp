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

   			array_push($result['diseases'], $this->searchDiseases($object->pivot->second_user, $param, $object->pivot->relation));

   			// medical logs objects
            array_push($result['symptoms'], $this->searchSymptoms($object->pivot->second_user, $param, $object->pivot->relation));

   			array_push($result['medicines'], $this->searchMeds($object->pivot->second_user, $param, $object->pivot->relation));
   		}

         return view('pages/doctor_patient_family_search',[
               'diseases' => $result['diseases'],
               'symptoms' => $result['symptoms'],
               'medicines' => $result['medicines'],
               'patient' => $patient 

            ]);   
   	}

   	protected function searchDiseases($user_id, $param, $relation)
   	{	
   		$obj = array();

   		$user = User::getUserBy('id', $user_id);

   		//$meds = explode(', ', $user->medical_logs->medicines);

   		$obj['models'] = $user->appointments()->whereNotNull('disease')->where('disease', 'LIKE', '%'.$param.'%')->get();
   		$obj['relation'] = $relation;
   		return $obj;
   	}

   	protected function searchSymptoms($user_id, $param, $relation)
   	{	

   		$obj = array();
   		$user = User::getUserBy('id', $user_id);

   		//$meds = explode(', ', $user->medical_logs->medicines);

   		$obj['models'] = $user->medical_logs()->whereNotNull('symptoms')->where('symptoms', 'LIKE', '%'.$param.'%')->get();
   		$obj['relation'] = $relation;
   		return $obj;
   	}

   	protected function searchMeds($user_id, $param, $relation)
   	{	

   		$obj = array();
   		$user = User::getUserBy('id', $user_id);

   		//$meds = explode(', ', $user->medical_logs->medicines);

   		$obj['models'] = $user->medical_logs()->whereNotNull('medicines')->where('medicines', 'LIKE', '%'.$param.'%')->get();
   		$obj['relation'] = $relation;
   		return $obj;
   	}
}
