<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Request\AuthorizationException;

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
        # Cast de tipos de datos :v
        $casts = [
            'true' => true,
            'false' => false,
            'null' => null
        ];

        # Prepara los datos para sanitización :v
        $this->merge([
            'name' => $casts[$this->name] ?? $this->name, 
            'first_surname' => $casts[$this->first_surname] ?? $this->first_surname, 
            'last_surname' => $casts[$this->last_surname] ?? $this->last_surname, 
            'pertenece_uaslp' => $casts[$this->pertenece_uaslp] ?? null, 
            'no_curp' => $casts[$this->no_curp] ?? null,
            'is_disabled' => $casts[$this->is_disabled] ?? null,
            'clave_uaslp' => $casts[$this->clave_uaslp] ?? $this->clave_uaslp,            
            'directorio_activo' => $casts[$this->directorio_activo] ?? $this->directorio_activo,
            'curp' => $casts[$this->curp] ?? $this->curp,
            'password' => $casts[$this->password] ?? $this->password,
            'rpassword' => $casts[$this->rpassword] ?? $this->rpassword,
            'ocupation' => $casts[$this->ocupation] ?? $this->ocupation,
            'other_gender' => $casts[$this->other_gender] ?? $this->other_gender,
            'other_civic_state' => $casts[$this->other_civic_state] ?? $this->other_civic_state,
            'birth_country' => $casts[$this->birth_country] ?? $this->birth_country,
            'birth_state' => $casts[$this->birth_state] ?? $this->birth_state,
            'residence_country' => $casts[$this->residence_country] ?? $this->residence_country,
            'altern_email' => $this->email_alterno,
            'middlename' => $this->first_surname,
            'surname' => $this->last_surname,
            'nationality' => $this->birth_country,
            'residence' => $this->residence_country
        ]);
    }

    // public function failedAuthorization()
    // {
    //     throw new AuthorizationException;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $curp_pattern = 'regex:/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/i';
        
        return [
            'announcement_id' => ['required','exists:announcements,id'],
            'pertenece_uaslp' => ['required', 'boolean'],
            'clave_uaslp' => ['nullable', 'required_if:pertenece_uaslp,true', 'prohibited_if:pertenece_uaslp,false', 'numeric'],
            'directorio_activo' => ['nullable', 'required_if:pertenece_uaslp,true', 'prohibited_if:pertenece_uaslp,false', 'string'],
            'email' => [ 'required', 'string', 'email', 'max:255' ],
            'email_alterno' => [ 'required', 'string', 'email', 'max:255' ],
            'password' => ['nullable', 'required_if:pertenece_uaslp,false', 'prohibited_if:pertenece_uaslp,true', 'string', 'max:255'],
            'rpassword' => ['nullable', 'required_if:pertenece_uaslp,false', 'prohibited_if:pertenece_uaslp,true', 'same:password','string', 'max:255'],
            'curp' => ['nullable', 'required_if:no_curp,false',  'size:18', $curp_pattern,],
            'name' => ['required', 'string', 'max:255' ],
            'first_surname' => ['required','string','max:255'],
            'last_surname' => ['nullable'],
            'birth_date' => ['required','date', 'before:'.Carbon::now()->toString(), ],
            'ocupation' => ['required', 'string', 'max:255'],
            'gender' => [ 'required', 'string', 'in:Masculino,Femenino,Otro,No especificar' ],
            'other_gender' => ['nullable','required_if:gender,Otro'],
            'civic_state' => [ 'required', 'string', 'in:Soltero,Casado,Divorciado,Viudo,Otro,No especificar' ],
            'other_civic_state' => ['nullable','required_if:civic_state,Otro'],
            'birth_country' => ['required','string','max:255'],
            'birth_state' => ['required','string','max:255'],
            'residence_country' => ['required','string','max:255'],
            'zip_code' => ['required', 'numeric'],
            'phone_number' => ['required','numeric'],
            'is_disabled' => ['required', 'boolean'],
            'ethnicity' => ['required','string','max:255'],
            'disability' => ['nullable','required_if:is_disabled,true'],
            'altern_email' => ['required', 'same:email_alterno'],
            'middlename' => ['required', 'same:first_surname'],
            'surname' => ['required', 'same:last_surname'],
            'nationality' => ['required', 'same:birth_country'],
            'residence' => ['required', 'same:residence_country']
        ];
    }
}
