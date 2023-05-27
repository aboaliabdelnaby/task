<?php

namespace App\Http\Controllers\Api\Admin\Employee;

use App\Helpers\APIHelpersTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyInternedEmployeeResource;
use App\Models\Company;
use App\Models\Employee;
use App\MyPackages\Livewire\Filters\Pipeline;

class CompanyInternedEmployeeController extends Controller
{
    //
    use APIHelpersTrait;
    public function __invoke()
    {
        $this->query = app(Pipeline::class)->setModel(Company::class);
        $employees=$this->query->with('employees')->get();
        if($employees->count()<1){
            return $this->jsonNotFoundResponse();
        }
        $items = CompanyInternedEmployeeResource::collection($employees);

        return $this->jsonResponse($items);
    }
}
