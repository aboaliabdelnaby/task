<?php

namespace App\Http\Livewire\Admin\Employee;

use App\Enums\InternStatusEnum;
use App\Models\Employee;
use App\MyPackages\Livewire\Components\Traits\ShowHelper;
use Livewire\Component;

class EmployeeShow extends Component
{
    use ShowHelper;
    protected string $view = 'admin.employee.employee-show';
    public function mount(Employee $employee):void
    {
        $this->data=$employee;
    }
    public function internStatus($value):string{
        $allStatus = [
            InternStatusEnum::NotIntern->value => "<span class='badge badge-danger'>not-intern</span>",
            InternStatusEnum::Intern->value => "<span class='badge badge-success'>intern</span>",
        ];
        return $allStatus[$value];
    }
    public function formatDate($started_at):string{
        return $started_at?\Carbon\Carbon::parse($started_at)->format('d M Y'):'';
    }
}
