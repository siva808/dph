<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HealthWalkLocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $contact = $this->contact_number ?? '';
        
        // Check if "+91" is not present in the string and prepend it
        if ($contact && strpos($contact, '+91') !== 0) {
            $contact = '+91-' . $contact;
        }

        return [
            'district_name' => $this->district_name ?? '--',
            'contact' => $contact ?? '--',
            'address' => $this->address ?? '--',
            'location_url' => $this->location_url ?? ''
        ];
    }
}
