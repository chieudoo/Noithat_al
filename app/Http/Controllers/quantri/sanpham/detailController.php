<?php

namespace App\Http\Controllers\quantri\sanpham;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Sanpham;
use App\Model\Danhmuc;
use DateTime;

class detailController extends Controller
{
    public function getDetail($id)
    {
    	$data=Sanpham::with('danhmuc')->where('id',$id)->get()->toArray();
    	$cate=Danhmuc::get()->toArray();
    	return view('quantri.sanpham.detail',['data'=>$data,'cate'=>$cate]);
    }
    function postDetail($id,Request $request){
    	$sp=Sanpham::find($id);
    	$sp->name=$request->name;
    	$sp->cat_id=$request->cat_id;
    	$sp->masp=$request->masp;
    	$sp->content=$request->content;
    	$sp->status=$request->status;
    	$sp->user_id=Auth::user()->id;
    	if($request->image==null){
    		$sp->image=$request->anhcu;
    	}else{
    		$img=$request->file('image');
    		if(file_exists($request->image)){
    			$pathcu="/assets/image/upload/";
    			$anh=$request->anhcu;
    			if(file_exists(public_path().$pathcu.$anh)){
    				File::delete(public_path().$pathcu.$anh);
    			}
    			$name=time()."-".$img->getClientOriginalName();
    			$path="assets/image/upload/";
    			$img->move($path,$name);
    			$sp->image=$name;
    		}
    	}
    	$sp->updated_at = new DateTime();
    	$sp->save();
    	return redirect()->route('sanpham')->with(['flash_level'=>'result_msg','flash_message'=>'Edit item sucess !']);
    }
}
