<?php

namespace App\Http\Controllers\quantri\duan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Duan;
use App\Model\Danhmuc;
use DateTime;
use File;

class duanController extends Controller
{
    public function getDuan()
    {
    	$data=Duan::with('danhmuc')->get()->toArray();
    	return view('quantri.duan.list',['data'=>$data]);
    }

    function postDuan(Request $request){
    	$duan=new Duan();
    	$duan->name=$request->name;
    	$duan->slug=str_slug($request->name,"-");
    	$img   =  $request->file('image');
    	if(file_exists($request->image)){
    		$path="assets/image/upload/";
    		$name=time()."-".$img->getClientOriginalName();
    		$img->move($path,$name);
    		$duan->image=$name;
    	}
    	$duan->content=$request->content;
    	$duan->user_id=Auth::user()->id;
    	$duan->created_at=new DateTime();
    	$duan->save();
    	return redirect()->route('duan')->with(['flash_level'=>'result_msg','flash_message'=>'Add item success !']);
    }

    public function getDetail($id)
    {
    	$data=Duan::with('danhmuc')->where('id',$id)->get()->toArray();
    	return view('quantri.duan.detail',['data'=>$data]);
    }
    function postDetail(Request $request,$id){
    	$duan=Duan::find($id);
    	$duan->name=$request->name;
    	$duan->slug=str_slug($request->name,"-");
    	if($request->image==null){
    		$duan->image=$request->anhcu;
    	}else{
    		$img=$request->file('image');
    		if(file_exists($request->image)){

	    		$pathcu="/assets/image/upload/";
	    		$acu=$request->anhcu;
    			if(file_exists(public_path().$pathcu.$acu)){
    				File::delete(public_path().$pathcu.$acu);
    			}

    			$path="assets/image/upload/";
    			$name=time()."-".$img->getClientOriginalName();
    			$img->move($path,$name);
    			$duan->image=$name;
    		}
    	}
    	$duan->content=$request->content;
    	$duan->user_id=Auth::user()->id;
    	$duan->status=$request->status;
    	$duan->updated_at=new DateTime();
    	$duan->save();
    	return redirect()->route('duan')->with(['flash_level'=>'result_msg','flash_message'=>'Edit item success !']);
    }
    public function getDelete($id)
    {
    	$duan=Duan::find($id);
    	$path="/assets/image/upload/";
    	if(file_exists(public_path().$path.$duan['image'])){
    		File::delete(public_path().$path.$duan['image']);
    	}
    	$duan->delete();
    	return redirect()->route('duan')->with(['flash_level'=>'result_msg','flash_message'=>'Delete item success !']);
    }
}
