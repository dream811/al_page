<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\SeamlessLog;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
//아너링크 api
class HonorLinkRecvController extends Controller
{
    protected $strExtraEvoApiDomain = "";
    protected $strExtraEvoApiKey = "";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function GetBalance(Request $request)
    {
        $res_param = [
            'balance' => 4000,
        ];
        
        $data = $request->all();

        SeamlessLog::create(
            [
                'data' => json_encode($data),
                'data_type' => 'GetBalance',
            ]
        );

        return response()->json($res_param); 
    }
 
    public function ChangeBalance(Request $request)
    {
        $res_param = [
            'balance' => 4000,
        ];
        
        $data = $request->all();

        SeamlessLog::create(
            [
                'data' => json_encode($data),
                'data_type' => 'ChangeBalance',
            ]
        );

        return response()->json($res_param); 
    }
}
