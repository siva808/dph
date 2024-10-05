<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;
use App\Models\DocumentType;
use App\Services\FileService;
use App\Models\Tag;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DocumentsExport;
use App\models\Master;
use App\models\NewDocument;
use App\Models\Program;
use App\Models\Scheme;
use App\Models\Section;

class NewDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $results = NewDocument::getQueriedResult();

        // dd($results);
        $sections = Section::where('status', _active())->get();
        $document_types = DocumentType::where('status', _active())->get();
        $statuses = _getGlobalStatus();

        return view('admin.documents.list', compact('results', 'sections', 'document_types', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = _getGlobalStatus();
        $languages = Master::getLanguagesData();
        $document_types = DocumentType::where('status', _active())->orderBy('order_no')->get();
        $programs = Program::where('status', _active())->orderBy('name')->pluck('name', 'id');
        $sections = Section::where('status', _active())->orderBy('name')->pluck('name', 'id');
        $schemes = Scheme::where('status', _active())->orderBy('name')->pluck('name', 'id');


        return view('admin.documents.create', compact('statuses', 'document_types', 'sections', 'programs', 'schemes', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), $this->rules(), $this->messages(), $this->attributes());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        }

        $input = [
            'document_type_id' => $request->document_type_id,
            'name' => $request->name,
            'scheme_id' => $request->scheme_id,
            'status' => $request->status ?? 0,
            'reference_no' => $request->reference_no,
            'description' => $request->description,
            'link' => $request->link,
            'link_title' => $request->link_title,
            'visible_to_public' => $request->visible_to_public ?? 0,
            'dated' => dateOf($request->dated, 'Y-m-d h:i:s'),
            'user_id' => Auth::user()->id,
            'language_id' => $request->language,
        ];

        if ($request->hasFile('document') && $file = $request->file('document')) {

            if ($file->isValid()) {
                $storedFileArray = FileService::storeFile($file);

                $input['document_url'] = $storedFileArray['stored_file_path'] ?? '';
            }
        }

        if ($request->hasFile('document_image') && $file = $request->file('document_image')) {

            if ($file->isValid()) {
                $storedFileArray = FileService::storeFile($file);

                $input['image_url'] = $storedFileArray['stored_file_path'] ?? '';
            }
        }


        $result = NewDocument::create($input);

        createdResponse("Document Uploaded Successfully");

        return redirect()->route('new-documents.index',['document_type' => $request->document_type_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = new NewDocument();
        $result = $document->getDocument($id);
        return view('admin.documents.show', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = NewDocument::with('document_type')->find($id);
        //dd($result->toArray());
        $statuses = _getGlobalStatus();
        $programs = Program::where('status', _active())->orderBy('name')->pluck('name', 'id');
        $languages = Master::getLanguagesData();
        $documents_type = DocumentType::where('status', _active())->orderBy('order_no')->get();
        $schemes = Scheme::where('status', _active())->orderBy('name')->pluck('name', 'id');
        return view('admin.documents.edit', compact('result', 'statuses', 'documents_type', 'schemes', 'programs', 'languages'));
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

        $document = NewDocument::find($id);
        $input = array();
        $input = [
            'document_type_id' => $request->document_type_id,
            'name' => $request->name,
            'scheme_id' => $request->scheme_id,
            'status' => $request->status ?? 0,
            'reference_no' => $request->reference_no,
            'description' => $request->description,
            'link' => $request->link,
            'link_title' => $request->link_title,
            'visible_to_public' => $request->visible_to_public ?? 0,
            'dated' => dateOf($request->dated, 'Y-m-d h:i:s'),
            'user_id' => Auth::user()->id,
            'language_id' => $request->language,
        ];

        if ($request->hasFile('document') && $file = $request->file('document')) {

            if ($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file, '/', $document->image_url);

                $input['document_url'] = $storedFileArray['stored_file_path'] ?? '';
            }
        }

        if($request->hasFile('image') && $file = $request->file('image')) {
            if($file->isValid()) {
                $storedFileArray = FileService::updateAndStoreFile($file,'/',$document->image_url);
                $input['image_url'] = $storedFileArray['stored_file_path'] ?? '';
            }
        }

        $result = $document->update($input);

        updatedResponse("Document Updated Successfully");

        return redirect()->route('new-documents.index',['document_type' => $request->document_type_id]);
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
        if (!$id) {
            $rules['document'] = "required_if:document_type_id,1,2,3,5,6,7,8,11|mimes:pdf|max:5120";
            $rules['document_type_id'] = "required";

            if (request('document_type_id') == '13') {
                $rules['document'] = "sometimes|mimes:pdf|max:15360";
            }
        }


        $rules['name'] = "sometimes|nullable|min:2|max:300";
        $rules['image'] = 'required_if:document_type_id,12|mimes:png,jpg,jpeg|max:2048';
        $rules['scheme_id'] = "required_if:document_type_id,1,2,3,5,6,7,11";
        $rules['status'] = "sometimes";
        $rules['reference_no'] = "required_if:document_type_id,1,2,3,5,6,7,11";
        $rules['visible_to_public'] = "sometimes";
        $rules['dated'] = "required_if:document_type_id,1,2,3,5,6,7,11";
        $rules['description'] = 'sometimes|nullable';
        $rules['link_title'] = 'sometimes|nullable';

        return $rules;
    }

    public function messages()
    {
        return ['navigation_id' => 'Type of Document'];
    }

    public function attributes()
    {
        return [];
    }
}
