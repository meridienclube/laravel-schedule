<?php

namespace ConfrariaWeb\Schedule\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateScheduleRequest extends FormRequest
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
            'title' => 'required',
            'status' => 'required',
            'type' => 'required',
            'what' => 'required',
            'where' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O titulo é obrigatório',
            'status.required' => 'O status é obrigatório',
            'type.required' => 'O tipo é obrigatório',
            'what.required' => 'O campo "O que" é obrigatório',
            'where.required' => 'O campo "Onde" é obrigatório',
        ];
    }
}
