<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
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
        $header = $request->header('Authorization');
        if($header == "Authorization"){
            return User::first();
        }else{
            return response(['message'=>'Invalid token'], 405);
        }
        
    }

    public function store(Request $request)
    {
        $header = $request->header('Authorization');
        if($header == "Authorization"){
            return '{
                "id": 1,
                "username": "name",
                "firstName": "string",
                "lastName": "string",
                "email": "string",
                "password": "string",
                "phone": "string",
                "userStatus": 1
              }';
        }else{
            return response(['message'=>'Invalid token'], 405);
        }
        
    }

    

    
}
