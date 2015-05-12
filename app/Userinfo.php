<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model {

	protected $table = 'userinfos';

	protected $fillable = [
		'name',
		'surename',
		'age',
		'adress',
		'zipcode',
		'stad',
		'country',
		'users_id'
	];


}
