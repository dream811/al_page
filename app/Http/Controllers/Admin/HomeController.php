<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Exchange;
use App\Models\Trading;
use App\Models\QNA;
use DB;

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
        return view('admin.home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function mypage(Request $request)
    {
        return view('admin.mypage');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function betLimit(Request $request)
    {
        return view('admin.betLimit');
    }

    public function dailyReport(Request $request)
    {
        return view('admin.dailyReport');
    }

    public function notifications(Request $request)
    {
        return view('admin.notifications');
    }


    public function onLogin(Request $request)
    {
        $strID = $request->input('strID');
        $strPW = $request->input('strPwd');
        $strIP = $this->getIP();

        $obj = (object)["strIP" => $strIP, "strID" => $strID, "strPW" => $strPW];
        $objRet = $this->excuteServerCmd(HTTP_ADMIN_ACTN_LOGIN, $obj);

        if($objRet->nRetCode == RET_SUCCESS)
        {
            $adminInfo = json_decode($objRet->strValue);
            $request->session()->put('adminInfo', $adminInfo);
            return response()->json([
                'success' => $objRet->nRetCode,
                'message' => "로그인 되었습니다."
            ]);
        }
        else
        {
            return response()->json([
                'success' => $objRet->nRetCode,
                'message' => $objRet->strValue
            ]);
        }
    }
}
