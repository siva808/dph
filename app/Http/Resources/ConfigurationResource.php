<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConfigurationResource extends JsonResource
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
            'header' => [
                'tamil_government_title' => $this->tamil_government_title,
                'english_government_title' => $this->english_government_title,
                'dph_full_form_tamil' => $this->dph_full_form_tamil,
                'dph_full_form_english' => $this->dph_full_form_english,
                'logos' => ConfigurationDetailsResource::collection($this->logos),
                'banners' => ConfigurationDetailsResource::collection($this->banners),
            ],
            'address' => [
                'address' => $this->dph_address,
                'zip_code' => $this->dph_zip_code,
                'city' => $this->dph_city,
                'state' => $this->dph_state,
                'phone' => $this->dph_phone,
                'email' => $this->dph_email,
                'dph_tamil_name' => $this->dph_tamil_name,
            ],
            'joint_director' => [
                'email' => $this->joint_director_email,
                'phone' => $this->joint_director_phone,
                'designation' => $this->joint_director_designation,
            ],
            'footer' => [
                'logos' => ConfigurationDetailsResource::collection($this->footer_logos),
                'social_media' => ConfigurationDetailsResource::collection($this->social_media),
                'impo_links' => ConfigurationDetailsResource::collection($this->impo_links),
                'quick_links' => ConfigurationDetailsResource::collection($this->quick_links),
                'publics' => ConfigurationDetailsResource::collection($this->publics),
                'resources' => ConfigurationDetailsResource::collection($this->resources),
                'contacts' => ConfigurationDetailsResource::collection($this->contacts),
            ],
            'partners' => ConfigurationDetailsResource::collection($this->partners),
            'scroller_notif' => ConfigurationDetailsResource::collection($this->scroller_notif),
        ];
    }
}