<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
	 protected $table = 'testimonials';
	 protected $fillable = [
        'name',
        'designation',
        'content',
        'image_url',
        'testimonial_document_url',
        'unique_key',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s',
    ];

// Motters To Use Created To data Only
    public function getCreatedAtAttribute($date)
    {
        return convertUTCToLocal($date);
    }

    public function getUpdatedAtAttribute($date)
    {
        return convertUTCToLocal($date);
    }
     public function scopeFilter($query) {

         if($keyword = request('keyword')) {
             $query->where('name','like','%'.$keyword.'%');
            }

            
         return $query;
     }

     public static function getQueriedResult() {

        $page_length = getPagelength();

        list($sortfield,$sorttype) = getSorting();

        $result = static::with([])->filter();

        $sortfield = ($sortfield == 'name')?'name':$sortfield;
        
        

        return $result->orderBy($sortfield,$sorttype)->paginate($page_length);
    }

     public static function getTestimonialData() {

        $testimonial = static::where('status',_active());    

        return $testimonial->orderBy('id','asc')->get();
    }
}
