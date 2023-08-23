<?php

namespace App\Http\Controllers\Agent\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class VendorController extends Controller
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
        $title="벤더리스트";
        // $fromDate = date("Y-m-d", strtotime("-1 months"));
        // $toDate = date("Y-m-d");

        if ($request->ajax()) {
            $vendors = Vendor::all();
            return DataTables::of($vendors)
            ->addIndexColumn()
            ->addColumn('image', function ($row)
            {
                return $row->vendor_key.".png";
            })
            ->make(true);
        }
        return view('agent.vendor.vendorList');
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
