<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HSCResource extends JsonResource
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
            'phc_id' => $this->phc_id,
            'image_url' => (isset($this->image_url) && $this->image_url)?fileLink($this->image_url): '',
            'land_document_url' => (isset($this->property_document_url) && $this->property_document_url)?fileLink($this->property_document_url): '',
            "video_url" => $this->video_url ?? '',
            "location_url" => $this->location_url ?? '',
            'contact' => [
                'contact_id' => $this->hsc_contact->id ?? '',
                'is_post_vacant' => $this->hsc_contact->is_post_vacant ?? '',
                'name' => $this->hsc_contact->name ?? '',
                'phone_number' => $this->hsc_contact->mobile_number ?? '',
                'email_address' => $this->hsc_contact->email_id ?? '',
                'landline_number' => $this->hsc_contact->landline_number ?? '',
                'designation' => $this->hsc_contact->designation->name ?? '',
                'fax' => $this->hsc_contact->fax ?? '',
                'image_url' => '',
                'location_url' => '',
            ],
        ];
    }
}
