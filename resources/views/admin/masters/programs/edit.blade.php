@extends('admin.layouts.layout')
@section('title', 'Edit Programs')
@section('content')
    <div class="container" style="margin-top: 90px;">
        <div class="container-fluid p-2" style="background-color: #f2f2f2;">
            <div class="d-flex justify-content-between align-items-center" style="padding-left: 20px; padding-right: 20px;">
                <h5 class="mb-0">Program Divisions</h5>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0" style="background-color: #f2f2f2;">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Program Divisions</li>
                    </ol>
                </nav>

            </div>
        </div>
        <div class="container-fluid">
            <div class="page-inner">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="container-fluid mt-2">
                    <div class="row">
                        <div class="col-lg-12 p-5" style="background-color: #ffffff; border-radius: 10px;">
                            <!-- insert the contents Here start -->

                            <div class="card-body">
                                <!-- Heading -->
                                <h4 class="card-title mb-4 text-primary">Edit Program Divisions Details</h4>

                                <form action="{{ route('programs.update', $result->id) }}" enctype="multipart/form-data"
                                    method="post">
                                    {{ csrf_field() }}
                                    @method('PUT')
                                    <div class="row mb-3 p-3">
                                        <!-- Name -->
                                        <div class="col-md-6">
                                            <div class="font-weight-bold text-secondary">Name:</div>
                                            <input type="text" class="form-control" id="programdivtype"
                                                value="{{ old('name', $result->name) }}"
                                                name="name">
                                        </div>

                                    </div>

                                    <div class="row mb-3 p-3">

                                         <!-- Short Code -->
                                         <div class="col-md-6">
                                            <div class="font-weight-bold text-secondary">Short Code:</div>
                                            <input type="text" class="form-control" id="programdivtype"
                                                value="{{ old('short_code', $result->short_code) }}"
                                                name="short_code">
                                        </div>

                                    </div>

                                    <div class="row mb-3 p-3">

                                        <!-- Short Code -->
                                        <div class="col-md-6">
                                           <div class="font-weight-bold text-secondary">Order No</div>
                                           <input type="number" class="form-control" id="order_no"
                                               value="{{ old('order_no', $result->order_no) }}"
                                               name="order_no">
                                       </div>

                                   </div>

                                    <div class="row mb-3 p-3">
                                        <!-- Status -->
                                        <div class="col-md-6">
                                            <div class="font-weight-bold text-secondary">Status:</div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input " name="status" type="checkbox"
                                                    id="toggleStatus" value="1"
                                                    {{ CHECKBOX('status', $result->status) }}
                                                    onchange="toggleStatusText('statusLabel', this)">
                                                <label class="form-check-label" for="toggleStatus"
                                                    id="statusLabel">{{ $result->status == 1 ? 'Active' : 'In-Active' }}</label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="text-start mt-4">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="button" class="btn btn-danger" onclick="window.location.href='{{route('programs.index')}}'">Cancel</button>
                                    </div>
                                </form>
                            </div>





                            <!-- insert the contents Here end -->
                        </div>
                    </div>
                </div>








            </div>
            <!-- page inner end-->
        </div>
        <!-- database table end -->
    </div>
@endsection
