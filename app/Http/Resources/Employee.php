<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Employee extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            
            "id" => $this->id,
            "name" => $this->name,
            "city" => $this->city,
            "salary" => $this->salary,

        ];

    }
}
