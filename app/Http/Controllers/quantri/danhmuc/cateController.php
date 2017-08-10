<?php

namespace App\Http\Controllers\quantri\danhmuc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Danhmuc;
use DateTime;

class cateController extends Controller
{
    public function getCate()
    {
    	$data=Danhmuc::get()->toArray();
    	return view('quantri.danhmuc.list',['data'=>$data]);
    }
    public function getDataCate()
    {
    	return Danhmuc::get();
    }
    public function postCate(Request $request)
    {
		$cate             = new Danhmuc();
		$cate->name       = $request->name;
		$cate->slug       = str_slug($request->name,"-");
		$cate->parent     = $request->parent;
		$cate->status     = $request->status;
		$cate->created_at = new DateTime();
		$cate->save();
    	return redirect()->route('danhmuc')->with(['flash_level'=>'result_msg','flash_message'=>'Add item Success !']);
    }
    public function getDataEditCate($id)
    {
        $cate=Danhmuc::where('id',$id)->get();
        return $cate;
    }

    public function postEdit(Request $request,$id)
    {
    	$cate = Danhmuc::find($id);
    	$cate->name=$request->name;
    	$cate->slug=str_slug($request->name,"-");
    	$cate->parent     = $request->parent;
		$cate->status     = $request->status;
		$cate->updated_at = new DateTime();
		$cate->save();
    }
    public function Delete($id)
    {
        $cate = Danhmuc::find($id);
        $cate->delete();
        // return redirect()->route('danhmuc')->with(['flash_level'=>'result_msg','flash_message'=>'Delete item Success !']);
    }
}
