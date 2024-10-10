<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConfigurationDetailsResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'image_url' => isset($this->image_url) ? fileLink($this->image_url) : '',
            "link" => $this->link,
            'configuration_content_type_id ' => $this->configuration_content_type_id
        ];
    }
}
