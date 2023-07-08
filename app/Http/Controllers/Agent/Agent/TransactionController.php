<?php

namespace App\Http\Controllers\Agent\Agent;

use App\Http\Controllers\Controller;
use App\Models\AgentCTransaction;
use App\Models\AgentPTransaction;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bank;
use DateTime;
use Yajra\DataTables\DataTables;

class TransactionController extends Controller
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

        
        return view('admin.partner.list');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cashHistory(Request $request)
    {

        $title = "캐쉬 트랜잭션 내역";
        if ($request->ajax()) {
            $transactions = AgentCTransaction::all();
            return DataTables::of($transactions)
            ->addIndexColumn()
            ->addColumn('agent', function ($row)
            {
                return $row->agent->account;
                
            })
            ->make(true);
        }
        
        return view('user.agent.cTransactionHistory');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function pointHistory(Request $request)
    {

        $title = "포인트 태랜잭션 내역";
        if ($request->ajax()) {
            $transactions = AgentCTransaction::all();
            return DataTables::of($transactions)
            ->addIndexColumn()
            ->addColumn('agent', function ($row)
            {
                return $row->agent->account;
                
            })
            ->make(true);
        }
        
        return view('user.agent.pTransactionHistory');
    }

}
