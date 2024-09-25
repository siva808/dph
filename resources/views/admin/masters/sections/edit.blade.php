@extends('admin.layouts.layout')
@section('title', 'Edit Facility Type')
@section('content')
<div class="page-wrapper">
   <div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Edit Facility Type</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('facilitytypes.index')}}">Facility Type</a></li>
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
                    <form action="{{route('facilitytypes.update',$result->id)}}" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}
                        @method('PUT')

                        <div class="row pt-3">
                            <div class="form-group col-sm-4 col-xs-4">
                                <label for="name" class="required">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value="{{old('name',$result->name)}}">
                            </div>
                            
                             <div class="form-group col-sm-4 col-xs-4">
                                <label for="phc_id" class="required">PHC</label>
                                <select name="phc_id" id="section" class="form-control">
                                    <option value="" >-- Select PHC -- </option>
                                    @foreach($phc as $key => $value)
                                    <option value="{{$value->id}}" {{SELECT($value->id,old('phc_id',$result->phc_id))}}>{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                               <div class="form-group col-sm-4 col-xs-4">
                                 <label for="facilitytype_image" class="">Image </label>
                                <input type="file" name="facilitytype_image" class="form-control" id="facilitytype_image" placeholder="Image" value="{{old('image_url',$result->image_url)}}" />
                            </div>

                        <div class="form-group col-sm-4 col-xs-4">
                                  <label for="status" class="required">Status </label>
                                  <select name="status" id="status" class="form-control">
                                      @foreach($statuses as $key => $value)
                                      <option value="{{$value}}" {{SELECT($value,old('status',$result->status))}}>{{$key}}</option>
                                      @endforeach
                                  </select>
                              </div>
                               <div class="row pt-3 col-md-12">
                    <div class="form-group col-sm-4 col-xs-4">
                    <label for="image_url" class="required">facility Type Image </label>
                    @if($result->image_url)
                        <br>
                        <img src="{{fileLink($result->image_url)}}" height="100" width="100" />
                    @else
                        <br>
                        <span>No Image Uploaded.</span>
                    @endif

                    </div>
                
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                       <a type="reset" class="btn btn-inverse waves-effect waves-light" href="{{route('facilitytypes.index')}}"> Cancel </a>
                    </form>

                </div>
            </div>
        </div>
    </div>
  </div>
   </div>
</div>
</div>
@endsection
