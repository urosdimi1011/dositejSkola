<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffMembersRequest extends FormRequest
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
            'name'               => 'required|string|max:255',
            'email'               => 'required|string|max:255',
            'role'               => 'required|in:nastavno,nenastavno',
            'prijava'               => 'required|exists:positions,id',
            'bio'                => 'nullable|string',
            'photo'              => 'nullable|image|max:2048',   // do 2MB
            'documents'           => 'nullable|array',
            'documents.*.title'   => 'required_with:documents|string|max:255',
            'documents.*.file'    => 'required_with:documents|file|max:5120',
        ];
    }
}
