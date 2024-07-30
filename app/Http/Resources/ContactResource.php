<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            'is_post_vacant' => $this->is_post_vacant,
            'designation' => $this->designation->name ?? '',
            'email_address' => $this->email_id,
            'landline_number' => $this->landline_number,
            'image_url' => (isset($this->image_url) && $this->image_url)?fileLink($this->image_url): '',
            'location_url' => $this->location_url,
            'phone_number' => $this->mobile_number,
            'fax' => $this->fax,
            'contact_type' => $this->contact_type,

            
                
        ];
    }
}
