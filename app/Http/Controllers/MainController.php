<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Catagory;
use App\Product;
use App\Cart;
use App\Brand;
use Illuminate\Support\Facades\Request;

use Auth;

class MainController extends Controller {

	public function index()
	{
		$allCatagorys = Catagory::all()->toArray();
		$newProducts = Product::orderBy('updated_at','desc')->take(6)->get()->toArray();
		$allBrands = Brand::all()->toArray();
		if (Auth::check()) {

			$userinfo = ['username'=>Auth::user()->name,'allC'=>$allCatagorys,'last'=>$newProducts,'brands'=>$allBrands];

			return view('frontend.index',$userinfo);
		}
		return view('frontend.index',['username'=> null,'allC'=>$allCatagorys,'last'=>$newProducts,'brands'=>$allBrands]);
	}
	public function catagory($slug)
	{
		$catagoryclick = Catagory::where('slug','=',$slug)->get()->toArray();
		$allBrands = Brand::all()->toArray();
		$allCatagorys = Catagory::all()->toArray();
		$products = Product::where('catagory_id','=',$catagoryclick[0]['id'])->get()->toArray();
		if (Auth::check()) {

			$userinfo = ['username'=>Auth::user()->name,'allC'=>$allCatagorys,'last'=>$products,'brands'=>$allBrands];

			return view('frontend.shop', $userinfo);
		}

		return view('frontend.shop',['username'=>null,'last'=>$products,'allC'=>$allCatagorys,'brands'=>$allBrands]);
	}
	public function putCart($slug)
	{
		if (Auth::check()) {
			$product = Product::where('slug','=',$slug)->first()->toArray();
			
			if (Cart::where('users_id','=',Auth::user()->id)->get()->toArray() == null) {
				$productarraymake = [(string)$product['id']=>1];
				$jsonArray = json_encode($productarraymake);
				Cart::create([
					'cart'=>$jsonArray,
					'users_id'=>Auth::user()->id
					]);
				return redirect()->back();
			}else{
				$cartt = Cart::where('users_id','=',Auth::user()->id)->first();
				$cartArray = $cartt->toArray();
				
				$fillarray = json_decode($cartArray['cart'],true);
				
				if (array_key_exists((string)$product['id'], $fillarray)) {
					
					$fillarray[(string)$product['id']]++;

				}else{
				$fillarray[(string)$product['id']] = 1;
				
				}
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
		$usercart = Cart::where('users_id','=',Auth::user()->id)->first()->toArray();
		$allproducts = [];
		$i = 0;
		foreach (json_decode($usercart['cart']) as $key => $value) {
			$allproducts[] = Product::find(intval($key))->toArray();
			$allproducts[$i]['many'] = $value;
			$allproducts[$i]['total'] = intval($allproducts[$i]['price']) * $value; 
			$i++;
		}
		$allCatagorys = Catagory::all()->toArray();
		return view('frontend.cart',['username'=>Auth::user()->name,'allC'=>$allCatagorys,'cartuser'=>$allproducts]);
	}
	public function delCart($slug)
	{
			$product = Product::where('slug','=',$slug)->first()->toArray();
			$cartt = Cart::where('users_id','=',Auth::user()->id)->first();

			$cartArray = $cartt->toArray();

			$fillarray = json_decode($cartArray['cart'],true);
			$fillarray[(string)$product['id']]--;
			if ($fillarray[(string)$product['id']] <= 0) {
				unset($fillarray[(string)$product['id']]);
				$cartt->cart = json_encode($fillarray);
				$cartt->save();
				return redirect('/cart');
			}else{
				$cartt->cart = json_encode($fillarray);
				$cartt->save();
				return redirect('/cart');
			}
			
			//unset($fillarray[(string)$product['id']]);
	}
	public function fullProductDelete($slug)
	{
			$product = Product::where('slug','=',$slug)->first()->toArray();
			$cartt = Cart::where('users_id','=',Auth::user()->id)->first();
			$cartArray = $cartt->toArray();
			$fillarray = json_decode($cartArray['cart'],true);
			unset($fillarray[(string)$product['id']]);
			$cartt->cart = json_encode($fillarray);
			$cartt->save();
			return redirect('/cart');
	}
	public function brand($slug)
	{
		$brand = Brand::where('slug','=',$slug)->first()->toArray();
		$brandproducts = Product::where('brand','=',$brand['id'])->get()->toArray();
		$allCatagorys = Catagory::all()->toArray();
		$allBrands = Brand::all()->toArray();

		if (Auth::check()) {

			$userinfo = ['username'=>Auth::user()->name,'allC'=>$allCatagorys,'last'=>$brandproducts,'brands'=>$allBrands];

			return view('frontend.shop',$userinfo);
		}
		return view('frontend.shop',['username'=> null,'allC'=>$allCatagorys,'last'=>$brandproducts,'brands'=>$allBrands]);

	}

}
