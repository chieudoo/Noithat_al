<?php

namespace App\Http\Controllers\quantri\about;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\About;
use DateTime;

class aboutController extends Controller
{
    public function getAbout()
    {
    	$data=About::get()->toArray();
    	return view('quantri.about.list',['data'=>$data]);
    }
    public function postAbout(Request $request,$id)
    {
    	$ab = About::find($id);
    	$ab->content = $request->content;
    	$ab->status = $request->status;
    	$ab->updated_at=new DateTime();
    	$ab->save();
    	return redirect()->route('about')->with(['flash_level'=>'result_msg','flash_message'=>'Edit item success !']);
    }
}
