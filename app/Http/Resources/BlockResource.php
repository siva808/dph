<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $other_contacts = [];

        if(!empty($this->block_contacts))
        {
            foreach($this->block_contacts as $block_contacts) {
                $other_contacts[] = [
                    'contact_id' => $block_contacts->id ?? '',
                    'is_post_vacant' => $block_contacts->is_post_vacant ?? '',
                    'name' => $block_contacts->name ?? '',
                    'phone_number' => $block_contacts->mobile_number ?? '',
                    'email_address' => $block_contacts->email_id ?? '',
                    'landline_number' => $block_contacts->landline_number ?? '',
                    'designation' => $block_contacts->designation->name ?? '',
                    'fax' => $block_contacts->fax ?? '',
                    'image_url' => '',
                    'location_url' => '',
                ];
            }
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'hud_id' => $this->hud_id,
            'image_url' => (isset($this->image_url) && $this->image_url)?fileLink($this->image_url): '',
            'land_document_url' => (isset($this->property_document_url) && $this->property_document_url)?fileLink($this->property_document_url): '',
            "video_url" => $this->video_url ?? '',
            "location_url" => $this->location_url ?? '',
            'contact' => [
                'contact_id' => $this->block_contact->id ?? '',
                'is_post_vacant' => $this->block_contact->is_post_vacant ?? '',
                'name' => $this->block_contact->name ?? '',
                'phone_number' => $this->block_contact->mobile_number ?? '',
                'email_address' => $this->block_contact->email_id ?? '',
                'landline_number' => $this->block_contact->landline_number ?? '',
                'designation' => $this->block_contact->designation->name ?? '',
                'fax' => $this->block_contact->fax ?? '',
                'image_url' => '',
                'location_url' => '',
            ],
            'other_contacts' => $other_contacts,
        ];
    }
}
