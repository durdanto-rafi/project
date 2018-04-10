<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ModelType extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'account_id' => $this->account_id,
            'model_make' => $this->model_make,
            'model_type' => $this->model_type
        ];
    }
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}