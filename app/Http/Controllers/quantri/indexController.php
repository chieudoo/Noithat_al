<?php

namespace App\Http\Controllers\quantri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public function index()
    {
    	return view('quantri.home.main');
    }
}
