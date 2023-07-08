<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Models\Product;
use App\Models\ProductItem;
use App\Models\ProductImage;
use App\Models\Come;
use App\Models\Brand;
use App\Models\Category;
use DataTables;
use App\MyLibs\CoupangConnector;

class RoleManageController extends Controller
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

        $tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default
        $title = "판매대상상품";
        $comes = Come::where('bIsDel', 0)
            ->orderBy('strComeCode')
            ->get();
        //dd($comes);
        $brands = Brand::where('bIsDel', 0)
            ->orderBy('strBrandCode')
            ->get();
        $categories_1 = Category::where('bIsDel', 0)
            ->where('nCategoryType', 1)
            ->orderBy('strCategoryName')
            ->get();
        $categories_2 = Category::where('bIsDel', 0)
            ->where('nCategoryType', 2)
            ->orderBy('strCategoryName')
            ->get();

        $categories_3 = Category::where('bIsDel', 0)
            ->where('nCategoryType', 3)
            ->orderBy('strCategoryName')
            ->get();
        $categories_4 = Category::where('bIsDel', 0)
            ->where('nCategoryType', 4)
            ->orderBy('strCategoryName')
            ->get();
        $shareType = "1";
        $basePriceTypes = array('CNY', 'KRW', 'USD', 'JPY');
        $countryShippingCostTypes = array('CNY', 'KRW', 'USD', 'JPY');
        $worldShippingCostTypes = array('KRW');
        $weightTypes = array('Kg');

        if ($request->ajax()) {
            $products = Product::where('bIsDel', 0)
                ->where('nUserId', Auth::id())
                ->where('nProductWorkProcess', 0)
                ->orderBy('nIdx');

            return Datatables::eloquent($products)
                ->addIndexColumn()
                ->addColumn('check', function ($row) {
                    $check = '<input type="checkbox" name="chkProduct[]" onclick="" value="' . $row->nIdx . '">';
                    return $check;
                })
                ->addColumn('action', function ($row) {
                    $btn = '';
                    return $btn;
                })
                ->addColumn('images', function ($row) {
                    $btn = '<ul class="list-inline" style="width:100px;">';
                    foreach ($row->productImages as $productImage) {
                        $btn .= '<li class="list-inline-item">
                                        <img alt="Avatar" class="table-avatar" src="' . $productImage->strURL . '">
                                    </li>';
                    }
                    $btn .= '</ul>';
                    return $btn;
                })
                ->addColumn('productInfo', function ($row) {
                    $element = '<ul class="list-inline" style="">';
                    $element .= '<li class="list-inline-item">
                                    ' . $row->strCategoryCode1 . '>' . $row->strCategoryCode2 . '>' . $row->strCategoryCode3 . '>' . $row->strCategoryCode4 . '
                                </li><br>';
                    $element .= '<li class="list-inline-item">
                                    ' . $row->strKrSubName . '
                                </li>';

                    $element .= '</ul>';
                    return $element;
                })
                ->addColumn('priceInfo', function ($row) {
                    $element = '<ul class="list-inline" style="width:100px;">';
                    $element .= '<li class="list-inline-item">
                                ' . $row->nBasePrice . '
                            </li><br>';
                    $element .= '<li class="list-inline-item">
                                ' . $row->nBasePrice . '
                            </li>';

                    $element .= '</ul>';
                    return $element;
                })
                ->addColumn('marginInfo', function ($row) {
                    $element = '<ul class="list-inline" style="width:100px;">';
                    $element .= '<li class="list-inline-item">
                                ' . $row->nBasePrice . '
                            </li><br>';
                    $element .= '<li class="list-inline-item">
                                ' . $row->nBasePrice . '
                            </li>';

                    $element .= '</ul>';
                    return $element;
                })
                ->addColumn('marketInfo', function ($row) {
                    $marketInfo = '
                                <span style="width:20px;" class="badge badge-success">C</span>
                                <span style="width:20px;" class="badge badge-success">11</span>
                                <span style="width:20px;" class="badge badge-success">A</span>
                                <span style="width:20px;" class="badge badge-success">G</span>
                                <br/>
                                <span style="width:20px;" class="badge badge-success">I</span>
                                <span style="width:20px;" class="badge badge-success">S</span>
                                <span style="width:20px;" class="badge badge-success">T</span>
                                <span style="width:20px;" class="badge badge-success">W</span>
                                ';
                    return $marketInfo;
                })
                ->addColumn('mainImage', function ($row) {
                    $btn = '<img alt="Avatar" style="width: 5rem;" class="table-product-image" src="' . asset('assets/images/product/image.jpg') . '">';
                    return $btn;
                })
                ->rawColumns(['check', 'productInfo', 'mainImage', 'marketInfo', 'priceInfo', 'marginInfo'])
                ->make(true);
        }
        return view('product.SellTargetManage', compact('title', 'brands', 'comes', 'categories_1', 'categories_2', 'categories_3', 'categories_4', 'shareType', 'basePriceTypes', 'countryShippingCostTypes', 'worldShippingCostTypes', 'weightTypes'));
    }

    /**
     * 상품등록선택후 마켓상품등록버튼
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function marketProductAdd(Request $request)
    {
        $marketAccounts = MarketAccount::where('nUserId', Auth::id())
            ->get();
        //dd($marketAccounts);
        $chkProduct = $request->post('chkProduct');
        //print_r($chkProduct);
        $select_all = $request->post('select_all');
        if ($request->has('select_all')) {
            session()->put('post_product_select_all', '1');
            session()->put('post_products', $chkProduct);
        } else {
            session()->put('post_product_select_all', '0');
            session()->put('post_products', $chkProduct);
        }

        return response()->json(["status" => "success", "data" => $marketAccounts]);
    }
    //상품등록을 위한 마켓계정 리스트(get)
    public function marketAccountList()
    {
        // $request->session()->put('key', 'value');
        // $request->session()->push('user.teams', 'developers');
        // $value = $request->session()->pull('key', 'default');
        // $request->session()->forget('key');
        // $request->session()->flush();
        $marketAccounts = MarketAccount::where('nUserId', Auth::id())
            ->get();

        return view('product.MarketAccountList', compact('marketAccounts'));
    }
    //상품등록을 위한 마켓계정 선택(post)
    public function marketAccountSelect(Request $request)
    {
        $chkAccount = $request->post('chkAccount');

        $marketAccounts = MarketAccount::where('nUserId', Auth::id())
            ->join('tb_markets', 'tb_market_accounts.nMarketIdx', '=', 'tb_markets.nIdx')
            ->where('tb_markets.strMarketCode', 'coupang')
            ->get();

        $markets = Market::where('strMarketCode', 'coupang');
        if ($request->has('select_all')) {
            session()->put('post_marketId_select_all', '1');
            session()->put('post_marketIds', $chkAccount);
        } else {
            session()->put('post_marketId_select_all', '0');
            session()->put('post_marketIds', $chkAccount);
        }

        return view('product.MarketProductPrepare', compact('marketAccounts', 'markets'));
    }
    /**
     * 마켓 카테고리 탐색
     */
    public function marketCategorySearch($marketCode = 'coupang', $categoryCode = 0, Request $request)
    {
        if ($marketCode == 'coupang') {
            $coupang = new CoupangConnector();
            $res =  (object)json_decode($coupang->getCategoryInfoViaCode($categoryCode));
            if ($res->code = "SUCCESS") {
                $categories_1 = $res->data->child;
            }
        }

        if ($request->ajax()) {
            if ($res->code = "SUCCESS") {
                $categories = $res->data->child;
                return response()->json(["status" => "success", "data" => $categories]);
            }
            return response()->json(["status" => "error", "data" => array()]);
        }

        return view('product.MarketCategorySearch', compact('marketCode', 'categories_1'));
    }
    /**
     * 상품등록송신
     */
    public function marketAccountProduct(Request $request)
    {
        $value = session()->get('post_products');
        $product_select_all = session()->get('post_product_select_all', 0);
        $product_selected = session()->get('post_products', array());
        $product_select_all = session()->get('post_product_select_all', 0);
        $arrCategoryCode = $request->post('txtCategoryCode');
        $arrCategoryName = $request->post('txtCategoryName');

        $CoupangcategoryCode = $arrCategoryCode["coupang"];
        $CoupangcategoryName = $arrCategoryName["coupang"];
        $coupang = new CoupangConnector();

        $cateMetaInfo = (object)json_decode($coupang->getCategoryMetaInfo($categoryCode), true);
        $place_codes = '3244320';
        $outboundInfo = (object)json_decode($coupang->getOutboundShippingCenterInfo("", $place_codes), true);
        $outboundInfo = (object)json_decode($coupang->getOutboundShippingCenterInfo("", $place_codes), true);

        if ($product_select_all == 1) {
            $products = Product::where('bIsDel', 0)
                ->where('nUserId', Auth::id())
                ->where('nProductWorkProcess', 0)
                ->whereIn('nIdx', $product_selected)
                ->orderBy('nIdx');
        } else {
            $products = Product::where('bIsDel', 0)
                ->where('nUserId', Auth::id())
                ->where('nProductWorkProcess', 0)
                ->whereIn('nIdx', $product_selected)
                ->orderBy('nIdx');
        }
        $today = new DateTime;
        foreach ($products as $key => $product) {
            $categoryNameList = mb_split(" > ", $CoupangcategoryName);
            $objProduct = array(
                "displayCategoryCode" => $categoryCode, //쿠팡카테고리 코드
                "sellerProductName" => $product->strMainName,
                "vendorId" => $this->VENDOR_ID,
                "saleStartedAt" => $today->format('Y-m-d\TH:i:s'),
                "saleEndedAt" => "2099-01-01T23:59:59",
                "displayProductName" => $product->strBrand . $product->strMainKrName,
                "brand" => $product->strBrand,
                "generalProductName" => $product->strMainKrName,
                "productGroup" => $categoryNameList[count($categoryNameList) - 1],
                "deliveryMethod" => "SEQUENCIAL",
                "deliveryCompanyCode" => $outboundInfo->str,
                "deliveryChargeType" => "FREE",
                "deliveryCharge" => 0,
                "freeShipOverAmount" => 0,
                "deliveryChargeOnReturn" => 2500,
                "remoteAreaDeliverable" => "N",
                "unionDeliveryType" => "UNION_DELIVERY",
                "returnCenterCode" => "1000274592",
                "returnChargeName" => "반품지_1",
                "companyContactNumber" => "02-1234-678",
                "returnZipCode" => "135-090",
                "returnAddress" => "서울특별시 강남구 삼성동",
                "returnAddressDetail" => "333",
                "returnCharge" => 2500,
                "returnChargeVendor" => "N",
                "afterServiceInformation" => "A/S안내 1544-1255",
                "afterServiceContactNumber" => "1544-1255",
                "outboundShippingPlaceCode" => "74010",
                "vendorUserId" => "user01",
                "requested" => false
            );
        }

        //if($request->post('')
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(Request $request)
    {
        //$product  = Product::where('nIdx', $request->post('id'))->first();
        $product  = Product::where('nIdx', 1)->first();
        $coupang = new CoupangConnector();
        //$coupang->getCategoryInfoViaCode(56174);
        $coupang->getCategoryMetaInfo(0);
        // $coupang->getCategoryListInfo();
        // $coupang->addOutboundShippingCenter();
        // $coupang->addReturnShippingCenter();
        $coupang->addProduct();
        return view('product.MarketIDList');
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
    public function accountDelete($marketId, $accountId)
    {
        //
        //$marketAccount = MarketAccount::where('nIdx', $accountId)->delete();
        return response()->json(["status" => "success", "data" => $marketAccount]);
    }
}
