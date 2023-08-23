<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Exchange;
use App\Models\Trading;
use App\Models\QNA;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $deposit = Cash::where
        return view('agent.home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function mypage(Request $request)
    {
        return view('agent.mypage');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function betLimit(Request $request)
    {
        return view('agent.betLimit');
    }

    public function dailyReport(Request $request)
    {
        return view('agent.dailyReport');
    }

    public function notifications(Request $request)
    {
        return view('agent.notifications');
    }


    public function changeMyInfo($type = null, Request $request)
    {
        $agent = User::where('id', Auth::id());

        if($type == 0){//알림금액
            $agent->update([
                'alert_on_balance' => $request->post('alert_on_balance')
            ]);
            return response()->json(["status" => "success", "data" => '성공']);
        }else if($type == 1){//비번
            $agent->update([
                'password' => Hash::make($request->post('password'))
            ]);
            return response()->json(["status" => "success", "data" => '성공']);
        }else if($type == 2){//은행정보
            $agent->update([
                'account_number' => $request->post('account_number'),
                'bank_name' => $request->post('bank_name'),
                'phone' => $request->post('phone'),
                'account_holder' => $request->post('account_holder'),
            ]);
            return response()->json(["status" => "success", "data" => '성공']);
        }else if($type == 3){//api token
            $uuid = $this->generateUUID();
            $agent->update([
                'token' => $uuid// $request->post('token'),
            ]);
            return response()->json(["status" => "success", "data" => $uuid]);
        }else if($type == 4){//callback token
            $uuid = $this->generateUUID();
            $agent->update([
                'callback_token' => $uuid//$request->post('callback_token'),
            ]);
            return response()->json(["status" => "success", "data" => $uuid]);
        }else if($type == 5){// callback url
            $agent->update([
                'callback_url' => $request->post('callback_url'),
            ]);
            return response()->json(["status" => "success", "data" => '성공']);
        }else if($type == 6){ // detail callback url
            $agent->update([
                'detail_callback_url' => $request->post('detail_callback_url'),
            ]);
            return response()->json(["status" => "success", "data" => '성공']);
        }
    }

    public function generateUUID()
    {
        $data =  random_bytes(16);
        assert(strlen($data) == 16);

        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

        // Output the 36 character UUID.
        $key =  vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
        return $key;
    }
}
