<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
//아너링크 api
class HonorLinkSendController extends Controller
{
    protected $strExtraEvoApiDomain = "https://api.honorlink.org/api";
    protected $strExtraEvoApiKey = "GeoNyv4NRUuFJoj4FvikhJZjhV0UXTgbXUFgzXfP";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    // Honorlink Api
    public function createEAUser($strID, $strAlias) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$this->strExtraEvoApiDomain/user/create");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "username=$strID&nickname=$strAlias");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array(
            "Authorization: Bearer $this->strExtraEvoApiKey",
            "Accept: application/json",
            'Cotent-Type: application/json'
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $strResp = curl_exec($ch);
        curl_close($ch);

        DB::table('tbl_honorlink_log')->insert([
            'url' =>  "/user/create",
            'param' => "username=$strID&nickname=$strAlias",
            'response' => $strResp,
            'time' => $this->getTime()
        ]);

        $objResp = json_decode($strResp);
        if(property_exists($objResp, 'errors')) {
            return json_encode($objResp->errors);
        } else if(property_exists($objResp, 'id')) {
            return "1";
        }
    }

    public function getEAToken($strID) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$this->strExtraEvoApiDomain/user/refresh-token?username=$strID");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array(
            "Authorization: Bearer $this->strExtraEvoApiKey",
            "Accept: application/json",
            'Cotent-Type: application/json'
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $strResp = curl_exec($ch);
        curl_close($ch);

        // DB::table('tbl_api_honorlink_log')->insert([
        //     'strUrl' =>  "/user/refresh-token",
        //     'strParam' => "username=$strID",
        //     'strResp' => $strResp,
        //     'strTime' => $this->getTime()
        // ]);

        $objResp = json_decode($strResp);
        return $objResp->token;
    }

    public function chargeEA($strID, $nAmount) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$this->strExtraEvoApiDomain/user/add-balance");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "username=$strID&amount=$nAmount");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array(
            "Authorization: Bearer $this->strExtraEvoApiKey",
            "Accept: application/json",
            'Cotent-Type: application/json'
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $strResp = curl_exec($ch);
        curl_close($ch);

        DB::table('tbl_api_honorlink_log')->insert([
            'strUrl' => '/user/add-balance',
            'strParam' => "username=$strID&amount=$nAmount",
            'strResp' => $strResp,
            'strTime' => $this->getTime()
        ]);

        return $strResp;
    }

    public function exchargeEA($strID, $nAmount) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$this->strExtraEvoApiDomain/user/sub-balance");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "username=$strID&amount=$nAmount");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array(
            "Authorization: Bearer $this->strExtraEvoApiKey",
            "Accept: application/json",
            'Cotent-Type: application/json'
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $strResp = curl_exec($ch);
        curl_close($ch);

        DB::table('tbl_api_honorlink_log')->insert([
            'strUrl' => '/user/sub-balance',
            'strParam' => "username=$strID&amount=$nAmount",
            'strResp' => $strResp,
            'strTime' => $this->getTime()
        ]);

        return $strResp;
    }

    public function getEALobbyList() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$this->strExtraEvoApiDomain/lobby-list");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array(
            "Authorization: Bearer $this->strExtraEvoApiKey",
            "Accept: application/json",
            'Cotent-Type: application/json'
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $strResp = curl_exec($ch);
        curl_close($ch);

        // DB::table('tbl_api_honorlink_log')->insert([
        //     'strUrl' => '/lobby-list',
        //     'strParam' => "",
        //     'strResp' => $strResp,
        //     'strTime' => $this->getTime()
        // ]);

        $objResp = json_decode($strResp);

        return $objResp;
    }

    public function getEAGameList() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$this->strExtraEvoApiDomain/game-list?vendor=evolution");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array(
            "Authorization: Bearer $this->strExtraEvoApiKey",
            "Accept: application/json",
            'Cotent-Type: application/json'
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $strResp = curl_exec($ch);
        curl_close($ch);

        // DB::table('tbl_api_honorlink_log')->insert([
        //     'strUrl' => '/game-list',
        //     'strParam' => "vendor=evolution",
        //     'strResp' => $strResp,
        //     'strTime' => $this->getTime()
        // ]);

        $objResp = json_decode($strResp);
        return $objResp;
    }

    public function getUserMoney($strID) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$this->strExtraEvoApiDomain/user?username=$strID");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array(
            "Authorization: Bearer $this->strExtraEvoApiKey",
            "Accept: application/json",
            'Cotent-Type: application/json'
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $strResp = curl_exec($ch);
        curl_close($ch);

        // DB::table('tbl_api_honorlink_log')->insert([
        //     'strUrl' => '/user',
        //     'strParam' => "username=$strID",
        //     'strResp' => $strResp,
        //     'strTime' => $this->getTime()
        // ]);

        $objResp = json_decode($strResp);

        return $objResp->balance;
    }

    public function openGame($strGameID, $strID, $strProvider) {
        $strToken = $this->getEAToken($strID);

        return redirect("$this->strExtraEvoApiDomain/open?game_id=$strGameID&token=$strToken&vendor=$strProvider");
    }

    public function getGameLaunchLink($strGameID, $strID, $strVendorID){
        $strToken = $this->getEAToken($strID);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$this->strExtraEvoApiDomain/game-launch-link?username=$strID&nickname=$strID&game_id=$strGameID&vendor=$strVendorID");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array(
            "Authorization: Bearer $this->strExtraEvoApiKey",
            "Accept: application/json",
            'Cotent-Type: application/json'
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $strResp = curl_exec($ch);
        curl_close($ch);

        $objResp = json_decode($strResp);
        if(property_exists($objResp, 'errors')){
            return response()->json(['status' => "failed", 'data' => $objResp ]);
        }else{
            return response()->json(['status' => "success", 'data' => $objResp ]);
        }
    }

    public function getAgentInfo(Request $request) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->strExtraEvoApiDomain."/my-info");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array(
            "Authorization: Bearer ".$this->strExtraEvoApiKey,
            "Accept: application/json",
            'Cotent-Type: application/json'
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $strResp = curl_exec($ch);
        curl_close($ch);

        // DB::table('tbl_api_honorlink_log')->insert([
        //     'strUrl' => '/my-info',
        //     'strParam' => "",
        //     'strResp' => $strResp,
        //     'strTime' => $this->getTime()
        // ]);

        $objResp = json_decode($strResp);

        return response()->json($objResp); 

        return $objResp->balance;
    }
    
    //
    public function LaunchGame() {

        $strID = "user123";
        $strGameID = "evolution_game_shows";//evolution_game_shows//vivo_baccarat
        $strVendor = "evolution";
        // $this->createEAUser($strID, $strID);
        $strToken = $this->getEAToken($strID);
        $strUrl = "$this->strExtraEvoApiDomain/open?game_id=$strGameID&token=$strToken&vendor=$strVendor";
        //return redirect($strUrl);

        return $this->getGameLaunchLink($strGameID, $strID, $strVendor);
    }

    public function getTime() {
        // return time();
        return Carbon::now();
    }
}
