<?php

namespace App\Http\Livewire\Admin\Employee;

use App\Enums\InternStatusEnum;
use App\Http\Validation\Employee\StoreValidationRules;
use App\Models\Company;
use App\Models\Employee;
use App\MyPackages\Livewire\Components\Traits\CreateHelper;
use App\MyPackages\Livewire\Filters\Pipeline;
use Livewire\Component;

class EmployeeCreate extends Component
{
    use CreateHelper;
    public string $first_name='';
    public string $last_name='';
    public string $email='';
    public string $phone='';
    public int|string $company_id='';

    protected string $message = '';
    protected string $view = 'admin.employee.employee-create';
    private $query;
    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->storeValidation = app(StoreValidationRules::class);
        $this->query = app(Pipeline::class)->setModel(Employee::class);
        $this->message = 'Company created successfully';
    }

    public function create():void
    {
        $validatedData = $this->validate();
        $validatedData['is_intern']=InternStatusEnum::Intern->value;
        $validatedData['started_at']=now();
        $validatedData['user_id'] =auth()->id();
        $this->query->create($validatedData);
        $this->resetInputFields();
        $this->emit('creating', $this->message);
    }

    protected function resetInputFields(): void
    {
        $this->reset(['first_name','last_name','email','phone','company_id']);
        $this->emitUp('refreshComponent');
    }
    public function getAllCompanies():mixed{
        $this->query = app(Pipeline::class)->setModel(Company::class);
        return $this->query->get();
    }
}
