<?php

namespace App\Http\Controllers\quantri\youtube;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Youtube;

class youController extends Controller
{
    public function getYou()
    {
    	$data=Youtube::get()->toArray();
    	return view('quantri.youtube.list',['data'=>$data]);
    }
    public function postYou(Request $request)
    {
    	$v=new Youtube();
    	$v->link=$request->link;
    	$v->status=$request->status;
    	$v->save();
    }
    public function getDelete($id)
    {
    	$v=Youtube::find($id);
    	$v->delete();
    	return redirect()->route('youtube')->with(['flash_level'=>'result_msg','flash_message'=>'Delete item sucess !']);
    }
}
