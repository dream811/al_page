<?php

namespace App\Http\Controllers\Agent\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class AgentController extends Controller
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
        return view('admin.partner.list');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function agentTree(Request $request)
    {
        if ($request->ajax()) {
            $agents = User::all();
            return response()->json(["status" => "success", "data" => $agents]);
        }
        return view('user.agent.agentTree');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function agentList(Request $request)
    {
        if ($request->ajax()) {
            // $agents = User::all();
            // return response()->json(["status" => "success", "data" => $agents]);

            $users = User::where('tree_list', 'LIKE', '%('.Auth::id().')%')->get();
            return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('upper', function ($row)
            {
                if($row->upperAgent != null){
                    return $row->upperAgent->account;    
                }
                return "";
            })
            ->editColumn('level_id', function($row){
                return $row->level->name;
            })
            ->make(true);
        }
        return view('user.agent.agentList');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function agentDetail($id)
    {
            $agent = User::find($id);
            return response()->json(["status" => "success", "data" => $agent]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function request(Request $request)
    {
        return view('admin.agent.request');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deposit(Request $request)
    {
        return view('admin.agent.deposit');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function withdraw(Request $request)
    {
        return view('admin.agent.withdraw');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function transaction(Request $request)
    {
        return view('admin.agent.transaction');
    }

    public function agent(Request $request)
    {
        return view('admin.agent.agent');
    }

    public function list(Request $request)
    {
        return view('admin.agent.list');
    }

    public function pointTransaction(Request $request)
    {
        return view('admin.agent.pointTransaction');
    }

    public function cashTransaction(Request $request)
    {
        return view('admin.agent.cashTransaction');
    }
}
