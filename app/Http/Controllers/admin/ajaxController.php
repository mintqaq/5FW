<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ajaxController extends Controller
{
    //
    public function userLoginAjax(Request $request)
    {
    	$username = $request->input('username');

    	$res = DB::table('users')->where('username',$username)->first();
    	if ($res) {
    		echo 1;
    	}else{
    		echo 0;
    	}
    }
}
