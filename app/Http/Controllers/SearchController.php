<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    protected $user = self::getCurrentUser();

   	public function index(Request $request, $name)
   	{
   		$result =  array();

   		$patient = User::getUserBy('name', $name);

   		$object_array = $patient->relationsLeftToRight;

   		$param = $request->input('value');

   		foreach ($object in $object_array) 
   		{
   			// appointment logs objects

   			$result['diseases'] = $this->searchDiseases($object->second_user, $param);

   			// medical logs objects

   			$result['symptoms'] = $this->searchSymptoms($object->second_user, $param);

   			$result['medicines'] = $this->searchMeds($object->second_user, $param);
   		}


   	}

   	protected function searchDiseases($user_id, $param)
   	{	

   		$user = User::getUserBy($user_id);

   		//$meds = explode(', ', $user->medical_logs->medicines);

   		return $user->appointment_logs()->whereNotNull('diseases')->where('diseases', 'LIKE', '%'.$param.'%')->get();

   		//return $result;
   	}

   	protected function searchSymptoms($user_id, $param)
   	{	

   		$user = User::getUserBy($user_id);

   		//$meds = explode(', ', $user->medical_logs->medicines);

   		return $user->medical_logs()->whereNotNull('symptoms')->where('symptoms', 'LIKE', '%'.$param.'%')->get();

   		//return $result;
   	}

   	protected function searchMeds($user_id, $param)
   	{	

   		$user = User::getUserBy($user_id);

   		//$meds = explode(', ', $user->medical_logs->medicines);

   		return $user->medical_logs()->whereNotNull('medicines')->where('medicines', 'LIKE', '%'.$param.'%')->get();

   		//return $result;
   	}
}
