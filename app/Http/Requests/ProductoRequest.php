<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'nombre'=>'required',
            'descripcion' => 'nullable',
            'precio' => 'required',
            'precio_venta' => 'required',
            'stock' => 'required',

        ];
    // La imagen solo es obligatoria en el método 'store'
    if ($this->isMethod('POST')) {
        $rules['imagen'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
    }

    // La imagen es opcional en el método 'update' (PUT/PATCH)
    if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
        $rules['imagen'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
    }


    }
    public function messages(): array
    {
    return [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'imagen.required' => 'La imagen es obligatoria.',
        'imagen.image' => 'El archivo debe ser una imagen.',
        'imagen.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg o gif.',
        'imagen.max' => 'El tamaño de la imagen no puede ser mayor a 2MB.',
        'precio.required' => 'El campo precio es obligatorio.',
        'precio_venta.required' => 'El campo precio de venta es obligatorio.',
        'stock.required' => 'El campo stock es obligatorio.',
    ];
   }
}
