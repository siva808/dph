<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\Models\NewDocument;
use Illuminate\Support\Facades\Auth;

class DocumentType extends Model
{

    protected $table = 'document_type';

    protected $fillable = ['name', 'order_no', 'slug_key', 'status'];


    public static function getDocumentType() {

        return static::with(['new_documents' => function($query){
            $query->when(Auth::user()->user_type_id == _employeeUserTypeId(), function ($subQuery) {
                $subQuery->where('uploaded_by', Auth::user()->id);
            })->where('status',_active());
        }])->where('status',_active())->orderBy('order_no')->get();

    }

    public function new_documents(){
        return $this->hasMany(NewDocument::class);
    }

}
