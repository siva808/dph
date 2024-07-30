<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WebsiteDocumentResource extends JsonResource
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
            'document_id' => $this->id,
            'navigation_id' => $this->navigation_id,
            'navigation' => $this->navigation->name ?? '',
            'section_id' => $this->tag_id ?? '',
            'section' => $this->tag->name ?? '',
            'document_name' => $this->display_filename,
            'document_url' => fileLink($this->document_url),
            'visible_to_public' => ($this->visible_to_public == _active()),
            'reference_no' => $this->reference_no,
            'dated' => $this->dated,
            'image_url' => (isset($this->image_url) && $this->image_url)?fileLink($this->image_url): '',
            'link_title' => ($this->link_url)?$this->link_title : '',
            'link_url' => $this->link_url ?? '',
        ];
        // return parent::toArray($request);
    }
}

