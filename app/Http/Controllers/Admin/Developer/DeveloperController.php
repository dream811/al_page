<?php

namespace App\Http\Controllers\Admin\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bank;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class DeveloperController extends Controller
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
    public function index(Request $request)
    {

        $title = "파트너관리";

        
        return view('admin.developer.list');
    }

    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function openApi(Request $request)
    {
        return view('admin.developer.openApi');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function callbackOpenApi(Request $request)
    {
        return view('admin.developer.callbackOpenApi');
    }

    public function callbackOpenApiTest(Request $request)
    {
        return view('admin.developer.callbackOpenApiTest');
    }

    public function callbackOpenApiLog(Request $request)
    {
        return view('admin.developer.callbackOpenApiLog');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function apiErrorLog(Request $request)
    {
        return view('admin.developer.apiErrorLog');
    }
}
