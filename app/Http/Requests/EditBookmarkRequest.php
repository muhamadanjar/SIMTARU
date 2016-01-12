<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditBookmarkRequest extends Request {

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
			'name' => 'required',
			'x_min' => 'required',
			'y_min' => 'required',
			'x_max' => 'required',
			'y_max' => 'required',
			'wkid' => 'required',
		];
	}

}
