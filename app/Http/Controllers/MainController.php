<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Catagory;
use App\Product;
use Illuminate\Http\Request;
use Auth;

class MainController extends Controller {

	public function index()
	{
		$allCatagorys = Catagory::all()->toArray();
		$newProducts = Product::orderBy('updated_at','desc')->take(6)->get()->toArray();
		if (Auth::check()) {

			$userinfo = ['username'=>Auth::user()->name,'allC'=>$allCatagorys,'last'=>$newProducts];

			return view('frontend.index',$userinfo);
		}
		return view('frontend.index',['username'=> null,'allC'=>$allCatagorys,'last'=>$newProducts]);
	}
	public function catagory($slug)
	{
		$catagoryclick = Catagory::where('slug','=',$slug)->get()->toArray();
		$allCatagorys = Catagory::all()->toArray();
		$products = Product::where('catagory_id','=',$catagoryclick[0]['id'])->get()->toArray();


		return view('frontend.shop',['last'=>$products,'allC'=>$allCatagorys]);
	}

}
