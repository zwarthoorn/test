<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Auth;
use App\User;
use Mail;


class MembersController extends Controller {
private $onderwerp;
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		if (Auth::check()) {
			$users = User::all()->toArray();
			//dd($users);
			return view('adminViews/members',compact('users'));
		}else{
			redirect('inlog');
		}
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if (Auth::check()) {
			
			$user = User::find($id)->toArray();
			
			return view('adminViews/adminMemberEdit',compact('user'));
		}else{
			redirect('inlog');
		}
		
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
		$user = User::find($id);
		$user->delete();
		return redirect('admin/members');
	}

	public function emailSend($email)
	{

		return view('adminViews.emailMember',['email'=> $email]);
	}
	public function fullEmailSend()
	{
		$sendAdress = Request::input('email');

		$onderwerp =Request::input('onderwerp');
		
		Mail::send('emails.custom', ['input'=>Request::input('text'),'adminName'=>Auth::user()->name], function($message) use ($sendAdress,$onderwerp)
		{
   		 $message->to($sendAdress, 'walter')->subject($onderwerp);
		});
		return redirect('/admin/members');
	}

}
