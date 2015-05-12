<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Catagory;
use Illuminate\Http\Request;
use Auth;

class MainController extends Controller {

	public function index()
	{
		$allCatagorys = Catagory::all()->toArray();
		if (Auth::check()) {

			$userinfo = ['username'=>Auth::user()->name,'allC'=>$allCatagorys];

			return view('frontend.index',$userinfo);
		}
		return view('frontend.index',['username'=> null,'allC'=>$allCatagorys]);
	}

}
