<?php
namespace App\Http\Validation\Employee;

use App\MyPackages\Livewire\Validation\Validation;
class StoreValidationRules implements Validation
{
    public static function rules(): array
    {
        return [
            'first_name'=> ['required', 'string', 'max:255'],
            'last_name'=> ['required', 'string', 'max:255'],
            'phone'=> ['required', 'numeric'],
            'company_id'=> ['required', 'numeric', 'exists:companies,id'],
            'email'=> ['required', 'email','regex:/(.+)@(.+)\.(.+)/i', 'max:255', 'unique:companies'],
        ];
    }

}
