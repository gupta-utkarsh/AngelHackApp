<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medical_log;
use App\Http\Requests;

class HistoryController extends Controller
{
    protected $user;
    
    public function index()
    {
    	$all_logs = array();

    	$user = self::getCurrentUser();

    	$all_logs = Medical_log::getAllUserLogs($user);

    	return $all_logs;

    }

}
