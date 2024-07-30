<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Navigation;
use App\Models\Tag;
use App\Models\Contact;


class DashboardController extends Controller
{
    public function dashboard(){    

        $documentCount = $totalEmployeeCount = $activeEmployeeCount = $inActiveEmployeeCount = $totalContactCount = $activeContactCount = $inActiveContactCount = 0;

        $navigationDocs = $sectionDocs = collect();

        $documentCount = Document::when(isEmployee(), function ($query) {
            $query->where('uploaded_by', Auth::user()->id);
        })->where('status',_active())->count();

        if(isAdmin() || isHud()) {
            $navigationDocs = Navigation::getNavigationDocument();   
            $sectionDocs = Tag::getTagDocument();         
        }


        if(isEmployee()) {

        } elseif(isHud()) {
            $contacts = Contact::where('hud_id',auth()->user()->hud_id)->whereNull('user_id')->select('id','status')->get();
            $totalContactCount = $contacts->count();
            $activeContactCount = $contacts->where('status',_active())->count();
            $inActiveContactCount = $contacts->where('status',_inactive())->count();
        } else {
            $users = User::whereIn('user_type_id',[_employeeUserTypeId(),_hudUserTypeId()])->select('id','status')->get();
            $totalEmployeeCount = $users->count();
            $activeEmployeeCount = $users->where('status',_active())->count();
            $inActiveEmployeeCount = $users->where('status',_inactive())->count();
        }


    	return view('admin.dashboard',compact('totalEmployeeCount','activeEmployeeCount','inActiveEmployeeCount','documentCount','navigationDocs','sectionDocs','totalContactCount','activeContactCount','inActiveContactCount'));
    }
}
