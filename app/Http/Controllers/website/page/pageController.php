<?php

namespace App\Http\Controllers\website\page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Danhmuc;
use App\Model\Sanpham;
use App\Model\Duan;
use App\Model\About;
use App\Model\Daily;
use App\Model\Lienhe;
use App\Model\Youtube;

class pageController extends Controller
{
    public function getDM($id,$slug)
    {
    	$cate=Danhmuc::get()->toArray();
        $you=Youtube::orderBy('id','desc')->limit(3)->get()->toArray();
    	$name=Danhmuc::where('id',$id)->get();
    	$sp=Sanpham::where('root',2)->orderBy('id','desc')->paginate(12);
    	$da=Duan::orderBy('id','desc')->paginate(12); 
        $ab=About::get()->toArray();
        $dl=Daily::orderBy('id','desc')->paginate(12);
        $lh=Lienhe::get()->toArray();
        $msp=Sanpham::with('danhmuc')->where('cat_id',$id)->orderBy('id','desc')->paginate(12);
    	foreach ($name as $item) {
    		$title = $item['name'];
    	} 
    	return view('website.page.danhmuc',[
    		'cate'=>$cate,
    		'name'=>$title,
    		'id'=>$id,
    		'sp'=>$sp,
    		'da'=>$da,
            'ab'=>$ab,
            'dl'=>$dl,
            'lh'=>$lh,
            'msp'=>$msp,
            'you'=>$you
    	]);
    }
}
