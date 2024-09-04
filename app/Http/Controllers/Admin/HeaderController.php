<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Http\Resources\ConfigurationResource;
use App\Services\FileService;
use Illuminate\Support\Facades\Validator;

class HeaderController extends Controller
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
        return view('admin.configurations.header',compact('result','statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateHeader(Request $request, $id)
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
                'notification_content' => $request->notification_content,
                'notification_status' => $request->notification_status,
                'mini_banner_one_title' => $request->mini_banner_one_title,
                ' ' => $request->mini_banner_two_title,
                'homepage_banner_one_title' => $request->homepage_banner_one_title,
                'homepage_banner_two_title' => $request->homepage_banner_two_title,
                'homepage_banner_three_title' => $request->homepage_banner_three_title,
                'homepage_banner_four_title' => $request->homepage_banner_four_title,
                'homepage_banner_five_title' => $request->homepage_banner_five_title,
                'homepage_banner_one_status' => $request->homepage_banner_one_status ?? '0',
                'homepage_banner_two_status' => $request->homepage_banner_two_status ?? '0',
                'homepage_banner_three_status' => $request->homepage_banner_three_status ?? '0',
                'homepage_banner_four_status' => $request->homepage_banner_four_status ?? '0',
                'homepage_banner_five_status' => $request->homepage_banner_five_status ?? '0',
                'mini_banner_one_status' => $request->mini_banner_one_status ?? '0',
                'mini_banner_two_status' => $request->mini_banner_two_status ?? '0',
                'header_logo_one_title' => $request->header_logo_one_title,
                'header_logo_two_title' => $request->header_logo_two_title,
                'header_logo_three_title' => $request->header_logo_three_title,
                'header_logo_four_title' => $request->header_logo_four_title,
                'header_logo_five_title' => $request->header_logo_five_title,
                'header_logo_six_title' => $request->header_logo_six_title,
                'header_logo_one_status' => $request->header_logo_one_status ?? '0',
                'header_logo_two_status' => $request->header_logo_two_status ?? '0',
                'header_logo_three_status' => $request->header_logo_three_status ?? '0',
                'header_logo_four_status' => $request->header_logo_four_status ?? '0',
                'header_logo_five_status' => $request->header_logo_five_status ?? '0',
                'header_logo_six_status' => $request->header_logo_six_status ?? '0',
                'tamilnadu_government_title_tamil' => $request->tamilnadu_government_title_tamil,
                'tamilnadu_government_title_english' => $request->tamilnadu_government_title_english,
                'dph_full_form_tamil' => $request->dph_full_form_tamil,
                'dph_full_form_english' => $request->dph_full_form_english,
            ];

        if($request->hasFile('mini_banner_one') && $file = $request->file('mini_banner_one')) {
            if($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file,'/',$notification->mini_banner_one);
                $input['mini_banner_one'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['mini_banner_one'] = $notification->mini_banner_one;
        }

        if($request->hasFile('mini_banner_two') && $file = $request->file('mini_banner_two')) {
            if($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file,'/',$notification->mini_banner_two);
                $input['mini_banner_two'] = $storedFileArray['stored_file_path'] ?? '';
            }
        }else {
            $input['mini_banner_two'] = $notification->mini_banner_two;
        }


        if($request->hasFile('homepage_banner_one') && $file = $request->file('homepage_banner_one')) {
            if($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file,'/homepage_banner',$notification->homepage_banner_one);
                $input['homepage_banner_one'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['homepage_banner_one'] = $notification->homepage_banner_one;
        }

        if($request->hasFile('homepage_banner_two') && $file = $request->file('homepage_banner_two')) {
            if($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file,'/homepage_banner',$notification->homepage_banner_two);
                $input['homepage_banner_two'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['homepage_banner_two'] = $notification->homepage_banner_two;
        }

        if($request->hasFile('homepage_banner_three') && $file = $request->file('homepage_banner_three')) {
            if($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file,'/homepage_banner',$notification->homepage_banner_three);
                $input['homepage_banner_three'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['homepage_banner_three'] = $notification->homepage_banner_three;
        }

        if($request->hasFile('homepage_banner_four') && $file = $request->file('homepage_banner_four')) {
            if($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file,'/homepage_banner',$notification->homepage_banner_four);
                $input['homepage_banner_four'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['homepage_banner_four'] = $notification->homepage_banner_four;
        }

        if($request->hasFile('homepage_banner_five') && $file = $request->file('homepage_banner_five')) {
            if($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file,'/homepage_banner',$notification->homepage_banner_five);
                $input['homepage_banner_five'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['homepage_banner_five'] = $notification->homepage_banner_five;
        }

        if($request->hasFile('header_logo_one') && $file = $request->file('header_logo_one')) {
            if($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file,'/header_logo',$notification->header_logo_one);
                $input['header_logo_one'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['header_logo_one'] = $notification->header_logo_one;
        }

        if($request->hasFile('header_logo_two') && $file = $request->file('header_logo_two')) {
            if($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file,'/header_logo',$notification->header_logo_two);
                $input['header_logo_two'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['header_logo_two'] = $notification->header_logo_two;
        }

        if($request->hasFile('header_logo_three') && $file = $request->file('header_logo_three')) {
            if($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file,'/header_logo',$notification->header_logo_three);
                $input['header_logo_three'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['header_logo_three'] = $notification->header_logo_three;
        }

        if($request->hasFile('header_logo_four') && $file = $request->file('header_logo_four')) {
            if($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file,'/header_logo',$notification->header_logo_four);
                $input['header_logo_four'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['header_logo_four'] = $notification->header_logo_four;
        }

        if($request->hasFile('header_logo_five') && $file = $request->file('header_logo_five')) {
            if($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file,'/header_logo',$notification->header_logo_five);
                $input['header_logo_five'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['header_logo_five'] = $notification->header_logo_five;
        }

        if($request->hasFile('header_logo_six') && $file = $request->file('header_logo_six')) {
            if($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file,'/header_logo',$notification->header_logo_six);
                $input['header_logo_six'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['header_logo_six'] = $notification->header_logo_six;
        }
         
        $result = $notification->update($input);

        updatedResponse("Header Updated Successfully");

        return redirect('/header');
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

        $rules['notification_content'] = 'sometimes|nullable';        
        $rules['notification_status'] = 'required|boolean';
        $rules['mini_banner_one_title'] = 'sometimes|nullable|min:3|max:100';
        $rules['mini_banner_two_title'] = 'sometimes|nullable|min:3|max:100';
        $rules['notification_content'] = 'sometimes|nullable';
        $rules['mini_banner_one'] = 'sometimes|mimes:png,jpg,jpeg|max:1024*5';
        $rules['mini_banner_two'] = 'sometimes|mimes:png,jpg,jpeg|max:1024*5';

        $rules['homepage_banner_one_title'] = 'sometimes|nullable|min:3|max:100';
        $rules['homepage_banner_two_title'] = 'sometimes|nullable|min:3|max:100';
        $rules['homepage_banner_three_title'] = 'sometimes|nullable|min:3|max:100';
        $rules['homepage_banner_four_title'] = 'sometimes|nullable|min:3|max:100';
        $rules['homepage_banner_five_title'] = 'sometimes|nullable|min:3|max:100';
        $rules['homepage_banner_one'] = 'sometimes|mimes:png,jpg,jpeg|max:1024*5';
        $rules['homepage_banner_two'] = 'sometimes|mimes:png,jpg,jpeg|max:1024*5';
        $rules['homepage_banner_three'] = 'sometimes|mimes:png,jpg,jpeg|max:1024*5';
        $rules['homepage_banner_four'] = 'sometimes|mimes:png,jpg,jpeg|max:1024*5';
        $rules['homepage_banner_five'] = 'sometimes|mimes:png,jpg,jpeg|max:1024*5';
        $rules['header_logo_one'] = 'sometimes|mimes:png,jpg,jpeg|max:1024*5';
        $rules['header_logo_two'] = 'sometimes|mimes:png,jpg,jpeg|max:1024*5';
        $rules['header_logo_three'] = 'sometimes|mimes:png,jpg,jpeg|max:1024*5';
        $rules['header_logo_four'] = 'sometimes|mimes:png,jpg,jpeg|max:1024*5';
        $rules['header_logo_five'] = 'sometimes|mimes:png,jpg,jpeg|max:1024*5';
        $rules['header_logo_six'] = 'sometimes|mimes:png,jpg,jpeg|max:1024*5';
        $rules['header_logo_one_title'] = 'sometimes|nullable|min:3|max:100';
        $rules['header_logo_two_title'] = 'sometimes|nullable|min:3|max:100';
        $rules['header_logo_three_title'] = 'sometimes|nullable|min:3|max:100';
        $rules['header_logo_four_title'] = 'sometimes|nullable|min:3|max:100';
        $rules['header_logo_five_title'] = 'sometimes|nullable|min:3|max:100';
        $rules['header_logo_six_title'] = 'sometimes|nullable|min:3|max:100';
        
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
