<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HUDResource extends JsonResource
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
            'district_id' => $this->district_id,
            'image_url' => (isset($this->image_url) && $this->image_url)?fileLink($this->image_url): '',
            'land_document_url' => (isset($this->property_document_url) && $this->property_document_url)?fileLink($this->property_document_url): '',
            "video_url" => $this->video_url ?? '',
            "location_url" => $this->location_url ?? '',
            'contact' => [
                'contact_id' => $this->hud_contact->id ?? '',
                'is_post_vacant' => $this->hud_contact->is_post_vacant ?? '',
                'name' => $this->hud_contact->name ?? '',
                'phone_number' => $this->hud_contact->mobile_number ?? '',
                'email_address' => $this->hud_contact->email_id ?? '',
                'landline_number' => $this->hud_contact->landline_number ?? '',
                'designation' => $this->hud_contact->designation->name ?? '',
                'fax' => $this->hud_contact->fax ?? '',
                'image_url' => '',
                'location_url' => '',
            ],
        ];
    }
}
