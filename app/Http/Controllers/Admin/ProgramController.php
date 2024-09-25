<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Support\Facades\Validator;


class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Program::getQueriedResult();

        return view('admin.masters.programs.list',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = _getGlobalStatus();
        return view('admin.masters.programs.create',compact('statuses'));
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
                'short_code' => $request->short_code,
                'status' => $request->status ?? 0,
                
            ];

        $result = Program::create($input);

        createdResponse("Program Created Successfully");

        return redirect()->route('programs.index');
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
        $result = Program::with([])->find($id);
        $statuses = _getGlobalStatus();
        
        return view('admin.masters.programs.edit',compact('result','statuses'));
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

        $program = Program::find($id);

        $input = array();
        $input = [
                'name' => $request->name,
                'short_code' => $request->short_code,
                'status' => $request->status ?? 0
            ];

        $result = $program->update($input);

        updatedResponse("Program Updated Successfully");

        return redirect()->route('programs.index');
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
            $rules['name'] = "required|unique:districts,name,{$id},id|min:2|max:99";
        } else {
            $rules['name'] = "required|unique:districts,name|min:2|max:99";
        }

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
}
