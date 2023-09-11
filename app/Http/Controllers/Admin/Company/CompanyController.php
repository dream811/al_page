<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bank;
use App\Models\GameCompany;
use App\Models\VideoCompany;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $title = "게임사관리";

        
        return view('admin.stats.list');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function vendors(Request $request)
    {
        $title = "벤더사 목록";
        if ($request->ajax()) {
            $vcompanies = VideoCompany::where('nComType', 0)->get();
            // return response()->json(["status" => "success", "data" => $agents]);

            //$users = User::where('tree_list', 'LIKE', '%('.Auth::id().')%')->get();
            return DataTables::of($vcompanies)
            ->addIndexColumn()
            // ->addColumn('upper', function ($row)
            // {
            //     if($row->upperAgent != null){
            //         return $row->upperAgent->account;    
            //     }
            //     return "";
            // })
            // ->editColumn('level_id', function($row){
            //     return $row->level->name;
            // })
            ->make(true);
        }
        return view('admin.company.vendorList', compact('title'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function vcompanies(Request $request)
    {
        $title = "영상사 목록";
        if ($request->ajax()) {
            $vcompanies = VideoCompany::where('nComType', 1)->get();
            // return response()->json(["status" => "success", "data" => $agents]);

            //$users = User::where('tree_list', 'LIKE', '%('.Auth::id().')%')->get();
            return DataTables::of($vcompanies)
            ->addIndexColumn()
            // ->addColumn('upper', function ($row)
            // {
            //     if($row->upperAgent != null){
            //         return $row->upperAgent->account;    
            //     }
            //     return "";
            // })
            // ->editColumn('level_id', function($row){
            //     return $row->level->name;
            // })
            ->make(true);
        }
        return view('admin.company.vcompanyList', compact('title'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function gcompanies(Request $request)
    {
        $title = "게임사 목록";
        if ($request->ajax()) {
            $gcompanies = GameCompany::get();
            // return response()->json(["status" => "success", "data" => $agents]);

            //$users = User::where('tree_list', 'LIKE', '%('.Auth::id().')%')->get();
            return DataTables::of($gcompanies)
            ->addIndexColumn()
            // ->addColumn('upper', function ($row)
            // {
            //     if($row->upperAgent != null){
            //         return $row->upperAgent->account;    
            //     }
            //     return "";
            // })
            // ->editColumn('level_id', function($row){
            //     return $row->level->name;
            // })
            ->make(true);
        }
        return view('admin.company.gcompanyList', compact('title'));
    }
    /**
     * Show default company & game setting page
     *  
     */
    public function default(Request $request)
    {
        $title = "기본설정";
        $vcompanies = VideoCompany::get();
        $gcompanies = GameCompany::get();
        return view('admin.company.defaultSetting', compact('title', 'gcompanies', 'vcompanies'));
    }

}
