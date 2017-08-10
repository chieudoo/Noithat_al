<?php

namespace App\Http\Controllers\quantri\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use DateTime;

class userController extends Controller
{
    public function getU()
    {
    	$data=User::get()->toArray();
    	return view('quantri.users.list',['data'=>$data]);
    }
    public function postU(Request $request)
    {
		$u             = new User();
		$u->name       = $request->name;
		$u->email      = $request->email;
		$u->password   = bcrypt($request->password);
		$u->status     = $request->status;
		$u->created_at = new DateTime();
    	$u->save();
    }
    public function getEdit($id)
    {
    	return User::where('id',$id)->get();
    }
    public function postEdit($id,Request $request)
    {
    	$u=User::find($id);
    	$u->name       = $request->name;
		$u->email      = $request->email;
        if($request->password != null){
            $u->password   = bcrypt($request->password);
        }
		$u->status     = $request->status;
		$u->updated_at = new DateTime();
    	$u->save(); 
    }
    public function getDelete($id)
    {
        $u=User::find($id);
        $u->delete();
        return redirect()->route('users')->with(['flash_level'=>'result_msg','flash_message'=>'Delete item success!']);
    }
}
