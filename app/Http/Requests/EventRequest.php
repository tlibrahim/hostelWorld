<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $todayDate = '2021-04-10';

        $validation = [];

        if($this->has('country') || $this->has('city')){

            $validation += [
                $this->has('country')?'country':'city' => 'required|max:20',
            ];
        }

        if($this->has('date')){

            $validation += [
                'date' => 'required|date_format:Y-m-d|after_or_equal:'.$todayDate,
            ];
        }

        if(!empty($validation)){

            return $validation;
        }

        return [
            
            $this->has('country')?'country':'city' => 'required|max:20',
            'date' => 'required|date_format:Y-m-d|after_or_equal:'.$todayDate,
            
        ];
    }

    public function messages()
    {
        return [
            'country.required' => 'Country OR City is Required', 
            'city.required' => 'Country OR City is Required', 
            'date.required' => 'Date (Y-m-d) is required with current OR future date only.',
        ];
    }
}
