<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Brand;
use App\Catagory;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductForm;

class ProductController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::all()->toArray();
		return view('adminViews.products',compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$catagory = Catagory::all()->toArray();
		$brands = Brand::all()->toArray();
		return view('adminViews.createproduct',['cat'=>$catagory,'brands'=>$brands]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateProductForm $request)
	{

		$request->file('image')->move(public_path('images/products'), $request->get('slug').".".$request->file('image')->getClientOriginalExtension());
		
		$filepath = "images/products/".$request->get('slug').".".$request->file('image')->getClientOriginalExtension();
				Product::create([
			'name'=>$request->get('name'),
			'slug'=>$request->get('slug'),
			'discription'=>$request->get('discription'),
			'imgpath'=>$filepath,
			'price'=>$request->get('price'),
			'catagory_id'=>$request->get('catagory'),
			'brand'=>$request->get('brand')
			]);
		return redirect('admin/product');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
