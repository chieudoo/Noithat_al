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

class detailController extends Controller
{
   	public function chitiet($id)
   	{
   		$sanpham=Sanpham::with('danhmuc')->where('id',$id)->get()->toArray();
         $you=Youtube::orderBy('id','desc')->limit(3)->get()->toArray();
   		$cate=Danhmuc::get()->toArray();
   		foreach ($sanpham as $item) {
   			$title=$item['name'];
   		}
   		return view('website.page.detail',[
   			'sanpham'=>$sanpham,
   			'cate'=>$cate,
   			'name'=>$title,
            'you'=>$you
   		]);
   	}
}
