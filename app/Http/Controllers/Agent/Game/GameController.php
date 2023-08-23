<?php

namespace App\Http\Controllers\Agent\Game;

use App\Http\Controllers\Controller;
use App\Models\BetLimit;
use App\Models\GameHistory;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Auth;
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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $title="게임내역";
        // $fromDate = date("Y-m-d", strtotime("-1 months"));
        // $toDate = date("Y-m-d");

        if ($request->ajax()) {
            $vendors = GameHistory::all();
            return DataTables::of($vendors)
            ->addIndexColumn()
            // ->addColumn('image', function ($row)
            // {
            //     return $row->vendor_key.".png";
            // })
            ->make(true);
        }
        return view('agent.game.gameHistory');
    }

    public function gameHistory(Request $request)
    {
        $title="게임내역";
        // $fromDate = date("Y-m-d", strtotime("-1 months"));
        // $toDate = date("Y-m-d");

        if ($request->ajax()) {
            $game_histories = GameHistory::all();
            return DataTables::of($game_histories)
            ->addIndexColumn()
            ->editColumn('type', function ($row)
            {
                if($row->type == "balance_withdraw"){
                    return "회수";
                }elseif($row->type == "balance_deposit"){
                    return "출금";
                }
                
            })
            ->addColumn('agent', function ($row)
            {
                return $row->agent->account;
                
            })
            ->addColumn('account', function ($row)
            {
                return $row->user->account;
            })
            // ->addColumn('game', function ($row)
            // {
            //     return $row->game->name;
            // })
            // ->addColumn('vendor', function ($row)
            // {
            //     return "";//$row->vendor->name;
            // })
            ->make(true);
        }
        return view('agent.game.gameHistory');
    }

    public function betLimit(Request $request)
    {
        $title="베팅제한";

        if ($request->ajax()) {
            $bet_limits = BetLimit::where('agent_id', Auth::id());
            return DataTables::of($bet_limits)
            ->addIndexColumn()
            ->editColumn('type', function ($row)
            {
                if($row->type == "global"){
                    return "전역";
                }elseif($row->type == "vendor"){
                    return "벤더";
                }elseif($row->type == "game"){
                    return "게임";
                }
            })
            ->addColumn('agent', function ($row)
            {
                return $row->agent->account;
                
            })
            ->addColumn('game_name', function ($row)
            {
                return $row->game != null ? $row->game->ko_name : "";
                
            })
            ->make(true);
        }
        return view('agent.game.betLimit');
    }
    
}
