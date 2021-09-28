<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class RegisterRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        # Valida el correo de la uaslp.
        $response = Http::post('https://ambiental.uaslp.mx/apiagenda/api/users/uaslp-user', [
            'username' => $this->EmailR ?? null
        ]);

        # Guarda los datos recuperados del directorio activo en la solicitud.
        if ($response->successful())
        {
            $response_data = $response->json()['data'];

            $this->merge([
                'CURP' => $this->CURP !== null ? Str::upper($this->CURP) : null,
                'DirectorioActivo' => $response_data['DirectorioActivo'],
                'ClaveUASLP' => $response_data['ClaveUASLP'],
                'EmailR' => Str::lower($this->EmailR),
                'Nombres' => Str::upper($response_data['name']),
                'ApellidoP' => Str::upper($response_data['first_surname']),
                'ApellidoM' => $response_data['last_surname'] !== null ? Str::upper($response_data['last_surname']) : null,
                'CorreoAlterno' => $this->CorreoAlterno !== null ? Str::lower($this->CorreoAlterno) : null,
            ]);
        }
        else
        {
            $this->merge([
                'CURP' => $this->CURP !== null ? Str::upper($this->CURP) : null,
                'email' => Str::lower($this->email),
                'Nombres' => Str::upper($this->Nombres),
                'ApellidoP' => Str::upper($this->ApellidoP),
                'ApellidoM' => $this->ApellidoM !== null ? Str::upper($this->ApellidoM) : null,
                'CorreoAlterno' => $this->CorreoAlterno !== null ? Str::lower($this->CorreoAlterno) : null,
            ]);
        }
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'PerteneceUASLP' => ['required', 'in:Si,No'],
            'EmailR' => [ 'required', 'string', 'email', 'max:255' ],
            'Password' => [ Rule::requiredIf($this->DirectorioActivo === null) ],
            'PasswordR' => [ Rule::requiredIf($this->DirectorioActivo === null), 'same:Password' ],
            'Nombres' => [ 'required', 'string', 'max:255' ],
            'ApellidoP' => [ 'required', 'string', 'max:255' ],
            'ApellidoM' => [ 'nullable' ],
            'Edad' => ['required','numeric'],
            'Genero' => ['required', 'in:Masculino,Femenino,Otros,No especificar'],
            'OtroGenero' => ['nullable','required_if:Genero,Otros'],
            'TienesCurp' => ['required', 'in:Si,No'],
            'Curp' => [
                'nullable',
                'required_if:TienesCurp,Si',
                'size:18',
                'regex:/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/i',
            ],
            
            // Hola Miguel
            // Prueba de sabotaje
            'PaisNacimiento' => [ 'required' ],
            'EstadoNacimiento' => ['required'],
            'PaisResidencia' => ['required'],
            'Tel' => [ 'required', 'numeric' ],
            'Cp' => ['required','numeric'],
            'IsDiscapacidad' => ['required', 'in:Si,No'],
            'Discapacidad' => ['nullable','required_if:IsDiscapacidad,Si']
        ];
    }
}