<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PHCResource extends JsonResource
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

        if(!empty($this->phc_contacts))
        {
            foreach($this->phc_contacts as $phc_contacts) {
                $other_contacts[] = [
                    'contact_id' => $phc_contacts->id ?? '',
                    'is_post_vacant' => $phc_contacts->is_post_vacant ?? '',
                    'name' => $phc_contacts->name ?? '',
                    'phone_number' => $phc_contacts->mobile_number ?? '',
                    'email_address' => $phc_contacts->email_id ?? '',
                    'landline_number' => $phc_contacts->landline_number ?? '',
                    'designation' => $phc_contacts->designation->name ?? '',
                    'fax' => $phc_contacts->fax ?? '',
                    'image_url' => '',
                    'location_url' => '',
                ];
            }
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'block_id' => $this->block_id,
            'image_url' => (isset($this->image_url) && $this->image_url)?fileLink($this->image_url): '',
            'land_document_url' => (isset($this->property_document_url) && $this->property_document_url)?fileLink($this->property_document_url): '',
            "video_url" => $this->video_url ?? '',
            "location_url" => $this->location_url ?? '',
            'facility_type' => $this->facility_type->name ?? '',
            'contact' => [
                'contact_id' => $this->phc_contact->id ?? '',
                'is_post_vacant' => $this->phc_contact->is_post_vacant ?? '',
                'name' => $this->phc_contact->name ?? '',
                'phone_number' => $this->phc_contact->mobile_number ?? '',
                'email_address' => $this->phc_contact->email_id ?? '',
                'landline_number' => $this->phc_contact->landline_number ?? '',
                'designation' => $this->phc_contact->designation->name ?? '',
                'fax' => $this->phc_contact->fax ?? '',
                'image_url' => '',
                'location_url' => '',
            ],
            'other_contacts' => $other_contacts,
        ];
    }
}
