<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleUpdateRequest extends FormRequest
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
            'type'      => 'required|in:class,exam',
            'title'     => 'required|string|max:255',
            'file_path'  => 'nullable|file|mimes:pdf,docx,doc,xlsx,xls|max:10000',
            'is_active' => 'sometimes|boolean',
            'study_program_id' => 'nullable|exists:study_programs,id'
        ];
    }
}
