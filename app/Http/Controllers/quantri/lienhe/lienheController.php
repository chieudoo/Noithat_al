<?php

namespace App\Http\Controllers\quantri\lienhe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Lienhe;
use DateTime;

class lienheController extends Controller
{
    public function getLienhe()
    {
    	$data=Lienhe::get()->toArray();
    	return view('quantri.lienhe.list',['data'=>$data]);
    }
    public function postLienhe($id=1,Request $request)
    {
    	$lh=Lienhe::find($id);
    	$lh->content=$request->content;
    	$lh->save();
    	return redirect()->route('lienhe')->with(['flash_level'=>'result_msg','flash_message'=>'Update item Success !']);
    }
}
