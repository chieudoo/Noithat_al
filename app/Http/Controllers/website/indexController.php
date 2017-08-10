<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Danhmuc;
use App\Model\Slide;
use App\Model\Sanpham;
use App\Model\Youtube;

class indexController extends Controller
{
    public function getIndex()
    {
    	$cate=Danhmuc::get()->toArray();
    	$slide=Slide::get()->toArray();
    	$txs=Sanpham::where('cat_id',6)->limit(3)->get()->toArray();
    	$epoxy=Sanpham::where('cat_id',7)->limit(3)->get()->toArray();
    	$tranh=Sanpham::where('cat_id',8)->limit(3)->get()->toArray();
    	$san=Sanpham::where('cat_id',9)->limit(3)->get()->toArray();
        $you=Youtube::orderBy('id','desc')->limit(3)->get()->toArray();
    	return view('website.home.home',[
    		'cate'=>$cate,
    		'slide'=>$slide,
    		'txs'=>$txs,
    		'epoxy'=>$epoxy,
    		'tranh'=>$tranh,
    		'san'=>$san,
            'you'=>$you
    	]);
    }
}
