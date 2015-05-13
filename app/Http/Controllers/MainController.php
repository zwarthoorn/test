<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Catagory;
use App\Product;
use App\Cart;
use Illuminate\Support\Facades\Request;

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
		if (Auth::check()) {

			$userinfo = ['username'=>Auth::user()->name,'allC'=>$allCatagorys,'last'=>$products];

			return view('frontend.shop', $userinfo);
		}

		return view('frontend.shop',['username'=>null,'last'=>$products,'allC'=>$allCatagorys]);
	}
	public function putCart($slug)
	{
		if (Auth::check()) {
			$product = Product::where('slug','=',$slug)->get()->toArray();
			
			if (Cart::where('users_id','=',Auth::user()->id)->get()->toArray() == null) {
				$productarraymake = [$product[0]['id']];
				$jsonArray = json_encode($productarraymake);
				Cart::create([
					'cart'=>$jsonArray,
					'users_id'=>Auth::user()->id
					]);
				return redirect()->back();
			}else{
				$cartt = Cart::where('users_id','=',Auth::user()->id)->first();
				$cartArray = $cartt->toArray();
				
				$fillarray = json_decode($cartArray['cart']);
				$fillarray[] = $product[0]['id'];
				$cartt->cart = json_encode($fillarray);
				$cartt->save();
				return redirect()->back();
			}
			

			
		}else{
			return redirect('auth/login');
		}

		
	}
	public function showCart()
	{
		
	}

}
