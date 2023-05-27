<?php

namespace App\Http\Livewire\Admin\Company;

use App\Models\Company;
use App\MyPackages\Livewire\Components\Traits\ShowHelper;
use Livewire\Component;

class CompanyShow extends Component
{
    use ShowHelper;
    protected string $view = 'admin.company.company-show';
    public function mount(Company $company):void
    {
        $this->data=$company;
    }
}
