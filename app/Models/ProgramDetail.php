<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramDetail extends Model
{
    protected $table = 'programdetail';
    protected $fillable = [
        'description',
        'document',
        'image_one',
        'image_two',
        'image_three',
        'image_four',
        'image_five',
        'programs_id',
        'status',
        'visible_to_public'
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

    public function scopeFilter($query)
    {

        if ($keyword = request('keyword')) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }
        return $query;
    }

    public static function getQueriedResult()
    {

        $page_length = getPagelength();

        list($sortfield, $sorttype) = getSorting();

        $result = static::with([])->filter();

        $sortfield = ($sortfield == 'name') ? 'name' : $sortfield;


        return $result->orderBy($sortfield, $sorttype)->get();
        // return $result->orderBy($sortfield,$sorttype)->paginate($page_length);

    }


    public static function getProgramdetailsData()
    {
        return static::where('status', _active())->orderBy('id', 'asc')->get();
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'programs_id')->select('id', 'name');
    }
}