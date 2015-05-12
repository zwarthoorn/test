<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\State;

class StatesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		  DB::table('states')->delete(); 

		 State::create( [
            'duty' => 'admin'
        ] );
		 State::create( [
            'duty' => 'mod'
        ] );
		 State::create( [
            'duty' => 'member'
        ] );
		 State::create( [
            'duty' => 'guest'
        ] );
	}

}
