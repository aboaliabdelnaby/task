<?php

namespace App\Http\Livewire\Admin\Employee;

use App\Http\Validation\Employee\UpdateValidationRules;
use App\Models\Company;
use App\Models\Employee;
use App\MyPackages\Livewire\Components\Traits\EditHelper;
use App\MyPackages\Livewire\Filters\Pipeline;
use Livewire\Component;

class EmployeeEdit extends Component
{
    use EditHelper;
    public string $first_name='';
    public string $last_name='';
    public string $email='';
    public string $phone='';
    public int|string $company_id='';

    protected string $message = '';
    protected string $view = 'admin.employee.employee-edit';
    protected string $route = 'admin.employee.index';
    private $query;


    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->updateValidation = app(UpdateValidationRules::class);
        $this->query = app(Pipeline::class)->setModel(Employee::class);
        $this->message = 'Employee updated successfully';
    }

    public function mount(Employee $employee):void
    {
        $this->rowId = $employee->id;
        $this->first_name = $employee->first_name;
        $this->last_name = $employee->last_name;
        $this->email = $employee->email;
        $this->phone = $employee->phone;
        $this->company_id = $employee->company_id;
    }

    public function update():mixed
    {
        $validatedData = $this->validate();
        $this->query->where('id',$this->rowId)->update($validatedData);
        session()->flash('success', $this->message);
        return redirect()->route($this->route);
    }
    protected function rules(): array
    {
        return $this->updateValidation::rules($this->rowId);
    }
    public function getAllCompanies():mixed{
        $this->query = app(Pipeline::class)->setModel(Company::class);
        return $this->query->get();
    }
}
