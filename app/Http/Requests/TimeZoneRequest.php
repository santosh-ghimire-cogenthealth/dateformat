<?php

namespace App\Http\Requests;

use App\Rules\DateFormatRule;
use Illuminate\Foundation\Http\FormRequest;

class TimeZoneRequest extends FormRequest
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
        return [
            'timezone1' => 'required',
            'timezone2' => 'required',
            'time' => 'required',
            'format' => ['sometimes', new DateFormatRule()],

        ];
    }
}
