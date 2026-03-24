<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
          'nombre'=>'required|max:100',
          'descripcion'=>'required',
          'status'=>'required|boolean'
        ];
    }

    public function messages():array
    {
        return[
            'nombre.required'=>'Elcampo nombre es obligatorio',
            'nombre.max'=>'el nombre debe tenr maxiomo 100 caracteres',
            'nombre.unique'=>'el nombre ya existe',
            'descripcion.required'=>'el campo es descripcion obligatorio',
            'status.required'=>"el campo es obligatorio"
        ];

    }
}
