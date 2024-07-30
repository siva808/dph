<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Exports\CustomersExport;
use Validator;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Tag;
use App\Models\HUD;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = User::getQueriedResult();

        return view('admin.employees.list',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = _getGlobalStatus();
        $sections = Tag::where('status',_active())->get();

        return view('admin.employees.create', compact('statuses','sections'));
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

        $password = config('constant.default_user_password');
        $input = [
                'name' => $request->name,
                'username' => prepareUsername($request->username),
                'contact_number' => $request->contact_number,
                'email' => $request->email,
                'section' => $request->section,
                'designation' => $request->designation,
                'country_code' => defaultCountryCode(),
                'user_type_id' => _employeeUserTypeId(),
                'status' => $request->status,
                'password' => Hash::make($password),
            ];


        $result = User::create($input);
        createdResponse("Customer Created Successfully");

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = User::with('tag')->find($id);
        return view('admin.employees.show',compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = User::with('tag')->find($id);
        $statuses = _getGlobalStatus();
        $sections = Tag::where('status',_active())->get();
        return view('admin.employees.edit',compact('result','statuses','sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),$this->rules($id),$this->messages(),$this->attributes());

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                        ->withInput();
        }

        $user = User::find($id);

        $input = array();
        $input = [
                'name' => $request->name,
                'username' => $request->username,
                'contact_number' => $request->contact_number ?? null,
                'email' => $request->email,
                'status' => $request->status,
                'section' => $request->section ?? '0',
                'designation' => $request->designation ?? null,
            ];

        $result = $user->update($input);

        updatedResponse("User Updated Successfully");

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function rules($id="") {

        $rules = array();

        if($id) {
            $rules['name'] = "required|min:2|max:99";
            $rules['username'] = "required|nullable|unique:users,username,{$id},id|max:99";
            $rules['email'] = "sometimes|nullable|email|unique:users,email,{$id},id|max:99";
            $rules['contact_number'] = "sometimes|nullable|min:8|max:15";
            $rules['section'] = "sometimes";
            $rules['designation'] = "sometimes";

        } else {
            $rules['name'] = "required|unique:users,name|min:2|max:99";
            $rules['username'] = "required|nullable|unique:users,username|max:99";
            $rules['email'] = "sometimes|nullable|email|unique:users,email|max:99";
            $rules['contact_number'] = "sometimes|nullable|min:8|max:15";
            $rules['section'] = "required";
            $rules['designation'] = "required|min:2|max:99";
        }

       
        return $rules;
    }

    public function messages() {
        return [];
    }

    public function attributes() {
        return [];
    }


    public function export(Request $request){
    	$filename = 'employees-list-'.date('d-m-Y').'.xlsx';
    	return Excel::download(new CustomersExport, $filename);
    	
    }
}
