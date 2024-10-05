<?php

namespace App\models;

use App\Models\Scheme;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class NewDocument extends Model
{
    // use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['document_url', 'document_type_id', 'name', 'section_id', 'user_id', 'status', 'visible_to_public', 'reference_no', 'dated', 'image_url', 'description', 'scheme_id', 'link','link_title', 'publication_type_id', 'notification_type_id', 'expiry_date', 'start_date', 'end_date', 'financial_year', 'language_id'];


    /**
     * @param $query
     * @return mixed
     */
    public function scopeFilter($query)
    {
        
        if ($keyword = request('keyword')) {
            $query->where('name', 'like', '%' . $keyword . '%');
            $query->orWhere('reference_no', 'like', '%' . $keyword . '%');
        }

        if ($document_type = request('document_type')) {
            $query->where('document_type_id', $document_type);
        }

        if ($section = request('section')) {
            $query->where('section_id', $section);
        }

        if ($from = request('from')) {
            $query->whereDate('dated', '>=', dateOf($from, 'Y-m-d'));
        }

        if ($to = request('to')) {
            $query->whereDate('dated', '<=', dateOf($to, 'Y-m-d'));
        }
        if ($visible_to_public = request('visible_to_public')) {
            $query->when($visible_to_public == 'yes', function ($sub) {
                $sub->where('visible_to_public', _active());
            });
            $query->when($visible_to_public == 'no', function ($sub) {
                $sub->where('visible_to_public', _inactive());
            });
        }
        if ($status = request('status')) {
            $query->when($status == 'Active', function ($sub) {
                $sub->where('status', _active());
            });
            $query->when($status == 'InActive', function ($sub) {
                $sub->where('status', _inactive());
            });
        }
        if (isHud()) {
            $query->where('status', _active())->where('visible_to_public', _active());
        }
      
        return $query;

    }

    /**
     * @param $id
     */
    public function getDocument($id)
    {

        $result = $this->with('document_type', 'employee', 'section')->find($id);
        return $result;
    }

    /**
     * @return mixed
     */
    public static function getQueriedResult()
    {

        $page_length = getPagelength();

        list($sortfield, $sorttype) = getSorting();
        $result = static::with(['document_type', 'employee', 'section'])->filter()->when(Auth::user()->user_type_id == _employeeUserTypeId(), function ($query) {
            $query->where('user_id', Auth::user()->id);
        });
        $sortfield = ($sortfield == 'name') ? 'name' : $sortfield;
        // dd($result);
        return $result->orderBy($sortfield, $sorttype)->get();
    }

    public static function getNavigationDocument($navigationId = '')
    {
        return static::with('navigation')->where('status', _active())
            ->where('visible_to_public', _active())
            ->when(request('section_id'), function ($query) {
                $query->where('section_id', request('section_id'));
            })
            ->when($navigationId, function ($query) use ($navigationId) {
                $query->where('document_type_id', $navigationId);
            })
            ->get();
    }
    /**
     * @return mixed
     */
    public function document_type()
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function scheme()
    {
        return $this->belongsTo(Scheme::class);
    }
}
