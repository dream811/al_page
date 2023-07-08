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
use DB;

class LevelupController extends Controller
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
    public function index(Request $request)
    {

        $title = "레벨업회원";

        if ($request->ajax()) {
            $users = User::where('type', 'USER')
                ->where('users.level', '<', 9)
                ->where('users.is_use', 1)
                ->where('users.is_del', 0)
                ->leftJoin('user_level', function($join) {
                    $join->on('user_level.level', '=', 'users.level');
                })->where('users.buy_sum', '>', DB::raw('user_level.levelup_amount'))
                ->orderBy('users.name')->select(['users.*']);


            return DataTables::of($users)
                ->addIndexColumn()
                
                ->editColumn('levelup', function ($row) {
                    
                    // $btn='<div>
                    //     <div class="custom-control custom-switch">
                    //     <input type="checkbox" class="custom-control-input chk-is-use" data-id="'.$row->id.'" id="chkUse_'.$row->id.'">
                    //     <label class="custom-control-label" for="chkUse_'.$row->id.'"></label>
                    //     </div>
                    // </div>';
                    $btn = '<button type="button" data-id="' . $row->id . '" style="font-size:10px !important;" class="btn btn-xs btn-primary btnConfirm">승인</button>';
                    $btn .= '<button type="button" data-id="' . $row->id . '" style="font-size:10px !important;" class="ml-1 btn btn-xs btn-danger btnCancel">취소</button>';
                    return $btn;
                })
                ->editColumn('level', function ($row) {
                    
                    $level = $row->userLevel->name;
                    return $level;
                })
                ->addColumn('level_state', function ($row) {
                    $level_state = $row->levelup_flag == 1 ? "취소":"대기";
                    
                    return $level_state;
                })
                ->addColumn('bank_name', function ($row) {
                    $bank_name = Bank::find($row->bank_id)->name;
                    
                    return $bank_name;
                })
                // ->addColumn('action', function ($row) {
                //     $btn = '<button type="button" data-id="' . $row->id . '" style="font-size:10px !important;" class="btn btn-xs btn-primary btnEdit">수정</button>';
                //     $btn .= '<button type="button" data-id="' . $row->id . '" style="font-size:10px !important;" class="ml-1 btn btn-xs btn-danger btnDelete">삭제</button>';
                //     return $btn;
                // })
                ->rawColumns(['levelup'])
                ->make(true);
        }
        return view('admin.user.levelup_list', compact('title'));
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
    public function levelup($userId, Request $request)
    {
        $status = $request->post('status');
        if($status == 2){
            $user = User::where('id', $userId)
            ->update(            
                ['levelup_flag' => 1]
            );
            return response()->json(["status" => "success", "data" => $user]);
        }
        $user = User::where('id', $userId)
            ->update(            
                ['level' => DB::raw('level + 1'), 'levelup_flag' => 0]
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
