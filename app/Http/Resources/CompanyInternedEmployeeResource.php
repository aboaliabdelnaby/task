<?php

namespace App\Http\Resources;

use App\Enums\InternStatusEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyInternedEmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'count_of_interned_employees'=>$this->employees()->where('is_intern',InternStatusEnum::NotIntern)->count()
        ];
    }
}
