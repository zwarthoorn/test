<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Catagory;
use App\Http\Requests\CreateCatagoryForm;

use Illuminate\Http\Request;

class CatagoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cat = Catagory::all()->toArray();

		return view('adminViews.catagory',compact('cat'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateCatagoryForm $ca)
	{


		Catagory::create([
			'name'=> $ca->get('name'),
			'slug'=>$ca->get('slug')

			]
			);
		return redirect('admin/catagory');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		dd('show');
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
		$catagory = Catagory::find($id);
		$catagory->delete();
		return redirect('admin/catagory');

	}

}
