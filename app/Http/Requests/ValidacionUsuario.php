<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionUsuario extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->route('id')){
            
        return [
            
            'tipo_de_usuario'  => 'required',
            'email'  => 'required|email|max:100|unique:usuario,email,'.$this->route('id'),
            'activo'  => 'required',
            'rol_id' => 'required|integer'
        ];
            
        }else{
        
        
        
        return [
            'usuario'  => 'required|max:50|unique:usuario,usuario,'.$this->route('id'),
            'tipo_de_usuario'  => 'required',
            'email'  => 'required|email|max:100|unique:usuario,email,'.$this->route('id'),
            'password'  => 'required|min:6',
            'remenber_token'  => 'required|same:password',
            'activo'  => 'required',
            'empleado_id' => 'required|integer|unique:usuario,empleado_id',
            'rol_id' => 'required|integer'
        ];
    
            
            }
        }
}
