<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Hash;
use App\User;

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		  DB::table('users')->delete(); 

		User::create([
			'name'=> 'walter',
			'email'=>'walterwiesnekkerw@gmail.com',
			'password'=>Hash::make('walterinlog'),
			'state_id'=> 1
			]);
				User::create([
			'name'=> 'spaceman',
			'email'=>'spaceman@gmail.com',
			'password'=>Hash::make('space'),
			'state_id'=> 1
			]);
	}

}
