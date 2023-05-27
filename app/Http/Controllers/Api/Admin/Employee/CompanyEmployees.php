<?php

namespace App\Http\Controllers\Api\Admin\Employee;

use App\Helpers\APIHelpersTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyEmployeeResource;
use App\Models\Employee;
use App\MyPackages\Livewire\Filters\Pipeline;

class CompanyEmployees extends Controller
{
    use APIHelpersTrait;
    public function __invoke(int $company_id)
    {
        $this->query = app(Pipeline::class)->setModel(Employee::class);
        $employees=$this->query->where('company_id',$company_id)->get();
        if($employees->count()<1){
            return $this->jsonNotFoundResponse();
        }
        $items = CompanyEmployeeResource::collection($employees);

        return $this->jsonResponse($items);
    }
}
