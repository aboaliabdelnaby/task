<?php
namespace App\Http\Validation\Company;

use App\MyPackages\Livewire\Validation\Validation;
class StoreValidationRules implements Validation
{
    public static function rules(): array
    {
        return [
            'name'=> ['required', 'string', 'max:255'],
            'email'=> ['required', 'email','regex:/(.+)@(.+)\.(.+)/i', 'max:255', 'unique:companies'],
            'url'=> ['required', 'url', 'max:255'],
            'logo'=> ['required', 'image', 'max:255'],
        ];
    }

}
