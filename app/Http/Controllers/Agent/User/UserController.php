<?php

namespace App\Http\Controllers\Agent\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bank;
use App\Models\RUser;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class UserController extends Controller
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
        $title="일별정산";
        $fromDate = date("Y-m-d", strtotime("-1 months"));
        $toDate = date("Y-m-d");

        if ($request->ajax()) {
            $users = RUser::all();
            return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('agent', function ($row)
            {
                return $row->agent->account;
                
            })
            ->make(true);
        }
        return view('agent.ruser.userList');
    }

    public function list(Request $request)
    {
        return view('admin.user.list');
    }

    public function transaction(Request $request)
    {
        return view('admin.user.transaction');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userEdit(Request $request)
    {
        return view('admin.user.userEdit');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userList(Request $request)
    {
        return view('admin.user.userList');
    }

    
}
