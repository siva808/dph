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
        $document_types = DocumentType::where('status', _active())->orderBy('order_no')->get();
        $programs = Program::where('status', _active())->orderBy('name')->pluck('name', 'id');
        $sections = Section::where('status', _active())->orderBy('name')->pluck('name', 'id');
        $schemes = Scheme::where('status', _active())->orderBy('name')->pluck('name', 'id');


        return view('admin.documents.create', compact('statuses', 'document_types', 'sections', 'programs', 'schemes'));
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

        return redirect()->route('documents.index');
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
    public function edit($id)
    {
        //
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
        //
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
}
