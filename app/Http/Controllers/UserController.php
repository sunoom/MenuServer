<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;

use App\Http\Model\User;

use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    function login(Request $request){

    	$username=$request->get('username');

    	$password=$request->get('password');

    	$result=User::where('username',$username)->where('password',$password)->get();

    	if(!$result->isEmpty()){
    		$res=array('code'=>0,'msg'=>'success','data'=>array());

            return json_encode($res);
    	}else{
    		$res=array('code'=>10,'msg'=>'用户名或密码不正确','data'=>array());

            return json_encode($res);
    	}
    }
}
