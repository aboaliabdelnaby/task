<?php

namespace App\Http\Livewire\Admin\Company;

use App\Http\Validation\Company\StoreValidationRules;
use App\Models\Company;
use App\MyPackages\Livewire\Components\Traits\CreateHelper;
use App\MyPackages\Livewire\Filters\Pipeline;
use App\Notifications\CompanyNotification;
use Livewire\Component;
use Livewire\WithFileUploads;

class CompanyCreate extends Component
{
    use CreateHelper,WithFileUploads;
    public string $name='';
    public string $email='';
    public string $url='';
    public mixed $logo='';

    protected string $message = '';
    protected string $view = 'admin.company.company-create';
    private $query;
    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->storeValidation = app(StoreValidationRules::class);
        $this->query = app(Pipeline::class)->setModel(Company::class);
        $this->message = 'Company created successfully';
    }

    public function create():void
    {
        $validatedData = $this->validate();
        $validatedData['user_id'] =auth()->id();
        if (!empty($this->logo)) {
            $validatedData['logo'] = $this->logo->store('company/photo', 'public');
        }
        $company=$this->query->create($validatedData);
        $company->notify(new CompanyNotification('your account is created'));
        $this->resetInputFields();
        $this->emit('creating', $this->message);
    }

    protected function resetInputFields(): void
    {
        $this->reset(['name','email','url','logo']);
        $this->emitUp('refreshComponent');
    }
}
