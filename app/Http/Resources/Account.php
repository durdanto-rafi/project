<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Account extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'update_by' => $this->update_by
            
        ];
    }
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
