<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UploadRequest extends Request {

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
        $rules = [
            'title' => 'required|min:3',
            'category_id' => 'required',
            'style_id' => 'required',
            'width' => 'required',
            'height' => 'required',
            'dept' => 'required',
            'material_id' => 'required',
            'start_date' => 'required_if:is_auction,1|date',
            'end_date' => 'required_if:is_auction,1|date',
            'start_price' => 'required_if:is_auction,1|integer',
            'duplicate_price' => 'required_if:is_auction,1|integer',
            'selling_price' => 'required_if:is_auction,0|integer',
            'description' => 'required|min:5'
        ];

        return $rules;
	}

}
