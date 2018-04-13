<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Asset extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'company_id' => $this->company_id,
            'model_id' => $this->model_id,
            'asset_name' => $this->asset_name,
            'label_id' => $this->label_id,
            'label_value' => $this->label_value,
            'asset_description' => $this->asset_description,
            'asset_quality' => $this->asset_quality,
            'asset_status' => $this->asset_status,
            'asset_cost' => $this->asset_cost,
            'update_by' => $this->update_by
        ];
    }
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
