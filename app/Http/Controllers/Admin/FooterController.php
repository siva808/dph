<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Http\Resources\ConfigurationResource;
use App\Services\FileService;
use Illuminate\Support\Facades\Validator;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $result = Configuration::getLatestConfig();
        //$result = DB::table('configurations')->where('id', $id)->first();
        $statuses = _getGlobalStatus();
        return view('admin.configurations.footer',compact('result','statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateFooter(Request $request, $id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(),$this->rules($id),$this->messages(),$this->attributes());

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                        ->withInput();
        }

        $notification = Configuration::find($id); 

        
        $input = array();
        $input = [

                'dph_address' => $request->dph_address,
                'dph_zip_code' => $request->dph_zip_code,
                'dph_city' => $request->dph_city,
                'dph_state' => $request->dph_state,
                'dph_phone' => $request->dph_phone,
                'joint_director_email' => $request->joint_director_email,
                'joint_director_phone' => $request->joint_director_phone,
                'footer_logo_one_status' => $request->footer_logo_one_status ?? '0',
                'footer_gov_name_tamil' => $request->footer_gov_name_tamil,
            ];


       

        if($request->hasFile('footer_logo_one') && $file = $request->file('footer_logo_one')) {
            if($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file,'/footer_logo',$notification->footer_logo_one);
                $input['footer_logo_one'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['footer_logo_one'] = $notification->footer_logo_one;
        }

        
        // dd($input);
        $result = $notification->update($input);

        updatedResponse("Footer Updated Successfully!");

        return redirect('/footer');
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


        $rules['footer_logo_one'] = 'sometimes|mimes:png,jpg,jpeg|max:1024*5';
        $rules['footer_logo_one_title'] = 'sometimes|nullable|min:3|max:100';
        $rules['dph_address'] = 'sometimes|nullable|min:3|max:100';
        $rules['dph_zip_code'] = 'sometimes|nullable|min:3|max:100';
        $rules['dph_city'] = 'sometimes|nullable|min:3|max:100';
        $rules['dph_state'] = 'sometimes|nullable|min:3|max:100';
        $rules['dph_phone'] = 'sometimes|nullable|min:3|max:100';
        $rules['joint_director_email'] = 'sometimes|nullable|min:3|max:100';
        $rules['joint_director_phone'] = 'sometimes|nullable|min:3|max:100';
        $rules['footer_gov_name_tamil'] = 'sometimes|nullable|min:3|max:100';
        
        return $rules;
    }

     public function messages() {
        return [];
    }

    public function attributes() {
        return [];
    }

    public function getConfiguration(){

        $resource = Configuration::getConfigurationData();
        return sendResponse(ConfigurationResource::collection(collect($resource)));
    
   
    }
}
