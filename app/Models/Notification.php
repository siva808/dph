<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
  

    // Define the table name if it doesn't follow Laravel's conventions
    protected $table = 'notifications';

    // Define the fillable properties
    protected $fillable = [
        'title',
        'scroller_icon',
        'scroller_notification',
        'scroller_link',
        'guideline_document',
        'description',
        'contact_description',
        'email',
    ];

    // If you want to define relationships, do it here
    // e.g., public function user() { return $this->belongsTo(User::class); }
}
