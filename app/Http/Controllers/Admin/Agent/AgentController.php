<?php

namespace App\Http\Controllers\Admin\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\VideoCompany;
use App\Models\GameCompany;
use DateTime;
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
    public function agentList(Request $request)
    {
        $title = "에이전트 목록";
        if ($request->ajax()) {
            $agents = Agent::orderBy('tree_list')->get();
            // return response()->json(["status" => "success", "data" => $agents]);

            //$users = User::where('tree_list', 'LIKE', '%('.Auth::id().')%')->get();
            return DataTables::of($agents)
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
        return view('admin.agent.agentList', compact('title'));
    }

    public function agentDetail($id)
    {
        $title = "상세";
        $agent = Agent::find($id);

        $agentId = $id;
        // return response()->json(["status" => "success", "data" => $agent]);
        return view('admin.agent.agentDetail', compact('agentId', 'title', 'agent'));
    }

    /**
     * 게임사 설정.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function company(Request $request)
    {
        $title = "게임사 설정";
        // $agents = Agent::where('state', 1)->get();
        $agents = Agent::get();

        $vcompanies = VideoCompany::get();
        $gcompanies = GameCompany::get();
        return view('admin.agent.company', compact('title', 'agents', 'vcompanies', 'gcompanies'));
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
