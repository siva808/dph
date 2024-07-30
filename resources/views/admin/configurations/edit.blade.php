@extends('admin.layouts.layout')

@section('title', 'Edit Configuration')

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Edit Configuration</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div>

         @if ($errors->any())
      <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
               
            </div>
        </div>
     </div>
      @endif
        <div class="row">

            <div class="col-md-12">

                <form action="{{ url('configurations/update/'.$result->id) }}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}

                    <!-- Card Section 1 -->
                    <div class="card">
                        <div class="card-header alert-info">
                            <h4 class="m-b-0 font-weight-normal">Scroller Notification Settings</h4>
                        </div>
                        <div class="card-body">                        
                                
                                <!-- Scroller Notification Content -->
                                <div class="form-group">
                                    <label for="notification_content">Scroller Notification Content</label>
                                    <textarea name="notification_content" class="form-control" id="notification_content" placeholder="Enter Notification Content" rows="5">{{ old('notification_content', $result->notification_content) }}</textarea>
                                </div>

                                <!-- Scroller Notification Status -->
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="notification_status" class="required">Scroller Notification Status</label>
                                        <select name="notification_status" id="notification_status" class="form-control">
                                            <option value="1" {{ old("notification_status", $result->notification_status) == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old("notification_status", $result->notification_status) == '0' ? 'selected' : '' }}>In-Active</option>
                                        </select>
                                    </div>
                                </div>

                            
                        </div>
                    </div>

                    <!-- Card Section 2 -->
                    <div class="card">
                        <div class="card-header alert-info">
                            <h4 class="m-b-0 font-weight-normal">Announcement Banner Settings</h4>
                        </div>
                        <div class="card-body">
                            <!-- Mini Banner relevant fields -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width:50%;">Title</th>
                                        <th style="width:40%;">Image Upload</th>
                                        <th style="width:10%;">Image</th>
                                        <th style="width:10%;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Announcement Banner 1 -->
                                    <tr>
                                        <td>
                                            <label for="mini_banner_one_title">Announcement Banner One Title</label>
                                            <input type="text" name="mini_banner_one_title" id="mini_banner_one_title" class="form-control" value="{{ old('mini_banner_one_title', $result->mini_banner_one_title) }}" placeholder="Enter Banner One Title">
                                        </td>
                                        <td>
                                            <label for="mini_banner_one">Announcement Banner One</label>
                                            <input type="file" name="mini_banner_one" id="mini_banner_one" class="form-control">
                                            <small class="form-control-feedback text-danger"> Accepted .jpg/.jpeg/.png format & allowed max size is 5MB </small>
                                        </td>
                                        <td>
                                            @if($result->mini_banner_one)
                                                <img src="{{ fileLink($result->mini_banner_one) }}" alt="Announcement Banner One" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                                            @else
                                                No Banner Available
                                            @endif
                                        </td>
                                        <td>
                                            <input type="checkbox"  name="mini_banner_one_status" id="mini_banner_one_status" value="1" {{CHECKBOX('mini_banner_one_status', $result->mini_banner_one_status)}} >
                                        </td>
                                    </tr>

                                    <!-- Announcement Banner 2 -->
                                    <tr>
                                        <td>
                                            <label for="mini_banner_two_title">Announcement Banner Two Title</label>
                                            <input type="text" name="mini_banner_two_title" id="mini_banner_two_title" class="form-control" value="{{ old('mini_banner_two_title', $result->mini_banner_two_title) }}" placeholder="Enter Banner Two Title">
                                        </td>
                                        <td>
                                            <label for="mini_banner_two">Announcement Banner Two</label>
                                            <input type="file" name="mini_banner_two" id="mini_banner_two" class="form-control">
                                            <small class="form-control-feedback text-danger"> Accepted .jpg/.jpeg/.png format & allowed max size is 5MB </small>
                                        </td>
                                        <td>
                                            @if($result->mini_banner_two)
                                                <img src="{{ fileLink($result->mini_banner_two) }}" alt="Announcement Banner Two" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                                            @else
                                                No Banner Available
                                            @endif
                                        </td>
                                        <td>
                                            <input type="checkbox"  name="mini_banner_two_status" id="mini_banner_two_status" value="1" {{CHECKBOX('mini_banner_two_status', $result->mini_banner_two_status)}} >
                                        </td>
                                    </tr>  
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <!-- Card Section 3 -->
                    <div class="card">
                        <div class="card-header alert-info">
                            <h4 class="m-b-0 font-weight-normal">Homepage Banner Settings</h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th style="width:50%;">Title</th>
                                        <th style="width:40%;">Image Upload</th>
                                        <th style="width:10%;">Image</th>
                                        <th style="width:10%;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label for="homepage_banner_one_title">Banner 1 Title</label>
                                                <input type="text" name="homepage_banner_one_title" id="homepage_banner_one_title" class="form-control" value="{{ old('homepage_banner_one_title', $result->homepage_banner_one_title) }}" placeholder="Enter Banner One Title">
                                            </td>
                                            <td>
                                                <label for="homepage_banner_one">Banner 1</label>
                                                <input type="file" name="homepage_banner_one" id="homepage_banner_one" class="form-control">
                                                <small class="form-control-feedback text-danger"> Accepted .jpg/.jpeg/.png format & allowed max size is 5MB </small>
                                            </td>
                                            <td>
                                                @if($result->homepage_banner_one)
                                                    <img src="{{ fileLink($result->homepage_banner_one) }}" alt="Banner One" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                                                @else
                                                    No Banner Available
                                                @endif
                                            </td>
                                            <td>
                                                <input type="checkbox"  name="homepage_banner_one_status" id="homepage_banner_one_status" value="1" {{CHECKBOX('homepage_banner_one_status', $result->homepage_banner_one_status)}} >
                                            </td>
                                        </tr>

                                        <!-- Repeat the structure for banners 2, 3, 4, and 5 -->
                                        <tr>
                                            <td>
                                                <label for="homepage_banner_two_title">Banner 2 Title</label>
                                                <input type="text" name="homepage_banner_two_title" id="homepage_banner_two_title" class="form-control" value="{{ old('homepage_banner_two_title', $result->homepage_banner_two_title) }}" placeholder="Enter Banner Two Title">
                                            </td>
                                            <td>
                                                <label for="homepage_banner_two">Banner 2</label>
                                                <input type="file" name="homepage_banner_two" id="homepage_banner_two" class="form-control">
                                                <small class="form-control-feedback text-danger"> Accepted .jpg/.jpeg/.png format & allowed max size is 5MB </small>
                                            </td>
                                            <td>
                                                @if($result->homepage_banner_two)
                                                    <img src="{{ fileLink($result->homepage_banner_two) }}" alt="Banner Two" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                                                @else
                                                    No Banner Available
                                                @endif
                                            </td>
                                            <td>
                                                <input type="checkbox"  name="homepage_banner_two_status" id="homepage_banner_two_status" value="1" {{CHECKBOX('homepage_banner_two_status', $result->homepage_banner_two_status)}} >
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label for="homepage_banner_three_title">Banner 3 Title</label>
                                                <input type="text" name="homepage_banner_three_title" id="homepage_banner_three_title" class="form-control" value="{{ old('homepage_banner_three_title', $result->homepage_banner_three_title) }}" placeholder="Enter Banner Three Title">
                                            </td>
                                            <td>
                                                <label for="homepage_banner_three">Banner 3</label>
                                                <input type="file" name="homepage_banner_three" id="homepage_banner_three" class="form-control">
                                                <small class="form-control-feedback text-danger"> Accepted .jpg/.jpeg/.png format & allowed max size is 5MB </small>
                                            </td>
                                            <td>
                                                @if($result->homepage_banner_three)
                                                    <img src="{{ fileLink($result->homepage_banner_three) }}" alt="Banner Three" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                                                @else
                                                    No Banner Available
                                                @endif
                                            </td>
                                            <td>
                                                <input type="checkbox"  name="homepage_banner_three_status" id="homepage_banner_three_status" value="1" {{CHECKBOX('homepage_banner_three_status', $result->homepage_banner_three_status)}} >
                                            </td>
                                        </tr>

                                        <!-- Banner 4 -->
                                        <tr>
                                            <td>
                                                <label for="homepage_banner_four_title">Banner 4 Title</label>
                                                <input type="text" name="homepage_banner_four_title" id="homepage_banner_four_title" class="form-control" value="{{ old('homepage_banner_four_title', $result->homepage_banner_four_title) }}" placeholder="Enter Banner Four Title">
                                            </td>
                                            <td>
                                                <label for="homepage_banner_four">Banner 4</label>
                                                <input type="file" name="homepage_banner_four" id="homepage_banner_four" class="form-control">
                                                <small class="form-control-feedback text-danger"> Accepted .jpg/.jpeg/.png format & allowed max size is 5MB </small>
                                            </td>
                                            <td>
                                                @if($result->homepage_banner_four)
                                                    <img src="{{ fileLink($result->homepage_banner_four) }}" alt="Banner Four" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                                                @else
                                                    No Banner Available
                                                @endif
                                            </td>
                                            <td>
                                                <input type="checkbox"  name="homepage_banner_four_status" id="homepage_banner_four_status" value="1" {{CHECKBOX('homepage_banner_four_status', $result->homepage_banner_four_status)}} >
                                            </td>
                                        </tr>

                                        <!-- Banner 5 -->
                                        <tr>
                                            <td>
                                                <label for="homepage_banner_five_title">Banner 5 Title</label>
                                                <input type="text" name="homepage_banner_five_title" id="homepage_banner_five_title" class="form-control" value="{{ old('homepage_banner_five_title', $result->homepage_banner_five_title) }}" placeholder="Enter Banner Five Title">
                                            </td>
                                            <td>
                                                <label for="homepage_banner_five">Banner 5</label>
                                                <input type="file" name="homepage_banner_five" id="homepage_banner_five" class="form-control">
                                                <small class="form-control-feedback text-danger"> Accepted .jpg/.jpeg/.png format & allowed max size is 5MB </small>
                                            </td>
                                            <td>
                                                @if($result->homepage_banner_five)
                                                    <img src="{{ fileLink($result->homepage_banner_five) }}" alt="Banner Five" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                                                @else
                                                    No Banner Available
                                                @endif
                                            </td>
                                            <td>
                                                <input type="checkbox"  name="homepage_banner_five_status" id="homepage_banner_five_status" value="1" {{CHECKBOX('homepage_banner_five_status', $result->homepage_banner_five_status)}} >
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>




                    <!-- Common Action Buttons -->
                    <div class="mt-3 float-right">
                        <button type="submit" class="btn btn-success waves-effect waves-light"><i class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>

        <br>
    </div>
</div>
@endsection
