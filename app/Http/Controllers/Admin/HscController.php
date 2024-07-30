<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HSC;
use App\Models\HUD;
use App\Models\PHC;
use App\Models\Block;
use Validator;
use App\Services\FileService;
use App\Http\Resources\Dropdown\HSCResource as DDHSCResource;


class HscController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = HSC::getQueriedResult();
        $phcs = array();

        $huds = HUD::with(['blocks:id,name,hud_id'])->filter()->where('status', _active())->orderBy('name')->get();
        if($block_id = request('block_id')) {
            $phcs = PHC::filter()->where('status', _active())->orderBy('name')->get();
        }

        return view('admin.masters.hsc.list',compact('results', 'huds','phcs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
    {
        $statuses = _getGlobalStatus();
        $phc = [];
        $huds = HUD::getHudData();
        $blocks = Block::getBlockData();
        $is_urban = _isUrban();
        return view('admin.masters.hsc.create',compact('phc','statuses', 'huds', 'blocks', 'is_urban'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {
        $validator = Validator::make($request->all(),$this->rules(),$this->messages(),$this->attributes());

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                        ->withInput();
        }

        $input = [
                'name' => $request->name,
                'phc_id' => $request->phc_id,
                'location_url' => $request->location_url, 
                'video_url' => $request->video_url,  
                'is_urban' => $request->is_urban,          
                'status' => $request->status

            ];

          

             if($request->hasFile('hsc_image') && $file = $request->file('hsc_image')) {

            if($file->isValid()) {
                $storedFileArray = FileService::storeFile($file);

                $input['image_url'] = $storedFileArray['stored_file_path'] ?? '';
            }
        }

        if($request->hasFile('property_document') && $file = $request->file('property_document')) {

            if($file->isValid()) {
                $storedFileArray = FileService::storeFile($file);

                $input['property_document_url'] = $storedFileArray['stored_file_path'] ?? '';
            }
        }

        $result = HSC::create($input);

        createdResponse("HSC Created Successfully");

        return redirect()->route('hsc.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        $result = HSC::with([])->find($id);
        return view('admin.masters.hsc.show',compact('result'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
        $result = HSC::with(['phc'])->find($id);
        $statuses = _getGlobalStatus();
        $phc = PHC::getPhcData($result->phc->block_id);
        $huds = HUD::getHudData();
        $blocks = Block::getBlockData();
        $is_urban = _isUrban();
        return view('admin.masters.hsc.edit',compact('result','phc','statuses', 'huds', 'blocks', 'is_urban'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),$this->rules($id),$this->messages(),$this->attributes());

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                        ->withInput();
        }

        $hsc = HSC::find($id);

        $input = array();
        $input = [
                'name' => $request->name,
                'phc_id' => $request->phc_id,
                'location_url' => $request->location_url, 
                'video_url' => $request->video_url, 
                'is_urban' => $request->is_urban,           
                'status' => $request->status
            ];

           

         if($request->hasFile('hsc_image') && $file = $request->file('hsc_image')) {
            if($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file,'/',$hsc->image_url);
                $input['image_url'] = $storedFileArray['stored_file_path'] ?? '';
            }
        }

        if($request->hasFile('property_document') && $file = $request->file('property_document')) {
            if($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file,'/',$hsc->property_document_url);
                $input['property_document_url'] = $storedFileArray['stored_file_path'] ?? '';
            }
        }

        $result = $hsc->update($input);

        updatedResponse("HSC Updated Successfully");

        return redirect()->route('hsc.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
        //
    }

    public function destroyDocument($id)
    {        
        $hsc = HSC::find($id);

        if ($hsc->property_document_url) {
            $hsc->update(['property_document_url' => null]);
        }

        return redirect()->back()->with('success', 'Land Document deleted successfully.');
    }

    public function rules($id="") {

        $rules = array();

        if($id) {
            $rules['name'] = "required|unique:hsc,name,{$id},id,phc_id,{request('phc_id')}|min:2|max:99";
        } else {
            $rules['name'] = "required|unique:hsc,name,null,id,phc_id,{request('phc_id')}|min:2|max:99";
        }

        $rules['phc_id'] = 'required';
        $rules['hsc_image'] = 'sometimes|mimes:png,jpg,jpeg|max:4096';
        $rules['location_url'] = 'sometimes|nullable|url';
        $rules['video_url'] = 'sometimes|nullable|url';
        $rules['status'] = 'required|boolean';
        $rules['is_urban'] = 'required';
        $rules['property_document'] = 'sometimes|mimes:pdf|max:8192';

        return $rules;
    }

    public function messages() {
        return [];
    }

    public function attributes() {
        return [];
    }

    public function listHSC(Request $request) {
        $validator = Validator::make($request->all(),[
            'phc_id' => 'required|exists:p_h_c_s,id,status,'._active(),
        ]);

        if($validator->fails()) {
            return sendError($validator->errors());
        }
        $hscs = HSC::getHscData($request->phc_id);
        return sendResponse(DDHSCResource::collection($hscs));
    }
}
