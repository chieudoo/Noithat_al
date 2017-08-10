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

class duanController extends Controller
{
    public function ctduan($id)
    { 
    	$duan=Duan::with('danhmuc')->where('id',$id)->get()->toArray();
    	$cate=Danhmuc::get()->toArray();
        $you=Youtube::orderBy('id','desc')->limit(3)->get()->toArray();
    	foreach ($duan as $item) {
    		$title=$item['name'];
    	}
    
    	return view('website.page.ctduan',[
    		'cate'=>$cate,
    		'name'=>$title,
    		'duan'=>$duan,
            'you'=>$you,
    	]);
    }
}
