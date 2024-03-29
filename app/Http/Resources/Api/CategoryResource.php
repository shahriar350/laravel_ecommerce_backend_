<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => encrypt($this->id),
            'label' => ucfirst($this->name),
            'children' => count($this->children) > 0 ? CategoryChildResource::collection($this->whenLoaded('children')) : null,
        ];
    }
}
