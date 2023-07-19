<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Hash;

class Bless4BetSendController extends Controller
{
    protected $CALLBACK_TOKEN = '';
    protected $OPERATE_CODE = '';
    protected $SECERET_KEY = '';

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

    /**
     * req
     * 
     * 
     */

    public function LaunchGame(Request $request)
    {
        $operator_code = "dv77";
        $request_time = "";
        $method_name = "";
        $secret_key = "";

        $sign_key = MakeSignKey($operator_code, $request_time, $method_name, $secret_key);
        

        $req_param = [
            'OperatorCode' => $operator_code,
            'MemberName' => "dv77",
            'Password' => "qwe123",
            'ProductID' => "1091",
            'GameType' => "1",
            'LanguageCode' => "1",
            'Platform' => "0",
            'Sign' => $sign_key,
            'RequestTime' => "2023031510421"
        ];

    }

    public function GetGameList(Request $request)
    {
        $req_param = [
            'OperatorCode' => $operator_code,
            'Sign' => $sign_key,
            'RequestTime' => "2023031510421"
        ];
    }

    public function GetAgentInfo(Request $request)
    {
        $operator_code = "";
        $request_time = "";
        $method_name = "";
        $secret_key = "";

        $sign_key = MakeSignKey($operator_code, $request_time, $method_name, $secret_key);
        
        $req_param = [
            ''
        ];
    }

    public function GetBetDetail(Request $request)
    {
        $operator_code = "";
        $request_time = "";
        $method_name = "";
        $secret_key = "";

        $sign_key = MakeSignKey($operator_code, $request_time, $method_name, $secret_key);
        
        $req_param = [
            ''
        ];

    }

    public function GetBetDetail2(Request $request)
    {
        $header = $request->header('Authorization');
        if($header == "authorization"){
            return '{
                "id": 1,
                "username": "name",
                "firstName": "string",
                "lastName": "string",
                "email": "string",
                "password": "string",
                "phone": "string",
                "userStatus": 1
              }';
        }else{
            return response(['message'=>'Invalid token'], 405);
        }
        
    }

    

    
}
