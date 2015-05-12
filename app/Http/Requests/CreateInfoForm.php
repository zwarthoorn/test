<?php namespace App\Http\Requests;

use App\Http\Requests\Request;


class CreateInfoForm extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'firstname'=>'required|min:3',
			'surname'=>'required|min:3',
			'date'=>'required',
			'street-address'=>'required',
			'postcode'=>'required',
			'city'=>'required',
			'country'=>'required'
		];
	}

}
