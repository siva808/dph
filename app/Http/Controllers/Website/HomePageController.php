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
use App\Models\Program;
use App\Models\ProgramDetail;
use App\Models\ProgramOfficer;
use App\Models\Scheme;
use App\Models\SchemeDetail;

class HomePageController extends Controller
{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function utilities(Request $request)
    {

        $navigations = Navigation::where('status', _active())->select('id', 'name')->get();
        $sections = Tag::where('status', _active())->select('id', 'name')->get();
        return sendResponse(['navigations' => $navigations, 'sections' => $sections]);
    }

    public function getNavFile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'navigation_id' => 'sometimes|exists:navigations,id,status,' . _active(),
            'section_id' => 'sometimes|exists:tags,id,status,' . _active(),
        ]);

        if ($validator->fails()) {
            return sendError($validator->errors());
        }

        $documents = Document::getNavigationDocument($request->navigation_id);
        return sendResponse(WebsiteDocumentResource::collection($documents));
    }

    public function getDistricts(Request $request)
    {
        $districts = District::getDistrictData();
        return sendResponse($districts);
    }

    public function getHuds(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'district_id' => 'sometimes|exists:districts,id,status,' . _active(),
        ]);

        if ($validator->fails()) {
            return sendError($validator->errors());
        }

        $huds = HUD::getHudData($request->district_id);
        return sendResponse(HUDResource::collection($huds));
    }

    public function getBlocks(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hud_id' => 'sometimes|exists:huds,id,status,' . _active(),
        ]);

        if ($validator->fails()) {
            return sendError($validator->errors());
        }

        $blocks = Block::getBlockData($request->hud_id);
        return sendResponse(BlockResource::collection($blocks));
    }

    public function getPHC(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'block_id' => 'sometimes|exists:blocks,id,status,' . _active(),
        ]);

        if ($validator->fails()) {
            return sendError($validator->errors());
        }

        $phc = PHC::getPhcData($request->block_id);
        return sendResponse(PHCResource::collection($phc));
    }

    public function getHSC(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phc_id' => 'sometimes|exists:p_h_c_s,id,status,' . _active(),
        ]);

        if ($validator->fails()) {
            return sendError($validator->errors());
        }

        $hsc = HSC::getHscData($request->phc_id);
        return sendResponse(HSCResource::collection($hsc));
    }

    public function getContacts(Request $request)
    {
        $contacts = Contact::getContactData();
        return sendResponse(ContactResource::collection($contacts));
    }

    public function getPrograms(Request $request)
    {
        // Fetch all programs
        $programs = Program::all();

        // Prepare tabKeys
        $tabKeys = $programs->pluck('name')->toArray();

        // Prepare tabData
        $tabData = [];
        foreach ($programs as $program) {
            // Fetch program detail associated with the program
            $programDetail = ProgramDetail::where('programs_id', $program->id)->first();

            // Fetch the first program officer for this program (assuming there is one primary officer)
            $programOfficer = ProgramOfficer::where('programs_id', $program->id)->first();

            // Populate tabData for each program
            $tabData[$program->name] = [
                'name' => $programOfficer->name ?? '',
                'iconUrl' => 'assets/Icons_image/' . strtolower(str_replace(' ', '_', $program->name)) . '.png', // Modify path accordingly
                'iconUrl' => 'assets/Icons_image/admin.png', // Modify path accordingly
                'imageUrl' => $programOfficer->image ?? '',
                'designation' => $programOfficer->designation->name ?? '',
                'description' => $programDetail->description ?? '',
            ];
        }
        $baseUrl = 'https://test.tndphpm.com/admin/tndphpmfiles/';
        // Prepare sliderImages
        $sliderImages = [];
        foreach ($programs as $program) {
            $programDetail = ProgramDetail::where('programs_id', $program->id)->first();

            if ($programDetail) {
                $sliderImages[$program->name] = array_filter([
                    $programDetail->image_one ? $baseUrl . $programDetail->image_one : null,
                    $programDetail->image_two ? $baseUrl . $programDetail->image_two : null,
                    $programDetail->image_three ? $baseUrl . $programDetail->image_three : null,
                    $programDetail->image_four ? $baseUrl . $programDetail->image_four : null,
                    $programDetail->image_five ? $baseUrl . $programDetail->image_five : null,
                ]);
            } else {
                $sliderImages[$program->name] = [];
            }
        }
        // Prepare submenuItems (schemes)
        $submenuItems = [];
        foreach ($programs as $program) {
            $schemes = Scheme::where('programs_id', $program->id)->get();

            $submenuItems[$program->name] = [];
            foreach ($schemes as $scheme) {
                $schemeDetail = SchemeDetail::where('schemes_id', $scheme->id)->first();
                $submenuItems[$program->name][] = [
                    'title' => $scheme->name,
                    // 'iconUrl' => 'assets/Icons_image/' . strtolower(str_replace(' ', '_', $scheme->name)) . '.png', // Adjust path
                    'iconUrl' => 'assets/Icons_image/admin.png', // Adjust path

                    'imageUrl' => $schemeDetail && $schemeDetail->image_one ? $baseUrl . $schemeDetail->image_one : '',
                    'description' => $schemeDetail->description ?? '',
                ];
            }
        }

        // Combine all the data into the desired format
        $responseData = [
            'tabKeys' => $tabKeys,
            'tabData' => $tabData,
            'sliderImages' => $sliderImages,
            'submenuItems' => $submenuItems,
        ];

        return response()->json($responseData);
    }
}
