<?php

namespace App\Http\Livewire\Admin\Company;

use App\Http\Validation\Company\UpdateValidationRules;
use App\Models\Company;
use App\MyPackages\Livewire\Components\Traits\EditHelper;
use App\MyPackages\Livewire\Filters\Pipeline;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithFileUploads;

class CompanyEdit extends Component
{
    use EditHelper,WithFileUploads;
    public string $name='';
    public string $email='';
    public string $url='';
    public mixed $logo='';
    public string $oldLogo='';

    protected string $message = '';
    protected string $view = 'admin.company.company-edit';
    protected string $route = 'admin.company.index';
    private $query;


    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->updateValidation = app(UpdateValidationRules::class);
        $this->query = app(Pipeline::class)->setModel(Company::class);
        $this->message = 'Company updated successfully';
    }

    public function mount(Company $company):void
    {
        $this->rowId = $company->id;
        $this->name = $company->name;
        $this->email = $company->email;
        $this->url = $company->url;
        $this->oldLogo = $company->logo;
    }

    public function update():mixed
    {
        $validatedData = $this->validate();
        $validatedData = $this->storePhoto($validatedData);
        $this->query->where('id',$this->rowId)->update($validatedData);
        session()->flash('success', $this->message);
        return redirect()->route($this->route);
    }
    protected function rules(): array
    {
        return $this->updateValidation::rules($this->rowId);
    }
    private function storePhoto($data): mixed
    {
        if (!empty($this->logo)) {
            $data['logo'] = $this->logo->store('company/photo', 'public');
        } else {
            $data = Arr::except($data,'logo');
        }
        return $data;
    }
}
