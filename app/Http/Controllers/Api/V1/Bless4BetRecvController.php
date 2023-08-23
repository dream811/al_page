<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\SeamlessLog;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Hash;

class Bless4BetRecvController extends Controller
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


    public function GetBalance(Request $request)
    {
        $operator_code = "dv77";
        $request_time = date('YmdHis');//"";
        $user = 
        $res_param = [
            'ErrorCode' => 0,
            'ErrorMessage' => "Success",
            'Balance' => "1230",
            'BeforeBalance' => 0,
        ];
        
        $data = $request->all();

        SeamlessLog::create(
            [
                'data' => json_encode($res_param),
                'data_type' => 'GetBalance',
            ]
        );

        $res_data = json_encode($res_param);
        //if($res_data->ErrorCode == 0){
            return response()->json($res_param); 
        //}else{
           // return response()->json(["status" => "failed", "data" => $res_data]); 
        //}
    }

    
    public function PlaceBet(Request $request)
    {
        $res_param = [
            'ErrorCode' => 0,
            'ErrorMessage' => "Success",
            'Balance' => "1230",
            'BeforeBalance' => 0,
        ];
        
        $data = $request->all();

        SeamlessLog::create(
            [
                'data' => json_encode($data),
                'data_type' => 'PlaceBet',
            ]
        );

        $res_data = json_encode($res_param);
        //if($res_data->ErrorCode == 0){
            return response()->json($res_param); 
        //}else{
           // return response()->json(["status" => "failed", "data" => $res_data]); 
        //}
    }
    

    public function GameResult(Request $request)
    {
        $res_param = [
            'ErrorCode' => 0,
            'ErrorMessage' => "Success",
            'Balance' => "1230",
            'BeforeBalance' => 0,
        ];
        
        $data = $request->all();

        SeamlessLog::create(
            [
                'data' => json_encode($data),
                'data_type' => 'GameResult',
            ]
        );

        //$res_data = json_encode($res_param);
        //if($res_data->ErrorCode == 0){
            return response()->json($res_param); 
        //}else{
           // return response()->json(["status" => "failed", "data" => $res_data]); 
        //}
    }

    public function RollBack(Request $request)
    {
        $res_param = [
            'ErrorCode' => 0,
            'ErrorMessage' => "Success",
            'Balance' => "1230",
            'BeforeBalance' => 0,
        ];
        
        $data = $request->all();

        SeamlessLog::create(
            [
                'data' => json_encode($data),
                'data_type' => 'RollBack',
            ]
        );

        $res_data = json_encode($res_param);
        //if($res_data->ErrorCode == 0){
            return response()->json($res_data); 
        //}else{
           // return response()->json(["status" => "failed", "data" => $res_data]); 
        //}
    }


    public function CancelBet(Request $request)
    {
        $res_param = [
            'ErrorCode' => 0,
            'ErrorMessage' => "Success",
            'Balance' => "1230",
            'BeforeBalance' => 0,
        ];
        
        $data = $request->all();

        SeamlessLog::create(
            [
                'data' => json_encode($data),
                'data_type' => 'CancelBet',
            ]
        );

        $res_data = json_encode($res_param);
        //if($res_data->ErrorCode == 0){
            return response()->json($res_param); 
        //}else{
           // return response()->json(["status" => "failed", "data" => $res_data]); 
        //}
    }

    public function Bonus(Request $request)
    {
        $res_param = [
            'ErrorCode' => 0,
            'ErrorMessage' => "Success",
            'Balance' => "1230",
            'BeforeBalance' => 0,
        ];
        
        $data = $request->all();

        SeamlessLog::create(
            [
                'data' => json_encode($data),
                'data_type' => 'Bonus',
            ]
        );

        $res_data = json_encode($res_param);
        //if($res_data->ErrorCode == 0){
            return response()->json($res_param); 
        //}else{
           // return response()->json(["status" => "failed", "data" => $res_data]); 
        //}
    }
    //3.7
    public function Jackpot(Request $request)
    {
        $res_param = [
            'ErrorCode' => 0,
            'ErrorMessage' => "Success",
            'Balance' => "1230",
            'BeforeBalance' => 0,
        ];
        
        $data = $request->all();

        SeamlessLog::create(
            [
                'data' => json_encode($data),
                'data_type' => 'Jackpot',
            ]
        );

        $res_data = json_encode($res_param);
        //if($res_data->ErrorCode == 0){
            return response()->json($res_param); 
        //}else{
           // return response()->json(["status" => "failed", "data" => $res_data]); 
        //}
    }

    //3.8
    public function MobileLogin(Request $request)
    {
        $res_param = [
            'ErrorCode' => 0,
            'ErrorMessage' => "Success",
            'Balance' => "1230",
            'BeforeBalance' => 0,
        ];
        
        $data = $request->all();

        SeamlessLog::create(
            [
                'data' => json_encode($data),
                'data_type' => 'MobileLogin',
            ]
        );

        $res_data = json_encode($res_param);
        //if($res_data->ErrorCode == 0){
            return response()->json($res_param); 
        //}else{
           // return response()->json(["status" => "failed", "data" => $res_data]); 
        //}
    }

    //3.9
    public function BuyIn(Request $request)
    {
        $res_param = [
            'ErrorCode' => 0,
            'ErrorMessage' => "Success",
            'Balance' => "1230",
            'BeforeBalance' => 0,
        ];
        
        $data = $request->all();

        SeamlessLog::create(
            [
                'data' => json_encode($data),
                'data_type' => 'BuyIn',
            ]
        );

        $res_data = json_encode($res_param);
        //if($res_data->ErrorCode == 0){
            return response()->json($res_param); 
        //}else{
           // return response()->json(["status" => "failed", "data" => $res_data]); 
        //}
    }

    //3.10
    public function BuyOut(Request $request)
    {
        $res_param = [
            'ErrorCode' => 0,
            'ErrorMessage' => "Success",
            'Balance' => "1230",
            'BeforeBalance' => 0,
        ];
        
        $data = $request->all();

        SeamlessLog::create(
            [
                'data' => json_encode($data),
                'data_type' => 'BuyOut',
            ]
        );

        $res_data = json_encode($res_param);
        //if($res_data->ErrorCode == 0){
            return response()->json($res_param); 
        //}else{
           // return response()->json(["status" => "failed", "data" => $res_data]); 
        //}
    }

    //3.11
    public function PushBet(Request $request)
    {
        $res_param = [
            'ErrorCode' => 0,
            'ErrorMessage' => "Success",
            'Balance' => "1230",
            'BeforeBalance' => 0,
        ];
        
        $data = $request->all();

        SeamlessLog::create(
            [
                'data' => json_encode($data),
                'data_type' => 'PushBet',
            ]
        );

        $res_data = json_encode($res_param);
        //if($res_data->ErrorCode == 0){
            return response()->json($res_param); 
        //}else{
           // return response()->json(["status" => "failed", "data" => $res_data]); 
        //}
    }
}
