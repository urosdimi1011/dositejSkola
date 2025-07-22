<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentApplicationRequest extends FormRequest
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
            'ime'                       => 'required|string|max:255',
            'prezime'                   => 'required|string|max:255',
            'roditelj'                  => 'required|string|max:255',
            'jmbg'                      => 'required|digits:13',
            'datumRodjenja'             => 'required|date|before:today',
            'mestoRodjenja'             => 'required|string|max:255',
            'mestoStalnogRodjenja'      => 'required|string|max:255',
            'mestoZaVremeStudiranja'    => 'nullable|string|max:255',
            'drzavljanstvo'             => 'required|string|max:255',
            'nacionalnost'              => 'required|string|max:255',
            'st_program'                => 'required',
            'zavrsenaSrednjaSkola'      => 'required|string|max:255',
            'mobilniTelefon'            => [
                'required',
                'regex:/^(06\d{7,8})$/'
            ],
            'email'                     => 'required|email',
        ];
    }

    public function messages(): array
    {
        return [
            'ime.required'                  => 'Polje Ime je obavezno.',
            'ime.string'                    => 'Ime mora biti tekst.',
            'ime.max'                       => 'Ime ne može imati više od :max karaktera.',

            'prezime.required'              => 'Polje Prezime je obavezno.',
            // … isto za prezime …

            'jmbg.required'                 => 'Polje JMBG je obavezno.',
            'jmbg.digits'                   => 'JMBG mora imati tačno 13 cifara.',
            'jmbg.unique'                   => 'Ovaj JMBG je već registrovan.',

            'datumRodjenja.required'        => 'Datum rođenja je obavezan.',
            'datumRodjenja.date'            => 'Datum rođenja nije ispravan datum.',
            'datumRodjenja.before'          => 'Datum rođenja mora biti pre današnjeg dana.',

            'st_program.in'                 => 'Studijski program nije validan.',

            'mobilniTelefon.required'       => 'Mobilni telefon je obavezan.',
            'mobilniTelefon.regex'          => 'Mobilni telefon nije u ispravnom formatu (npr. 0611234567).',

            'email.required'                => 'E-mail je obavezan.',
            'email.email'                   => 'E-mail format nije validan.',
            'email.unique'                  => 'Ovaj e-mail je već registrovan.',

            // … i poruke za ostala polja …
        ];
    }

}
