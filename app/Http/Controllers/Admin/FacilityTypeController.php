<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FacilityType;
use App\Models\PHC;
use Validator;
use App\Services\FileService;


class FacilityTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = FacilityType::getQueriedResult();

        return view('admin.masters.facilitytypes.list',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
    {
        $statuses = _getGlobalStatus();
        $phc = PHC::getPhcData();
        return view('admin.masters.facilitytypes.create',compact('phc','statuses'));
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
                'status' => $request->status
            ];

             if($request->hasFile('facilitytype_image') && $file = $request->file('facilitytype_image')) {

            if($file->isValid()) {
                $storedFileArray = FileService::storeFile($file);

                $input['image_url'] = $storedFileArray['stored_file_path'] ?? '';
            }
        }

        $result = FacilityType::create($input);

        createdResponse("Facility Type Created Successfully");

        return redirect()->route('facilitytypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        $result = FacilityType::with([])->find($id);
        return view('admin.masters.facilitytypes.show',compact('result'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
        $result = FacilityType::with([])->find($id);
        $statuses = _getGlobalStatus();
        $phc = PHC::getPhcData();
        return view('admin.masters.facilitytypes.edit',compact('result','phc','statuses'));
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

        $facilitytype = FacilityType::find($id);

        $input = array();
        $input = [
                'name' => $request->name,
                'phc_id' => $request->phc_id,             
                'status' => $request->status
            ];
         if($request->hasFile('facilitytype_image') && $file = $request->file('facilitytype_image')) {
            if($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file,'/',$facilitytype->image_url);
                $input['image_url'] = $storedFileArray['stored_file_path'] ?? '';
            }
        }

        $result = $facilitytype->update($input);

        updatedResponse("Facility Type Updated Successfully");

        return redirect()->route('facilitytypes.index');
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

    public function rules($id="") {

        $rules = array();

        if($id) {
            $rules['name'] = "required|unique:facility_types,name,{$id},id|min:2|max:99";
        } else {
            $rules['name'] = "required|unique:facility_types,name|min:2|max:99";
        }

        $rules['phc_id'] = 'required';
        $rules['facilitytype_image'] = 'sometimes|mimes:png,jpg,jpeg|max:2048';
        $rules['status'] = 'required|boolean';

        return $rules;
    }

    public function messages() {
        return [];
    }

    public function attributes() {
        return [];
    }
}

