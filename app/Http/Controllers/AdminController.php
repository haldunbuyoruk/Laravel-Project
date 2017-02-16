<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsModel;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Validator;

class AdminController extends Controller
{
    
    public function AddNew(Request $request){

    	if(!empty($request->all())){
    		$validator = Validator::make($request->all(), [
    			'title'=>'required',
    			'summary'=>'required|max100',
    			'content'=>'required'
    			]);
    		if($validator->fails()){
    			return response([
    				'title' => 'Error',
    				'msg' => 'Some fields are empty !!'
    				]);
    		}
    		$request->merge([
    				'user_id' => Auth::user()->id,
    				'slag'	=> str_slug($request->title)
    			]);
    		NewsModel::create($request->all());
    		return response([
    				'title' => 'Success',
    				'msg'=>'Registered successfully'
    			],200);
    	}else{
			return view('backend.pages.addnew');
    	}
    }
}
