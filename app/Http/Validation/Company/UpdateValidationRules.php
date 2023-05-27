<?php

namespace App\Http\Validation\Company;

use App\MyPackages\Livewire\Validation\Validation;

class UpdateValidationRules implements Validation
{

    public static function rules($id=null): array
    {
        return [
            'name'=> ['required', 'string', 'max:255'],
            'email'=> ['required', 'email','regex:/(.+)@(.+)\.(.+)/i', 'max:255',"unique:companies,email,$id,id"],
            'url'=> ['required', 'url', 'max:255'],
            'logo'=> ['nullable', 'image', 'max:255'],
        ];
    }
}
