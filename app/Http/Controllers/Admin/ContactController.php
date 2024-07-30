<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Designation;
use App\Models\DesignationType;
use App\Models\HUD;
use App\Models\Block;
use App\Models\PHC;
use App\Models\HSC;
use Validator;
use App\Services\FileService;
use App\Http\Resources\Dropdown\BlockResource as DDBlockResource;
use App\Http\Resources\BlockResource;



class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isHud()) {
            $isUpdatePending = Contact::isHUdSelfUpdateCompleted(auth()->user()->id);
            if ($isUpdatePending) {
                warningResponse('Please update profile before continue further.');
                return redirect('profile/update');
            }
        }
        $contact_types = [];

        $huds = HUD::filter()->where('status', _active())->orderBy('name')->get();


        $blocks = [];
        if ($hud_id = request('hud_id')) {
            $blocks = Block::filter()->where('status', _active())->orderBy('name')->get();
        }

        $phcs = array();

        if ($block_id = request('block_id')) {
            $phcs = PHC::filter()->where('status', _active())->orderBy('name')->get();
        }

        $hscs = [];
        if ($phc_id = request('phc_id')) {
            $hscs = HSC::filter()->where('status', _active())->orderBy('name')->get();
        }


        $results = Contact::getQueriedResult();
        if (isAdmin()) {
            $contact_types = DesignationType::getDesignationTypeForContactCreateInAdmin();
        } elseif (isHud()) {
            $contact_types = DesignationType::getDesignationTypeForContactCreateInHUD();
        }

        return view('admin.contacts.list', compact('results', 'contact_types', 'huds', 'blocks', 'phcs', 'hscs'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = _getGlobalStatus();
        $is_post_vacants = _isPostVacant();
        $contact_types = $huds = $blocks = $phc = $hsc = $designation = [];
        $hud_id = auth()->user()->hud_id;

        if (isAdmin()) {
            $contact_types = DesignationType::getDesignationTypeForContactCreateInAdmin();
        } elseif (isHud()) {
            $contact_types = DesignationType::getDesignationTypeForContactCreateInHUD();
        }
        return view('admin.contacts.create', compact('designation', 'huds', 'blocks', 'phc', 'hsc', 'statuses', 'contact_types', 'is_post_vacants', 'hud_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), $this->rules(), $this->messages(), $this->attributes());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        }

        if (request('contact_type') == '10' && request('hsc_id')) {
            $isHscContactExist = Contact::isHscContactExist(request('hsc_id'));

            if ($isHscContactExist) {
                return redirect()->back()->withErrors(['error' => 'Already contact exists for this hsc.'])->withInput();
            }
        }


        $hud_id = $request->hud_id;
        if (isHud()) {
            $hud_id = auth()->user()->hud_id;
        }

        $input = [
            'name' => $request->name,
            'designation_id' => $request->designation_id,
            'email_id' => $request->email_id,
            'location_url' => $request->location_url,
            'mobile_number' => $request->mobile_number,
            'landline_number' => $request->landline_number,
            'fax' => $request->fax,
            'contact_type' => $request->contact_type,
            'hud_id'  => $hud_id,
            'block_id'  => $request->block_id,
            'phc_id'  => $request->phc_id,
            'hsc_id'  => $request->hsc_id,
            'is_post_vacant' => $request->is_post_vacant,
            'status' => $request->status
        ];

        if ($request->hasFile('contact_image') && $file = $request->file('contact_image')) {

            if ($file->isValid()) {
                $storedFileArray = FileService::storeFile($file);

                $input['image_url'] = $storedFileArray['stored_file_path'] ?? '';
            }
        }

        $result = Contact::create($input);

        createdResponse("Contact Created Successfully");

        return redirect()->route('contacts.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Contact::with(['contactType', 'designation', 'hud', 'phc', 'hsc'])->find($id);
        return view('admin.contacts.show', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Contact::with(['contactType'])->find($id);
        $statuses = _getGlobalStatus();
        $is_post_vacants = _isPostVacant();
        $blocks = $huds = $phc = $hsc = $designation = [];
        $hud_id = auth()->user()->hud_id;

        $huds = HUD::getHudData();
        $blocks = Block::getBlockData($result->hud_id);
        $phc = PHC::getPhcData($result->block_id);
        $hsc = HSC::getHscData($result->phc_id);


        $designation = Designation::getDesignationData($result->contact_type);
        return view('admin.contacts.edit', compact(
            'result',
            'designation',
            'huds',
            'blocks',
            'phc',
            'hsc',
            'statuses',
            'is_post_vacants',
            'hud_id'
        ));
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
        $validator = Validator::make($request->all(), $this->rules($id), $this->messages(), $this->attributes());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        }
        /*
        if(request('contact_type') == '10' && request('hsc_id')) {
        	$isHscContactExist = Contact::isHscContactExist(request('hsc_id'));
        	
		if ($isHscContactExist) {
			return redirect()->back()->withErrors(['error' => 'Already contact exists for this hsc.'])->withInput();
	    	}
        }*/

        $contact = Contact::find($id);

        $input = array();

        $input = [

            'name' => $request->name,
            'designation_id' => $request->designation_id,
            'email_id' => $request->email_id,
            'mobile_number' => $request->mobile_number,
            'landline_number' => $request->landline_number,
            'fax' => $request->fax,
            'hud_id'  => $request->hud_id,
            'block_id'  => $request->block_id,
            'phc_id'  => $request->phc_id,
            'hsc_id'  => $request->hsc_id,
            'is_post_vacant' => $request->is_post_vacant,
            'status' => $request->status
        ];

        if ($request->is_post_vacant == 'yes') {
            $input['name'] = NULL;
            $input['email_id'] = NULL;
            $input['mobile_number'] = NULL;
            $input['landline_number'] = NULL;
            $input['fax'] = NULL;
        }


        if ($request->hasFile('contact_image') && $file = $request->file('contact_image')) {
            if ($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file, '/', $contact->image_url);
                $input['image_url'] = $storedFileArray['stored_file_path'] ?? '';
            }
        }

        $result = $contact->update($input);

        if ($request->has('profile_update')) {
            updatedResponse("Profile Updated Successfully");
            return redirect('dashboard');
        }
        updatedResponse("Contact Updated Successfully");

        return redirect()->route('contacts.index');
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

    public function rules($id = "")
    {

        $rules = array();

        if ($id) {
            $rules['name'] = "required_if:is_post_vacant,==,no|nullable|min:2|max:99";
        } else {
            $rules['name'] = "required_if:is_post_vacant,==,no|nullable|min:2|max:99";
        }
        $rules['contact_type'] = 'required|exists:designation_types,id,status,' . _active();        
        $rules['designation_id'] = 'required|exists:designations,id|unique:contacts,designation_id,NULL,id,contact_type,' . request('contact_type') . ',hud_id,' . request('hud_id') . ',block_id,' . request('block_id') . ',phc_id,' . request('phc_id') . ',hsc_id,' . request('hsc_id');
        $rules['mobile_number'] = 'required_if:is_post_vacant,==,no|nullable|min:10';
        $rules['landline_number'] = 'sometimes|nullable|min:5';
        $rules['email_id'] = 'required_if:is_post_vacant,==,no|nullable|email';
        if ($contact_type = request('contact_type')) {

            if (in_array($contact_type, ['10'])) {
                $rules['email_id'] = 'sometimes|nullable|email';
            }
        }

        $rules['fax'] = 'sometimes|nullable';
        $rules['location_url'] = 'sometimes|nullable|url';
        $rules['contact_image'] = 'sometimes|mimes:png,jpg,jpeg|max:1024';

        $rules['hud_id'] = 'required_if:contact_type,==,4';
        $rules['block_id'] = 'required_if:contact_type,==,8';
        $rules['phc_id'] = 'required_if:contact_type,==,9';
        $rules['hsc_id'] = 'required_if:contact_type,==,10';

        $rules['is_post_vacant'] = 'required';
        $rules['status'] = 'required|boolean';

        return $rules;
    }

    public function messages()
    {
        return [
            'designation_id.unique' => 'Contact already exists under the selected designation, please update the details.',
        ];
    }

    public function attributes()
    {
        return [];
    }

    public function updateSelfContact()
    {
        $isProfileUpdate = True;
        $hud_id = auth()->user()->hud_id;
        $result = Contact::with(['contactType'])->where('hud_id', $hud_id)->where('contact_type', 4)->whereNull('block_id')->whereNotNull('user_id')->latest()->first();
        $statuses = _getGlobalStatus();
        $huds = $blocks = $phc = $hsc = $designation = [];

        if (isHud()) {
            $huds = HUD::getHudData();
            $blocks = Block::getBlockData($result->hud_id);
            $phc = PHC::getPhcData($result->block_id);
            $hsc = HSC::getHscData($result->phc_id);
        }

        $designation = Designation::getDesignationData($result->contact_type);
        return view('admin.contacts.edit', compact('result', 'huds', 'designation', 'blocks', 'phc', 'hsc', 'statuses', 'isProfileUpdate', 'hud_id'));
    }

    public function listBlockContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hud_id' => 'required|exists:huds,id,status,' . _active(),
        ]);

        if ($validator->fails()) {
            return sendError($validator->errors());
        }
        $blocks = Block::getBlockData($request->hud_id);
        return sendResponse(BlockResource::collection($blocks));
    }
}
