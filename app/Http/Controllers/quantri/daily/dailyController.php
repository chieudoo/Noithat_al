<?php

namespace App\Http\Controllers\quantri\daily;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Daily;
use DateTime;

class dailyController extends Controller
{
    function getDaily(){
    	$data=Daily::get()->toArray();
    	return view('quantri.daily.list',['data'=>$data]);
    }
    public function postDaily(Request $request)
    {
    	$dl = new Daily();
    	$dl->content=$request->content;
    	$dl->status=$request->status;
    	$dl->created_at=new DateTime();
    	$dl->save();
    }
    public function postEdit($id,Request $request)
    {
    	$dl=Daily::find($id);
    	$dl->content=$request->content;
    	$dl->status=$request->status;
    	$dl->updated_at=new DateTime();
    	$dl->save();
    }
    function getDelete($id){
    	$dl=Daily::find($id);
    	$dl->delete();
    	return redirect()->route('daily')->with(['flash_level'=>'result_msg','flash_message'=>'Delete item Success !']);
    }
}
