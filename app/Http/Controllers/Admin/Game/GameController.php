<?php

namespace App\Http\Controllers\Admin\Game;

use App\Http\Controllers\Controller;
use App\Models\AgentCompany;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bank;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class GameController extends Controller
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

        $title = "파트너관리";

        
        return view('admin.stats.list');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function status(Request $request)
    {
        $agent_id = $request->get('agentId');
        $game_id = $request->get('gameId');
        $status = $request->get('status');
        AgentCompany::updateOrCreate(
            [
                'agent_id' => $agent_id,
                'game_id' => $game_id,
            ],
            [
                'agent_id' => $agent_id,
                'game_id' => $game_id,
                'status' => $status
            ]
        );
        
        return response()->json(["status" => "success", "data" => ""]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function childAgentStats(Request $request)
    {
        return view('admin.stats.childAgentStats');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function agetnDistributionStats(Request $request)
    {
        return view('admin.stats.agetnDistributionStats');
    }
}
