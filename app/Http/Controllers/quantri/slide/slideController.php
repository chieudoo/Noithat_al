<?php

namespace App\Http\Controllers\quantri\slide;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Slide;
use File;
use DateTime;

class slideController extends Controller
{
    public function getSlide()
    {
    	$data=Slide::get()->toArray();
    	return view('quantri.slide.list',['data'=>$data]);
    }
    public function postSlide(Request $request)
    {
    	$s = new Slide();
    	$s->name=$request->name;
    	$s->slug=str_slug($request->name,"-");
    	$s->status=$request->status;
    	$img=$request->file('image');
    	if(file_exists($request->image)){
    		$name=time()."-".$img->getClientOriginalName();
    		$path="assets/image/upload/";
    		$img->move($path,$name);
    		$s->image=$name;
    	}
    	$s->content=$request->content;
    	$s->created_at=new DateTime();
    	$s->save();
    	return redirect()->route('duan')->with(['flash_level'=>'result_msg','flash_message'=>'Add item sucess !']);
    }
    public function getDetail($id)
    {
    	$data=Slide::where('id',$id)->get()->toArray();
    	return view('quantri.slide.detail',['data'=>$data]);
    }
    public function postDetail($id,Request $request)
    {
    	$s=Slide::find($id);
    	$s->name=$request->name;
    	$s->slug=str_slug($request->name,"-");
    	$s->status=$request->status;
    	if($request->image==null){
    		$s->image=$request->anhcu;
    	}else{
    		$img=$request->file('image');
    		if(file_exists($request->image)){
    			$acu=$request->anhcu;
    			$pathcu="/assets/image/upload/";
    			if(file_exists(public_path().$pathcu.$acu)){
    				File::delete(public_path().$pathcu.$acu);
    			}

    			$name=time()."-".$img->getClientOriginalName();
    			$path="assets/image/upload/";
    			$img->move($path,$name);
    			$s->image=$name;
    		}
    	}
    	$s->content=$request->content;
    	$s->created_at=new DateTime();
    	$s->save();
    	return redirect()->route('duan')->with(['flash_level'=>'result_msg','flash_message'=>'Edit item sucess !']);
    }
    public function getDelete($id)
    {
    	$s=Slide::find($id);
    	$path="/assets/image/upload/";
    	if(file_exists(public_path().$path.$s['image'])){
    		File::delete(public_path().$path.$s['image']);
    	}
    	$s->delete();
    	return redirect()->route('duan')->with(['flash_level'=>'result_msg','flash_message'=>'Delete item sucess !']);
    }
}
