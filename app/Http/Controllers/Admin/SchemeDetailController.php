<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Scheme;
use App\Models\SchemeDetail;
use Illuminate\Support\Str;
use App\Services\FileService;
use Illuminate\Support\Facades\Validator;

class SchemeDetailController extends Controller
{
    private $scheme_details_image_path = '/scheme_details/images';
    private $scheme_details_report_image_path = '/scheme_details/report_images';
    private $scheme_details_document_path = '/scheme_details/documents';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = SchemeDetail::getQueriedResult();
        // dd($results->toArray());
        $schemes = Scheme::getSchemeData();
        return view('admin.scheme-details.list', compact('results', 'schemes'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = _getGlobalStatus();
        $programs = Program::getProgramData();
        $schemes = Scheme::getSchemeData();
        return view('admin.scheme-details.create', compact('statuses', 'schemes', 'programs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->toArray());
        $validator = Validator::make($request->all(), $this->rules(), $this->messages(), $this->attributes());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        }

        $input = [
            'description' => $request->description,
            'schemes_id' => $request->scheme_id,
            'status' => $request->status ?? 0,
            'visible_to_public' => $request->visible_to_public ?? 0,
        ];



        if ($request->hasFile('images')) {
            $images = $request->file('images');

            if (isset($images[0]) && $images[0]->isValid()) {
                $storedFileArray = FileService::storeFile($images[0], $this->scheme_details_image_path);
                $input['image_one'] = $storedFileArray['stored_file_path'] ?? '';
            }

            if (isset($images[1]) && $images[1]->isValid()) {
                $storedFileArray = FileService::storeFile($images[1], $this->scheme_details_image_path);
                $input['image_two'] = $storedFileArray['stored_file_path'] ?? '';
            }
            if (isset($images[2]) && $images[2]->isValid()) {
                $storedFileArray = FileService::storeFile($images[2], $this->scheme_details_image_path);
                $input['image_three'] = $storedFileArray['stored_file_path'] ?? '';
            }
            if (isset($images[3]) && $images[3]->isValid()) {
                $storedFileArray = FileService::storeFile($images[3], $this->scheme_details_image_path);
                $input['image_four'] = $storedFileArray['stored_file_path'] ?? '';
            }
            if (isset($images[4]) && $images[4]->isValid()) {
                $storedFileArray = FileService::storeFile($images[4], $this->scheme_details_image_path);
                $input['image_five'] = $storedFileArray['stored_file_path'] ?? '';
            }
        }

        if ($request->hasFile('report_images')) {
            $reportImages = $request->file('report_images');

            if (isset($reportImages[0]) && $reportImages[0]->isValid()) {
                $storedFileArray = FileService::storeFile($reportImages[0], $this->scheme_details_report_image_path);
                $input['report_image_one'] = $storedFileArray['stored_file_path'] ?? '';
            }

            if (isset($reportImages[1]) && $reportImages[1]->isValid()) {
                $storedFileArray = FileService::storeFile($reportImages[1], $this->scheme_details_report_image_path);
                $input['report_image_two'] = $storedFileArray['stored_file_path'] ?? '';
            }

            if (isset($reportImages[2]) && $reportImages[2]->isValid()) {
                $storedFileArray = FileService::storeFile($reportImages[2], $this->scheme_details_report_image_path);
                $input['report_image_three'] = $storedFileArray['stored_file_path'] ?? '';
            }

            if (isset($reportImages[3]) && $reportImages[3]->isValid()) {
                $storedFileArray = FileService::storeFile($reportImages[3], $this->scheme_details_report_image_path);
                $input['report_image_four'] = $storedFileArray['stored_file_path'] ?? '';
            }

            if (isset($reportImages[4]) && $reportImages[4]->isValid()) {
                $storedFileArray = FileService::storeFile($reportImages[4], $this->scheme_details_report_image_path);
                $input['report_image_five'] = $storedFileArray['stored_file_path'] ?? '';
            }
        }


        if ($request->hasFile('document') && $file = $request->file('document')) {

            if ($file->isValid()) {
                $storedFileArray = FileService::storeFile($file, $this->scheme_details_document_path);

                $input['document_url'] = $storedFileArray['stored_file_path'] ?? '';
            }
        }

        $result = SchemeDetail::create($input);

        createdResponse("Scheme Details Created Successfully");

        return redirect()->route('schemedetails.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = SchemeDetail::findOrFail($id);
        return view('admin.scheme-details.show', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = SchemeDetail::findOrFail($id);
        // dd($result->toArray());
        $statuses = _getGlobalStatus();
        $programs = Program::getProgramData();
        $schemes = Scheme::getSchemeData();
        return view('admin.scheme-details.edit', compact('result', 'statuses', 'schemes', 'programs'));
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
        // dd($request->toArray());
        $validator = Validator::make($request->all(), $this->rules(), $this->messages(), $this->attributes());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        }

        $result = SchemeDetail::find($id);
        $input = array();
        $input = [
            'description' => $request->description,
            'schemes_id' => $request->scheme_id,
            'status' => $request->status ?? 0,
            'visible_to_public' => $request->visible_to_public ?? 0,
        ];
        // dd($input);


        if ($request->hasFile('images.0') && $file = $request->file('images.0')) {
            if ($file->isValid()) {
                $storedFile = FileService::updateAndStoreFile($request->file('images.0'), $this->scheme_details_image_path, $result->image_one);
                $input['image_one'] = $storedFile['stored_file_path'] ?? '';
            }
        }

        if ($request->hasFile('images.1') && $file = $request->file('images.1')) {
            if ($file->isValid()) {
                $storedFile = FileService::updateAndStoreFile($request->file('images.1'), $this->scheme_details_image_path, $result->image_two);
                $input['image_two'] = $storedFile['stored_file_path'] ?? '';
            }
        }

        if ($request->hasFile('images.2') && $file = $request->file('images.2')) {
            if ($file->isValid()) {
                $storedFile = FileService::updateAndStoreFile($request->file('images.2'), $this->scheme_details_image_path, $result->image_three);
                $input['image_three'] = $storedFile['stored_file_path'] ?? '';
            }
        }

        if ($request->hasFile('images.3') && $file = $request->file('images.3')) {
            if ($file->isValid()) {
                $storedFile = FileService::updateAndStoreFile($request->file('images.3'), $this->scheme_details_image_path, $result->image_four);
                $input['image_four'] = $storedFile['stored_file_path'] ?? '';
            }
        }

        if ($request->hasFile('images.4') && $file = $request->file('images.4')) {
            if ($file->isValid()) {
                $storedFile = FileService::updateAndStoreFile($request->file('images.4'), $this->scheme_details_image_path, $result->image_five);
                $input['image_five'] = $storedFile['stored_file_path'] ?? '';
            }
        }

        if ($request->hasFile('report_images.0') && $file = $request->file('images.0')) {
            if ($file->isValid()) {
            $storedFile = FileService::updateAndStoreFile($request->file('report_images.0'), $this->scheme_details_report_image_path, $result->report_image_one);
            $input['report_image_one'] = $storedFile['stored_file_path'] ?? '';
            }
        }
    
        if ($request->hasFile('report_images.1') && $file = $request->file('images.1')) {
            if ($file->isValid()) {
            $storedFile = FileService::updateAndStoreFile($request->file('report_images.1'), $this->scheme_details_report_image_path, $result->report_image_two);
            $input['report_image_two'] = $storedFile['stored_file_path'] ?? '';
            }
        }

        if ($request->hasFile('report_images.2') && $file = $request->file('images.2')) {
            if ($file->isValid()) {
            $storedFile = FileService::updateAndStoreFile($request->file('report_images.2'), $this->scheme_details_report_image_path, $result->report_image_three);
            $input['report_image_three'] = $storedFile['stored_file_path'] ?? '';
            }
        }

        if ($request->hasFile('report_images.3') && $file = $request->file('images.3')) {
            if ($file->isValid()) {
            $storedFile = FileService::updateAndStoreFile($request->file('report_images.3'), $this->scheme_details_report_image_path, $result->report_image_four);
            $input['report_image_four'] = $storedFile['stored_file_path'] ?? '';
            }
        }

        if ($request->hasFile('report_images.4') && $file = $request->file('images.4')) {
            if ($file->isValid()) {
            $storedFile = FileService::updateAndStoreFile($request->file('report_images.4'), $this->scheme_details_report_image_path, $result->report_image_five);
            $input['report_image_five'] = $storedFile['stored_file_path'] ?? '';
            }
        }

        if ($request->hasFile('document') && $file = $request->file('document')) {
            if ($file->isValid()) {
            $storedFile = FileService::updateAndStoreFile($request->file('document'), $this->scheme_details_document_path, $result->document_url);
            $input['document_url'] = $storedFile['stored_file_path'] ?? '';
            }
        }

        $result->update($input);

        createdResponse("Scheme Details Updated Successfully");

        return redirect()->route('schemedetails.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $schemeDetail = SchemeDetail::find($id);
    
        if (!$schemeDetail) {
            return response()->json(['message' => 'Scheme not found'], 404);
        }
        
        $imageField = $request->input('image_field');
        // return dd($schemeDetail->$imageField);
        if ($schemeDetail->$imageField) {
            $storedFile = FileService::deleteDiskFile($schemeDetail->$imageField, '/');
            
            $schemeDetail->$imageField = null; // Set the image field to null
            $schemeDetail->save(); // Save changes
        };
        createdResponse("Image Deleted Successfully");
    }

    public function rules($id = "")
    {

        $rules = array();

        $rules['images.*'] = 'sometimes|mimes:png,jpg,jpeg|max:4096';
        $rules['report_images.*'] = 'sometimes|mimes:png,jpg,jpeg|max:4096';
        $rules['documents'] = 'sometimes|mimes:pdf|max:5120';
        $rules['description'] = 'sometimes|nullable';
        $rules['scheme_id'] = 'required';
        $rules['status'] = 'sometimes|boolean';
        $rules['visible_to_public'] = 'sometimes|boolean';

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
}
