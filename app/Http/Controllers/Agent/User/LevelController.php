<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserLevel;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class LevelController extends Controller
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

        $title = "등급관리";

        if ($request->ajax()) {
            $users = UserLevel::where('is_del', 0)
                ->orderBy('id');

            return DataTables::of($users)
                ->addIndexColumn()
                
                ->editColumn('can_buy', function ($row) {
                    $checked = $row->can_buy == 1 ? "checked" : "";
                    $btn='<div>
                        <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input chk-can-buy" '.$checked.' data-id="'.$row->id.'" id="chkBuy_'.$row->id.'">
                        <label class="custom-control-label" for="chkBuy_'.$row->id.'"></label>
                        </div>
                    </div>';
                    return $btn;
                })
                ->editColumn('name', function ($row) {
                    $users = User::where('level', $row->level)->where('type', "USER")->count();
                    $value = $row->name."($users)";
                    return $value;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<button type="button" data-id="' . $row->id . '" style="font-size:10px !important;" class="btn btn-xs btn-primary btnEdit">수정</button>';
                    // $btn .= '<button type="button" data-id="' . $row->id . '" style="font-size:10px !important;" class="ml-1 btn btn-xs btn-danger btnDelete">삭제</button>';
                    return $btn;
                })
                ->rawColumns(['action', 'level', 'can_buy'])
                ->make(true);
        }
        return view('admin.user.level_list', compact('title'));
    }

    //수정하려는 유저 선택(post)
    public function edit($levelId = 0)
    {
        $title = "수정";
        if ($levelId == 0) {
            $title = "추가";
        }

        $level = UserLevel::where('is_del', 0)
            ->where('id', $levelId)
            ->firstOrNew();
        
        return view('admin.user.level_detail', compact('title', 'levelId', 'level'));
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
            'name' => $request->post('name'),
            'pay_percent' => $request->post('pay_percent'),
            'levelup_amount' => $request->post('levelup_amount'),
            'min_limit' => $request->post('min_limit'),
            'max_limit' => $request->post('max_limit'),
            'can_buy' => $request->post('can_buy'),
            //'is_del' => 0,
        ];
        
        $level = UserLevel::updateOrCreate(
            ['id' => $request->post('id')],
            $data
        );
        return response()->json(["status" => "success", "data" => $level]);
    }
    //사용상태 변경
    public function state($levelId, Request $request)
    {
        $status = $request->post('status');
        $level = UserLevel::where('id', $levelId)
            ->update(            
                ['is_use' => $status]
            );        
        return response()->json(["status" => "success", "data" => $level]);
    }

    //판매상태 변경
    public function buy_state($levelId, Request $request)
    {
        $status = $request->post('status');
        $level = UserLevel::where('id', $levelId)
            ->update(            
                ['can_buy' => $status]
            );        
        return response()->json(["status" => "success", "data" => $level]);
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
