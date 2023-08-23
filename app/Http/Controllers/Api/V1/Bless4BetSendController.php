<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\RUser;
use App\Models\SeamlessLog;
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
        $url = "https://bless4bet.com/api/LaunchGame";
        $operator_code = "dv77";
        $request_time = "20230727100423";//date('YmdHis');//"";
        $method_name = "launchgame";
        $secret_key = "E7V5";

        $sign_key = $this->MakeSignKey($operator_code, $request_time, $method_name, $secret_key);
        
        $user = RUser::where('id', $request->get('userId'))->first();
        $req_param = [
            'OperatorCode' => $operator_code,
            'MemberName' => $user->agent->account."_".$user->account,
            'DisplayName' => $user->account,
            'Password' => $user->account."***",
            'ProductID' => 1002,
            'GameType' => 2,
            'LanguageCode' => "1",
            'Platform' => "0",
            'Sign' => $sign_key,
            // 'IPAddress' => "211.115.107.62",
            'RequestTime' => $request_time
        ];

        $strjson = json_encode($req_param);
        $method = "POST";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type:  application/json;charset=UTF-8", ));//"Authorization:" . $authorization
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $strjson);
        $result = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        SeamlessLog::create(
            [
                'data' => json_encode($result),
            ]
        );
        curl_close($curl);
        $res_data = json_decode($result);
        if($res_data->ErrorCode == 0){
            return response()->json(["status" => "success", "data" => $res_data]); 
        }else{
            return response()->json(["status" => "failed", "data" => $res_data]); 
        }
    }

    public function GetGameList(Request $request)
    {
        $url = "https://bless4bet.com/api/GetGameList";
        $operator_code = "dv77";
        $request_time = date('YmdHis');//"";
        $method_name = "getgamelist";
        $secret_key = "E7V5";

        $sign_key = $this->MakeSignKey($operator_code, $request_time, $method_name, $secret_key);
        

        $req_param = [
            'OperatorCode' => $operator_code,
            'MemberName' => "dv77",
            'Password' => "qwe123",
            'ProductID' => "1006",
            'GameType' => "1",
            'LanguageCode' => "1",
            'Platform' => "0",
            'Sign' => $sign_key,
            'RequestTime' => $request_time
        ];

        $strjson = json_encode($req_param);
        $method = "GET";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type:  application/json;charset=UTF-8", ));//"Authorization:" . $authorization
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $strjson);
        $result = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);
        $res_data = json_decode($result);
        if($res_data->ErrorCode == 0){
            return response()->json(["status" => "success", "data" => $res_data]); 
        }else{
            return response()->json(["status" => "failed", "data" => $res_data]); 
        }
    }

    public function GetAgentInfo(Request $request)
    {
        $operator_code = "";
        $request_time = "";
        $method_name = "";
        $secret_key = "";

        $sign_key =$this->MakeSignKey($operator_code, $request_time, $method_name, $secret_key);
        
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

        $sign_key =$this->MakeSignKey($operator_code, $request_time, $method_name, $secret_key);
        
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
