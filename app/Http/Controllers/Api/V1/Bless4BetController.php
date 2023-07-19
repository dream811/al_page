<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Hash;

class Bless4BetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function MakeSignKey($operator_code, $request_time, $method_name, $secret_key)
    {
        return md5($operator_code.$request_time.strtolower($method_name).$secret_key);
    }


    public function GetBalance($operator_code, $request_time, $method_name, $secret_key)
    {

    }

    

    
}
