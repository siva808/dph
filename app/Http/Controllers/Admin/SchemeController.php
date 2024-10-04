<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Dropdown\SchemeResource;
use App\Models\Program;
use App\Models\Scheme;
use Illuminate\Support\Facades\Validator;

class SchemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Scheme::getQueriedResult();
        // dd($results->toArray());
        $programs = Program::getProgramData();
        return view('admin.masters.schemes.list', compact('results', 'programs'));
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
        return view('admin.masters.schemes.create', compact('statuses', 'programs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules(), $this->messages(), $this->attributes());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        }

        $input = [
            'name' => $request->name,
            'short_code' => $request->short_code,
            'programs_id' => $request->program_id,
            'status' => $request->status ?? 0,

        ];

        $result = Scheme::create($input);

        createdResponse("Scheme Created Successfully");

        return redirect()->route('schemes.index');
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
        $result = Scheme::with([])->find($id);
        $programs = Program::getProgramData();
        $statuses = _getGlobalStatus();

        return view('admin.masters.schemes.edit', compact('result', 'statuses', 'programs'));
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

        $scheme = Scheme::find($id);

        $input = array();
        $input = [
                'name' => $request->name,
                'short_code' => $request->short_code,
                'programs_id' =>$request->program_id,
                'status' => $request->status ?? 0
            ];

        $result = $scheme->update($input);

        updatedResponse("Scheme Updated Successfully");

        return redirect()->route('schemes.index');
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

        $rules['name'] = 'required';
        $rules['program_id'] = 'required';
        $rules['short_code'] = 'required|nullable';
        // $rules['status'] = 'required|boolean';

        return $rules;
    }

    public function messages() {
        return [];
    }

    public function attributes() {
        return [];
    }

    public function listScheme(Request $request) {
        $validator = Validator::make($request->all(),[
            'program_id' => 'required|exists:programs,id,status,'._active(),
        ]);

        if($validator->fails()) {
            return sendError($validator->errors());
        }
        $scheme = Scheme::getSchemeData($request->program_id);
        return sendResponse(SchemeResource::collection($scheme));
    }
}
