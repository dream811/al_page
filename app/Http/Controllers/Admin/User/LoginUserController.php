<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bank;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class LoginUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($ids, Request $request)
    {

        $title = "실시간접속자";
        if ($request->ajax()) {
            $ids = explode('|', $ids);
            //where('type', 'USER')
            $users = User::where('is_del', 0)
                ->whereIn('id', $ids);
                //->orderBy('name');

            return DataTables::of($users)
                ->addIndexColumn()
                
                // ->editColumn('is_use', function ($row) {
                //     $checked = $row->is_use == 2 ?  "" : "checked";
                //     $btn='<div>
                //         <div class="custom-control custom-switch">
                //         <input type="checkbox" class="custom-control-input chk-is-use" '.$checked.' data-id="'.$row->id.'" id="chkUse_'.$row->id.'">
                //         <label class="custom-control-label" for="chkUse_'.$row->id.'"></label>
                //         </div>
                //     </div>';
                //     return $btn;
                // })
                ->editColumn('level', function ($row) {
                    $level = $row->userLevel->name;
                    return $level;
                })
                ->editColumn('nickname', function($row){
                    $tags = '<li style="list-style: none;" class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        <span class="badge" style="padding:0px; right:unset; top:3px; font-size:12px;">'.$row->nickname.'</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                        <a href="javascript:void(0)" class="dropdown-item btnEditMember" data-id="'.$row->id.'">
                            <span class="float-center text-muted">'.$row->nickname.' 정보수정</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item btnGotoDeposit" data-id="'.$row->id.'">
                            <span class="float-center text-muted text-sm " >입금내역</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item btnGotoWithdraw" data-id="'.$row->id.'">
                            <span class="float-center text-muted text-sm">출금내역</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item btnGotoTrading" data-id="'.$row->id.'" >
                            <span class="float-center text-muted text-sm" >구매내역</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item btnGotoResult" data-id="'.$row->id.'">
                            <span class="float-center text-muted text-sm">배당금내역</span>
                        </a>
                        </div>
                    </li>';
                    return $tags;
                })
                ->addColumn('bank_name', function ($row) {
                    $bank = Bank::find($row->bank_id);
                    $bank_name = $bank == null ? "" : $bank->name;
                    
                    return $bank_name;
                })
                // ->addColumn('action', function ($row) {
                //     $btn = '<button type="button" data-id="' . $row->id . '" style="font-size:10px !important;" class="btn btn-xs btn-primary btnEdit">수정</button>';
                //     $btn .= '<button type="button" data-id="' . $row->id . '" style="font-size:10px !important;" class="ml-1 btn btn-xs btn-danger btnDelete">삭제</button>';
                //     return $btn;
                // })
                ->rawColumns(['is_use', 'level', 'nickname'])
                ->make(true);
        }
        return view('admin.user.login_list', compact('title', 'ids'));
    }

    //수정하려는 유저 선택(post)
    public function edit($userId = 0)
    {
        $title = "수정";
        if ($userId == 0) {
            $title = "추가";
        }

        $user = User::where('is_del', 0)
            ->where('id', $userId)
            ->firstOrNew();
        $bank_list = Bank::where('is_use', 1)->get();
        return view('admin.user.detail', compact('title', 'userId', 'user', 'bank_list'));
    }
    public function save(Request $request)
    {
        //$path = $request->post('beforeImage');

        // if ($request->file('fileImage')) {
        //     if ($path != "") {
        //         Storage::delete('public/' . $path);
        //     }

        //     $imageFile = $request->file('fileImage');
        //     $new_name = rand() . '.' . $imageFile->getClientOriginalExtension();
        //     $old_name = $imageFile->getClientOriginalName();
        //     $path = url('storage') . '/' . $request->file('fileImage')->storeAs('/uploads/profile_images', $new_name, 'public');
        // }
        $data = [
            'name' => $request->post('mb_name'),
            'str_id' => $request->post('str_id'),
            'email' => $request->post('email'),
            'phone' => $request->post('phone'),
            //'mb_profile' => $path,
            //'bIsAdmin' => $request->post('selRole') == "ADMIN" ? 1 : 0,
            'level' => $request->post('level'),
            'money' => $request->post('money'),
            'nickname' => $request->post('nickname'),
            'referer' => $request->post('referer'),
            'is_use' => $request->post('is_use'),
            'type' => 'USER',
            'bank_id' => $request->post('bank_id'),
            'bank_account' => $request->post('bank_account'),
            'bank_user' => $request->post('bank_user'),
            // 'business_number' => $request->post('txtBusinessNumber'),
            // 'business_phone' => $request->post('txtBusinessPhone'),
            // 'business_type' => $request->post('txtBusinessType'),
            // 'business_kind' => $request->post('txtBusinessKind'),
            // 'mb_zip1' => $request->post('mb_zip1'),
            // 'mb_addr1' => $request->post('mb_addr1'),
            // 'mb_addr2' => $request->post('mb_addr2'),
            // 'bIsUsed' => $request->post('rdoIsUsed'),
            'is_del' => 0,
        ];
        // if ($request->post('id') == 0) {
        //     $data['password']  = Hash::make($request->post('password'));
        // }
        if ($request->post('password') != "") {
            $data['password']  = Hash::make($request->post('password'));
        }
        // $date = new DateTime;
        // if ($request->post('is_use') == 0) {
        //     $data['mb_intercept_date']  = $date->format('Ymd');
        // }
        $user = User::updateOrCreate(
            ['id' => $request->post('id')],
            $data
        );
        //$user->image = asset('storage/'. $user->image);
        return response()->json(["status" => "success", "data" => $user]);
    }
    //사용상태 변경
    public function state($userId, Request $request)
    {
        $status = $request->post('status');
        $user = User::where('id', $userId)
            ->update(            
                ['is_use' => $status]
            );
        return response()->json(["status" => "success", "data" => $user]);
    }

    public function check(Request $request)
    {
        $email_check = 1;
        $id_check = 1;
        $referer_check = 1;
        // if ($request->get('userId') == 0) {
        //     if (User::where('strID', $request->get('txtID'))->count()) {
        //         $id = 0;
        //     }
        //     if (User::where('email', $request->get('txtEmail'))->count()) {
        //         $email = 0;
        //     }
        // } else {
            //$user = User::where('is_del', 0);
            if (User::where('str_id', $request->post('str_id'))->count()) {
                $id_check = 0;
            }

            if ($request->post('referer') != "" && User::where('referer', $request->post('referer'))->count() <= 0) {
                $referer_check = 0;
            }
            if (User::where('email', $request->post('email'))->count()) {
                $email_check = 0;
            }
        // }
        return response()->json(["status" => "success", "data" => compact('id_check', 'referer_check', 'email_check')]);
    }

    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveMarketProduct(Request $request)
    {
        //$product  = Product::where('nIdx', $request->post('id'))->first();
        $product  = Product::where('nIdx', 1)->first();
        $coupang = new CoupangConnector();
        //$coupang->getCategoryInfoViaCode(56174);
        $coupang->getCategoryMetaInfo(56174);
        // $coupang->getCategoryListInfo();
        // $coupang->addOutboundShippingCenter();
        // $coupang->addReturnShippingCenter();
        $coupang->addProduct();
        //return response()->json(["status" => "success", "data" => $marketAccount]);
    }
    /**
     * Display the specified resource.
     *
     */
    public function accountShow($marketId = 0, $accountId = 0)
    {
        //
        // $marketAccount  = MarketAccount::where('nIdx', $accountId)->first();
        return response()->json(["status" => "success", "data" => $marketAccount]);
    }

    public function accountUpdate($marketId = 0, $accountId = 0, Request $request)
    {
        // $marketAccount = MarketAccount::find($accountId);
        // $marketAccount->strAccountId = $request->post('txtAccountId');
        // $marketAccount->strAccountPwd = $request->post('txtAccountPwd');
        // $marketAccount->strAPIAccessKey = $request->post('txtAPIAccessKey');
        // $marketAccount->update();
        return response()->json(["status" => "success", "data" => $marketAccount]);

        // $tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default

        // $title = "오픈마켓계정관리";

        // $marketAccounts = MarketAccount::where('bIsDel', 0)
        //         ->where('nMarketIdx', $id)
        //         ->where('nUserId', Auth::id())
        //         ->orderBy('nIdx')->paginate(15);
        //dd($markets);
        // return view('operation.OpenMarketAccountManage', compact('title', 'markets'))
        //    ->with('i', (request()->input('page', 1) - 1) * 15);
        //return response()->json(["status" => "success", "data" => $marketAccount]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $accountId
     * @return \Illuminate\Http\Response
     */
    public function delete($userId)
    {
        $user = User::where('id', $userId)
            ->update(            
                ['is_del' => 1]
            );
        //$user->image = asset('storage/'. $user->image);
        return response()->json(["status" => "success", "data" => $user]);
    }
}
