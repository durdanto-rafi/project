<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Company extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'account_id' => $this->account_id,
            'company_name' => $this->company_name,
            'is_customer' => $this->is_customer,
            'links' => $this->email,
            'links' => $this->address
        ];
    }
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
