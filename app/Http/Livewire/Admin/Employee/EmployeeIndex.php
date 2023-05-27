<?php

namespace App\Http\Livewire\Admin\Employee;

use App\Enums\InternStatusEnum;
use App\Models\Employee;
use App\MyPackages\Livewire\Components\Traits\IndexHelper;
use App\MyPackages\Livewire\Filters\Pipeline;
use App\MyPackages\Livewire\Filters\SearchFilterPipeline;
use App\MyPackages\Livewire\Filters\SortFilterPipeline;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeIndex extends Component
{
    use WithPagination, IndexHelper;

    protected string $view = 'employee.employee-index';
    protected array $searchColumns = ['first_name','last_name', 'email'];
    protected $listeners = ['refreshComponent' => '$refresh', 'delete'];
    protected string $message = '';
    private $query;
    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->query = app(Pipeline::class)->setModel(Employee::class);
        $this->message='Employee deleted successfully';

    }

    public function render()
    {
        $data=$this->query->pushPipeline([
            new SearchFilterPipeline($this->searchColumns, $this->search),
            new SortFilterPipeline($this->sortField, $this->sortType)
        ])->with('company')->paginate($this->paginatePerPage);
        return view(
            view: 'livewire.admin.' . $this->view,
            data: get_defined_vars()
        );
    }
    public function delete(int $id):void
    {
        $this->query->where('id',$id)->delete();
        $this->emit('success', $this->message);
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
