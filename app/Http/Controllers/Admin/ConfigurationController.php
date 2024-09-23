<?php

namespace App\Http\Controllers\Admin;

use App\Models\ConfigurationDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Http\Resources\ConfigurationResource;
use App\Services\FileService;
use Illuminate\Support\Facades\Validator;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $statuses = _getGlobalStatus();
        return view('admin.configurations.edit',compact('statuses'));
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*
        $statuses = _getGlobalStatus();
        return view('admin.configurations.create',compact('statuses'));
        */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $validator = Validator::make($request->all(),$this->rules(),$this->messages(),$this->attributes());

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                        ->withInput();
        }

        $input = [
                'notification_content' => $request->notification_content,
                'status' => $request->status
            ];



        $result = Configuration::create($input);

        createdResponse("Notification Created Successfully");

        return redirect()->route('configurations.index');
        */
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
        return view('admin.configurations.edit', compact('result', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateConfiguration(Request $request, $id)
    {
        $validator = Validator::make($request->all(), $this->rules($id), $this->messages(), $this->attributes());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        }

        $notification = Configuration::find($id);


        $input = array();
        $input = [
            'notification_content' => $request->notification_content,
            'notification_status' => $request->notification_status,
            'mini_banner_one_title' => $request->mini_banner_one_title,
            'mini_banner_two_title' => $request->mini_banner_two_title,
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
            'dph_address' => $request->dph_address,
            'dph_zip_code' => $request->dph_zip_code,
            'dph_city' => $request->dph_city,
            'dph_state' => $request->dph_state,
            'dph_phone' => $request->dph_phone,
            'joint_director_email' => $request->joint_director_email,
            'joint_director_phone' => $request->joint_director_phone,
        ];

        if ($request->hasFile('mini_banner_one') && $file = $request->file('mini_banner_one')) {
            if ($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file, '/', $notification->mini_banner_one);
                $input['mini_banner_one'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['mini_banner_one'] = $notification->mini_banner_one;
        }

        if ($request->hasFile('mini_banner_two') && $file = $request->file('mini_banner_two')) {
            if ($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file, '/', $notification->mini_banner_two);
                $input['mini_banner_two'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['mini_banner_two'] = $notification->mini_banner_two;
        }


        if ($request->hasFile('homepage_banner_one') && $file = $request->file('homepage_banner_one')) {
            if ($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file, '/homepage_banner', $notification->homepage_banner_one);
                $input['homepage_banner_one'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['homepage_banner_one'] = $notification->homepage_banner_one;
        }

        if ($request->hasFile('homepage_banner_two') && $file = $request->file('homepage_banner_two')) {
            if ($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file, '/homepage_banner', $notification->homepage_banner_two);
                $input['homepage_banner_two'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['homepage_banner_two'] = $notification->homepage_banner_two;
        }

        if ($request->hasFile('homepage_banner_three') && $file = $request->file('homepage_banner_three')) {
            if ($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file, '/homepage_banner', $notification->homepage_banner_three);
                $input['homepage_banner_three'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['homepage_banner_three'] = $notification->homepage_banner_three;
        }

        if ($request->hasFile('homepage_banner_four') && $file = $request->file('homepage_banner_four')) {
            if ($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file, '/homepage_banner', $notification->homepage_banner_four);
                $input['homepage_banner_four'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['homepage_banner_four'] = $notification->homepage_banner_four;
        }

        if ($request->hasFile('homepage_banner_five') && $file = $request->file('homepage_banner_five')) {
            if ($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file, '/homepage_banner', $notification->homepage_banner_five);
                $input['homepage_banner_five'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['homepage_banner_five'] = $notification->homepage_banner_five;
        }

        if ($request->hasFile('header_logo_one') && $file = $request->file('header_logo_one')) {
            if ($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file, '/header_logo', $notification->header_logo_one);
                $input['header_logo_one'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['header_logo_one'] = $notification->header_logo_one;
        }

        if ($request->hasFile('header_logo_two') && $file = $request->file('header_logo_two')) {
            if ($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file, '/header_logo', $notification->header_logo_one);
                $input['header_logo_two'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['header_logo_two'] = $notification->header_logo_one;
        }

        if ($request->hasFile('header_logo_three') && $file = $request->file('header_logo_three')) {
            if ($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file, '/header_logo', $notification->header_logo_one);
                $input['header_logo_three'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['header_logo_three'] = $notification->header_logo_one;
        }

        if ($request->hasFile('header_logo_four') && $file = $request->file('header_logo_four')) {
            if ($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file, '/header_logo', $notification->header_logo_one);
                $input['header_logo_four'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['header_logo_four'] = $notification->header_logo_one;
        }

        if ($request->hasFile('header_logo_five') && $file = $request->file('header_logo_five')) {
            if ($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file, '/header_logo', $notification->header_logo_one);
                $input['header_logo_five'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['header_logo_five'] = $notification->header_logo_one;
        }

        if ($request->hasFile('header_logo_six') && $file = $request->file('header_logo_six')) {
            if ($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file, '/header_logo', $notification->header_logo_one);
                $input['header_logo_six'] = $storedFileArray['stored_file_path'] ?? '';
            }
        } else {
            $input['header_logo_six'] = $notification->header_logo_one;
        }

        $result = $notification->update($input);

        updatedResponse("Notification Updated Successfully");

        return redirect('/configurations');

        //return redirect()->back()->with('success', 'Notification updated successfully.');

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

    public function messages()
    {
        return [];
    }

    public function attributes()
    {
        return [];
    }

    public function getConfiguration()
    {

        $resources = Configuration::getConfigurationData();

        $configDetails = ConfigurationDetails::all();

        if ($resources->isEmpty()) {
            return sendResponse([], 'Configuration not found', 404);
        }

        // Organize data into a single structure
        $response = [
            'header' => [
                'tamil_government_title' => $resources[2]->tamilnadu_government_title_tamil,
                'english_government_title' => $resources[2]->tamilnadu_government_title_english,
                'dph_full_form_tamil' => $resources[2]->dph_full_form_tamil,
                'dph_full_form_english' => $resources[2]->dph_full_form_english,
                'logos' => $configDetails->filter(function ($item) {
                    return $item->configuration_content_type_id === 1 && $item->status === 1;
                })->values(),
                'banners' => $configDetails->filter(function ($item) {
                    return $item->configuration_content_type_id === 2 && $item->status === 1;
                })->values(),
            ],
            'address' => [
                'address' => $resources[3]->dph_address,
                'zip_code' => $resources[3]->dph_zip_code,
                'city' => $resources[3]->dph_city,
                'state' => $resources[3]->dph_state,
                'phone' => $resources[3]->dph_phone,
                'email' => $resources[3]->dph_email,
                'dph_tamil_name' => $resources[3]->dph_full_form_tamil,
            ],
            'joint_director' => [
                'email' => $resources[4]->joint_director_email,
                'phone' => $resources[4]->joint_director_phone,
                'designation' => $resources[4]->joint_director_designation,

            ],
            'footer' => [
                'logos' => $configDetails->filter(function ($item) {
                    return $item->configuration_content_type_id === 4 && $item->status === 1;
                })->values(),
                'social_media' => $configDetails->filter(function ($item) {
                    return $item->configuration_content_type_id === 5 && $item->status === 1;
                })->values(),
                'impo_links' => $configDetails->filter(function ($item) {
                    return $item->configuration_content_type_id === 6 && $item->status === 1;
                })->values(),
                'quick_links' => $configDetails->filter(function ($item) {
                    return $item->configuration_content_type_id === 7 && $item->status === 1;
                })->values(),
                'publics' => $configDetails->filter(function ($item) {
                    return $item->configuration_content_type_id === 8 && $item->status === 1;
                })->values(),
                'resources' => $configDetails->filter(function ($item) {
                    return $item->configuration_content_type_id === 9 && $item->status === 1;
                })->values(),
                'contacts' => $configDetails->filter(function ($item) {
                    return $item->configuration_content_type_id === 10 && $item->status === 1;
                })->values(),
            ],

            'partners' => $configDetails->filter(function ($item) {
                return $item->configuration_content_type_id === 3 && $item->status === 1;
            })->values(), // Partner logos
        ];

        return sendResponse($response);
    }
}
