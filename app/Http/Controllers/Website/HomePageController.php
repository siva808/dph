<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Navigation;
use App\Models\Tag;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\District;
use App\Models\HUD;
use App\Models\Block;
use App\Models\PHC;
use App\Models\HSC;
use App\Models\Contact;

use App\Http\Resources\WebsiteDocumentResource;
use App\Http\Resources\HUDResource;
use App\Http\Resources\BlockResource;
use App\Http\Resources\PHCResource;
use App\Http\Resources\HSCResource;
use App\Http\Resources\ContactResource;

class HomePageController extends Controller
{

    protected $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function utilities(Request $request) {

        $navigations = Navigation::where('status',_active())->select('id','name')->get();
        $sections = Tag::where('status',_active())->select('id','name')->get();
        return sendResponse(['navigations' => $navigations, 'sections' => $sections]);

    }

    public function getNavFile(Request $request){
        $validator = Validator::make($request->all(),[
            'navigation_id' => 'sometimes|exists:navigations,id,status,'._active(),
            'section_id' => 'sometimes|exists:tags,id,status,'._active(),
        ]);

        if($validator->fails()) {
            return sendError($validator->errors());
        }

        $documents = Document::getNavigationDocument($request->navigation_id);
        return sendResponse(WebsiteDocumentResource::collection($documents));
    }

    public function getDistricts(Request $request) {
        $districts = District::getDistrictData();
        return sendResponse($districts);
    }

    public function getHuds(Request $request) {
        $validator = Validator::make($request->all(),[
            'district_id' => 'sometimes|exists:districts,id,status,'._active(),
        ]);

        if($validator->fails()) {
            return sendError($validator->errors());
        }

        $huds = HUD::getHudData($request->district_id);
        return sendResponse(HUDResource::collection($huds));
    }

    public function getBlocks(Request $request) {
        $validator = Validator::make($request->all(),[
            'hud_id' => 'sometimes|exists:huds,id,status,'._active(),
        ]);

        if($validator->fails()) {
            return sendError($validator->errors());
        }

        $blocks = Block::getBlockData($request->hud_id);
        return sendResponse(BlockResource::collection($blocks));
    }

    public function getPHC(Request $request) {
        $validator = Validator::make($request->all(),[
            'block_id' => 'sometimes|exists:blocks,id,status,'._active(),
        ]);

        if($validator->fails()) {
            return sendError($validator->errors());
        }

        $phc = PHC::getPhcData($request->block_id);
        return sendResponse(PHCResource::collection($phc));
    }

    public function getHSC(Request $request) {
        $validator = Validator::make($request->all(),[
            'phc_id' => 'sometimes|exists:p_h_c_s,id,status,'._active(),
        ]);

        if($validator->fails()) {
            return sendError($validator->errors());
        }

        $hsc = HSC::getHscData($request->phc_id);
        return sendResponse(HSCResource::collection($hsc));
    }

     public function getContacts(Request $request) {
        $contacts = Contact::getContactData();
        return sendResponse(ContactResource::collection($contacts));
    }


}
