@extends('admin.layouts.layout')
@section('title', 'Create User')
@section('content')
<div class="page-wrapper">
   <div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Create User</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('users.index')}}">User</a></li>
                    <li class="breadcrumb-item active">Create User</li>
                </ol>
            </div>
        </div>
    </div>
      <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form action="{{route('users.store')}}" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}

                    <div class="row pt-3">
                        <div class="form-group col-sm-4 col-xs-4">
                            <label for="name" class="required">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value="{{old('name')}}">
                        </div>

                        <div class="form-group col-sm-4 col-xs-4">
                            <label for="username" class="required">UserName</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Enter UserName" value="{{old('username')}}">
                        </div>

                        <div class="form-group col-sm-4 col-xs-4">
                            <label for="email" class="">Email</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email" value="{{old('email')}}">
                        </div>
                        <div class="form-group col-sm-4 col-xs-4">
                            <label for="description" class="">Contact Number </label>
                            <input type="text" name="contact_number" class="form-control" id="contact_number" placeholder="Enter Contact Number" value="{{old('contact_number')}}">
                        </div>
                        <div class="form-group col-sm-4 col-xs-4">
                            <label for="section" class="required">Section</label>
                            <select name="section" id="section" class="form-control">
                                @foreach($sections as $key => $value)
                                <option value="{{$value->id}}" {{SELECT($value->id,old('section'))}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                         <div class="form-group col-sm-4 col-xs-4">
                            <label for="designation" class="required">Designation</label>
                            <input type="text" name="designation" class="form-control" id="designation" placeholder="Enter Designation" value="{{old('designation')}}">
                        </div>
                        <div class="form-group col-sm-4 col-xs-4">
                            <label for="status" class="required">Status </label>
                            <select name="status" id="status" class="form-control">
                                @foreach($statuses as $key => $value)
                                <option value="{{$value}}" {{SELECT($value,old('status'))}}>{{$key}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                        <hr>
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
          </div>
        </div>
   </div>
</div>
@endsection
