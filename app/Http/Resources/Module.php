<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Module extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'block_id' => $this->block_id,
            'module_name' => $this->module_name,
            'comment' => $this->comment
        ];
    }
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
