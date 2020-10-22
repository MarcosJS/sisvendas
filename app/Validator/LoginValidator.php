<?php

namespace App\Validator;

use App\Models\Usuario;

class LoginValidator
{
    public static function validate($request) {
        $rules['cpf'] = 'required';
        $rules['password'] = 'required';

        $messages['cpf.required'] = Usuario::$messages['cpf.required'];
        $messages['password.required'] = Usuario::$messages['password.required'];

        $validator = \Validator::make($request, $rules, $messages);

        if (!$validator->errors()->isEmpty()) {
            throw new ValidationException($validator, "Erro nos dados informados");
        }
        return $validator;
    }

}
