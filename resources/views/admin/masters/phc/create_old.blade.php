@extends('admin.layouts.layout')
@section('title', 'Create Phc')
@section('content')
<div class="page-wrapper">
   <div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Create Phc</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('phc.index')}}">PHC</a></li>
                    <li class="breadcrumb-item active">Create Phc</li>
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
                    <form action="{{route('phc.store')}}" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}

                    <div class="row pt-3">

                        <div class="form-group col-sm-4 col-xs-4" id="is_post_vacant_div">
                            <label for="is_urban" class="required">Is Urban </label>
                            <select name="is_urban" id="is_urban" class="form-control">
                                @foreach($is_urban as $key => $value)
                                <option value="{{$key}}" data-value="{{$key}}" {{SELECT($value,old('is_urban'))}}>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4 col-xs-4">
                            <label for="name" class="required">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value="{{old('name')}}">
                        </div>

                     
                        <div class="form-group col-sm-4 col-xs-4">
                         <label for="block_id" class="required">Block</label>
                            <select name="block_id" id="block_id" class="form-control">
                                  <option value="" >-- Select Block -- </option>
                                  @foreach($huds as $hud)
                                  <optgroup label="{{$hud->name}}">
                                    @foreach($hud->blocks as $block)
                                    <option value="{{$block->id}}" {{SELECT($block->id,request('block_id'))}}>{{$block->name}}</option>
                                    @endforeach
                                  </optgroup>
                                  @endforeach
                            </select>
                       
                     </div>
                        
                          <div class="form-group col-sm-4 col-xs-4">
                            <label for="phc" class="">Select Image</label>
                            <input type="file" name="phc_image" class="form-control" id="phc_image accept="image/png,image/jpg,image/jpeg">
                            <small class="form-control-feedback text-danger"> Accepted only .png/.jpg/.jpeg format & allowed max size is 1MB </small>
                        </div>

                          <div class="form-group col-sm-4 col-xs-4">
                            <label for="video_url" class="">Video URL</label>
                            <input type="text" name="video_url" class="form-control" id="video_url" placeholder="Enter Video URL" value="{{old('video_url')}}">
                        </div>

                          <div class="form-group col-sm-4 col-xs-4">
                            <label for="location_url" class="">Map Location URL</label>
                            <input type="text" name="location_url" class="form-control" id="location_url" placeholder="Enter Location" value="{{old('location_url')}}">
                        </div>
                        <div class="form-group col-sm-4 col-xs-4">
                            <label for="hud" class="">Select Land Document</label>
                            <input type="file" name="property_document" class="form-control" id="property_document" accept=".pdf">
                            <small class="form-control-feedback text-danger"> Accepted only .pdf format & allowed max size is 5mb </small>
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
                        <a type="reset" class="btn btn-inverse waves-effect waves-light" href="{{route('phc.index')}}"> Cancel </a>
                    </form>
                </div>
            </div>
        </div>
          </div>
        </div>
   </div>
</div>
@endsection