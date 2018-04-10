<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Spares extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'account_id' => $this->account_id,
            'asset_id' => $this->asset_id,
            'spare_serial' => $this->spare_serial,
            'spare_type' => $this->spare_type,
            'spare_image' => $this->spare_image,
            'spare_description' => $this->spare_description,
            'spare_manufacturar_id' => $this->spare_manufacturar_id,
            'minimum_stock' => $this->minimum_stock,
            'current_stock' => $this->current_stock,   
        ];
    }
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
