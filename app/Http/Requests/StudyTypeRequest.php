<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudyTypeRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'study_program_id'=>'nullable|exists:study_programs,id',
            'type'=> 'nullable|in:nastave,ispita,aktivnosti',
            'allData' => 'nullable|in:true,false'
        ];
    }
}
