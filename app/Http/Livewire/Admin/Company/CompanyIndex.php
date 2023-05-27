<?php

namespace App\Http\Livewire\Admin\Company;

use App\Models\Company;
use App\MyPackages\Livewire\Components\Traits\IndexHelper;
use App\MyPackages\Livewire\Filters\Pipeline;
use App\MyPackages\Livewire\Filters\SearchFilterPipeline;
use App\MyPackages\Livewire\Filters\SortFilterPipeline;
use Livewire\Component;
use Livewire\WithPagination;

class CompanyIndex extends Component
{
    use WithPagination, IndexHelper;

    protected string $view = 'company.company-index';
    protected array $searchColumns = ['name', 'email'];
    protected $listeners = ['refreshComponent' => '$refresh', 'delete'];
    protected string $message = '';
    private $query;
    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->query = app(Pipeline::class)->setModel(Company::class);
        $this->message='Company deleted successfully';

    }

    public function render()
    {
        $data=$this->query->pushPipeline([
            new SearchFilterPipeline($this->searchColumns, $this->search),
            new SortFilterPipeline($this->sortField, $this->sortType)
        ])->paginate($this->paginatePerPage);
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
}
