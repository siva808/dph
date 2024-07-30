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
            'config' => 'default',
            "notification_content" => $this->notification_content,
            "notification_status" => $this->notification_status,
            'banner1' => (isset($this->mini_banner_one) && $this->mini_banner_one)?fileLink($this->mini_banner_one): '',
            'banner2' => (isset($this->mini_banner_two) && $this->mini_banner_two)?fileLink($this->mini_banner_two): '',
            'banner1_title' => $this->mini_banner_one_title ?? '',           
            'banner2_title' => $this->mini_banner_two_title ?? '',           

            'homepage_banner1_title' => $this->homepage_banner_one_title ?? '',           
            'homepage_banner2_title' => $this->homepage_banner_two_title ?? '', 
            'homepage_banner3_title' => $this->homepage_banner_three_title ?? '',           
            'homepage_banner4_title' => $this->homepage_banner_four_title ?? '', 
            'homepage_banner5_title' => $this->homepage_banner_five_title ?? '',           
            
            'homepage_banner1' => (isset($this->homepage_banner_one) && $this->homepage_banner_one)?fileLink($this->homepage_banner_one): '',
            'homepage_banner2' => (isset($this->homepage_banner_two) && $this->homepage_banner_two)?fileLink($this->homepage_banner_two): '',
            'homepage_banner3' => (isset($this->homepage_banner_three) && $this->homepage_banner_three)?fileLink($this->homepage_banner_three): '',
            'homepage_banner4' => (isset($this->homepage_banner_four) && $this->homepage_banner_four)?fileLink($this->homepage_banner_four): '',
            'homepage_banner5' => (isset($this->homepage_banner_five) && $this->homepage_banner_five)?fileLink($this->homepage_banner_five): '',

            'homepage_banner_one_status' => $this->homepage_banner_one_status,           
            'homepage_banner_two_status' => $this->homepage_banner_two_status, 
            'homepage_banner_three_status' => $this->homepage_banner_three_status,           
            'homepage_banner_four_status' => $this->homepage_banner_four_status, 
            'homepage_banner_five_status' => $this->homepage_banner_five_status,
            'mini_banner_one_status' => $this->mini_banner_one_status, 
            'mini_banner_two_status' => $this->mini_banner_two_status,
        ];
    }
}