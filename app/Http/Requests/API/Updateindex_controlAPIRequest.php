<?php

namespace App\Http\Requests\API;

use App\Models\index_control;
use InfyOm\Generator\Request\APIRequest;

class Updateindex_controlAPIRequest extends APIRequest
{
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
        return index_control::$rules;
    }
}
