<?php

namespace App\Http\Controllers\quantri\sanpham;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Sanpham;
use App\Model\Danhmuc;
use DateTime;
use File;

class proController extends Controller
{
    public function getPro()
    {
    	$cate=Danhmuc::get()->toArray();
    	$data=Sanpham::with('danhmuc')->get()->toArray();
    	return view('quantri.sanpham.list',['cate'=>$cate,'data'=>$data]);
    }
    function postPro(Request $request){
    	$sp = new Sanpham();
    	$sp->name=$request->name;
    	$sp->slug=str_slug($request->name,"-");
    	$img = $request->file('image');
    	if(file_exists($request->image)){
    		$name=time()."-".$img->getClientOriginalName();
    		$path="assets/image/upload/";
    		$img->move($path,$name);
    		$sp->image=$name;
    	}
    	$sp->content=$request->content;
    	$sp->masp=$request->masp;
    	$sp->cat_id=$request->cat_id;
    	$sp->user_id=Auth::user()->id;
    	$sp->created_at=new DateTime();
    	$sp->save();
    	return redirect()->route('sanpham')->with(['flash_level'=>'result_msg','flash_message'=>'Add item sucess !']);
    }
    public function getDelete($id)
    {
        $sp=Sanpham::find($id);
        $path="/assets/image/upload/";
        if(file_exists(public_path().$path.$sp['image'])){
            File::delete(public_path().$path.$sp['image']);
        }
        $sp->delete();
        return redirect()->route('sanpham')->with(['flash_level'=>'result_msg','flash_message'=>'Delete item sucess !']);
    }
}
