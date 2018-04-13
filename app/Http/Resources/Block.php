<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Block extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'blocks_name' => $this->blocks_name,
            'update_by' => $this->update_by
        ];
    }
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
