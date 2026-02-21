<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BulkLeaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'regiment_id' => 'required|exists:regiments,id',
            'soldiers'    => 'required|array',
            'soldiers.*'  => 'exists:soldiers,id',
        ];
    }

    public function messages()
    {
        return [
            'regiment_id.required' => 'يجب اختيار السرية.',
            'soldiers.required'    => 'يجب تحديد جنود على الأقل.',
        ];
    }
}
