<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class PreRegisterRequest extends FormRequest
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
     * Prepare data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'pertenece_uaslp' => $this->no_curp === 'true' 
                ? true : ($this->no_curp === 'false' 
                ? false : null),

            'no_curp' => $this->no_curp === 'true' 
                ? true : ($this->no_curp === 'false' 
                ? false : null),
            
            'is_disabled' => $this->is_disabled === 'true' 
            ? true : ($this->is_disabled === 'false' 
            ? false : null),

            'clave_uaslp' => $this->clave_uaslp === 'null' ? null : $this->clave_uaslp,            
            'directorio_activo' => $this->directorio_activo === 'null' ? null : $this->directorio_activo,
            'curp' => $this->curp === 'null' ? null : $this->curp,
            'password' => $this->password === 'null' ? null : $this->password,
            'rpassword' => $this->rpassword === 'null' ? null : $this->rpassword,

        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $curp_pattern = 'regex:/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/i';
        
        return [
            'pertenece_uaslp' => ['required', 'boolean'],
            'clave_uaslp' => ['nullable', 'required_if:pertenece_uaslp,true', 'numeric'],
            'directorio_activo' => ['nullable', 'required_if:pertenece_uaslp,true', 'string'],
            'email' => [ 'required', 'string', 'email', 'max:255' ],
            'email_alterno' => [ 'required', 'string', 'email', 'max:255' ],
            'password' => ['nullable', 'required_if:pertenece_uaslp,false', 'string', 'max:255'],
            'rpassword' => ['nullable', 'required_if:pertenece_uaslp,false', 'same:password','string', 'max:255'],
            'curp' => ['nullable', 'required_if:no_curp,false',  'size:18', $curp_pattern,],
            'name' => ['required', 'string', 'max:255' ],
            'first_surname' => ['required','string','max:255'],
            'last_surname' => ['nullable'],
            'birth_date' => ['required','date', 'before:'.Carbon::now()->toString(), ],
            'ocupation' => ['required', 'string', 'max:255'],
            'gender' => [ 'required', 'string', 'in:Solterx,Casadx,Divorciadx,Viudx,Otro' ],
            'other_gender' => ['nullable','required_if:gender,Otro'],
            'civic_state' => [ 'required', 'string', 'in:Masculino,Femenino,Otro,No especificar' ],
            'other_civic_state' => ['nullable','required_if:civic_state,Otro'],
            'birth_country' => ['required','string','max:255'],
            'birth_state' => ['required','string','max:255'],
            'residence_country' => ['required','string','max:255'],
            'zip_code' => ['required', 'numeric'],
            'phone_number' => ['required','numeric'],
            'is_disabled' => ['required', 'boolean'],
            'ethnicity' => ['required','string','max:255'],
            'disability' => ['nullable','required_if:is_disabled,true']
        ];
    }
}
