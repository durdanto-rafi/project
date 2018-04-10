<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssetModel extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'company_id' => $this->company_id,
            'model_type' => $this->model_type,
            'model_image' => $this->model_image,
            'model_rent' => $this->model_rent,
            'model_rent_frequency' => $this->model_rent_frequency,
            'minimum_stock' => $this->minimum_stock,
            'current_stock' => $this->current_stock
        ];
    }
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
