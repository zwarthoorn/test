<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model {

	protected $table = 'catagorys';

	protected $fillable =[
		'name',
		'slug'
	];
}
