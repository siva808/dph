@extends('admin.layouts.layout')
@section('title', 'Health Walk')
@section('content')
<style type="text/css">
.small-input {
    width: 150px; /* Adjust the width as needed */
}

.medium-input {
    width: 300px; /* Adjust the width as needed */
}

.large-input {
    width: 600px; /* Adjust the width as needed */
}
</style>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Health Walk</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Health Walk</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Table Html -->
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive m-t-40">
                            <form id="bulkSubmitForm" method="POST" action="{{ url('hw-location-submit') }}">
                                @csrf
                                <div id="myTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>District</th>
                                                        <th>8km Health Walk Area
(Start/End Point)</th>
                                                        <th>Contact</th>
                                                        <th>Location of the venue - Google Map Link</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(!empty($locationData) && $locationData->count())
                                                    @foreach($locationData as $result)
                                                    <tr>
                                                        <td>{{$result->district_name ?? ''}}</td>
                                                        <td>
                                                            <input type="text" name="address[{{$result->district_id}}]" id="address_{{$result->district_id}}" class="form-control large-input" value="{{$result->address}}"/>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="contact_number[{{$result->district_id}}]" id="contact_number_{{$result->district_id}}" class="form-control small-input" value="{{$result->contact_number}}"/>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="location_url[{{$result->district_id}}]" id="location_url_{{$result->district_id}}" class="form-control medium-input" value="{{$result->location_url}}"/>
                                                        </td>          
                                                    </tr>
                                                    @endforeach
                                                    @else
                                                    <tr>
                                                        <td collspan="6">No Records Found..</td>
                                                    </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit All</button>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Table Html -->
            </div>
        </div>
    </div>
</div>
</html>
@endsection
