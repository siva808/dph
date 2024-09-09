@extends('admin.layouts.layout')
@section('title', 'Edit Contact')
@section('content')
    <div class="container" style="margin-top: 90px;">
        <div class="container-fluid p-2" style="background-color: #f2f2f2;">
            <div class="d-flex justify-content-between align-items-center" style="padding-left: 20px; padding-right: 20px;">
                <h5 class="mb-0">Contacts</h5>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0" style="background-color: #f2f2f2;">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Contacts</li>
                    </ol>
                </nav>

            </div>
        </div>
        <div class="container-fluid">
            <div class="page-inner">
                <div class="container-fluid mt-2">
                    <div class="row">
                        <div class="col-lg-12 p-5" style="background-color: #ffffff; border-radius: 10px;">
                            <!-- insert the contents Here start -->

                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <!-- Heading -->
                                <h4 class="card-title mb-4 text-primary">Edit Contact Details</h4>

                                <form action="{{ route('contacts.update', $result->id) }}" enctype="multipart/form-data"
                                    method="post">
                                    {{ csrf_field() }} @method('PUT')
                                <input type="hidden" name="contact_type" id="contact_type"
                                    value="{{ $result->contact_type }}"
                                    data-value="{{ $result->contactType->slug_key }}">
                                <input type="hidden" name="hidden_hud_id" id="hidden_hud_id"
                                    value="{{ auth()->user()->hud_id }}">
                                @if (!empty($isProfileUpdate))
                                    <input type="hidden" name="profile_update" value="true">
                                    <input type="hidden" name="is_post_vacant" value="no">
                                @endif
                                    <div class="row mb-3 p-3">
                                        <!-- Is Post Vacant -->
                                        @if (empty($isProfileUpdate))
                                        <div class="col-md-4">
                                            
                                            <div class="font-weight-bold text-secondary">Is Post Vacant:</div>
                                            <select name="is_post_vacant" id="is_post_vacant" class="form-control">
                                                @foreach ($is_post_vacants as $key => $value)
                                                    <option value="{{ $key }}" data-value="{{ $key }}"
                                                        {{ SELECT($key, old('is_post_vacant', $result->is_post_vacant)) }}>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                        <!-- Designation -->
                                        <div class="col-md-4">
                                            <div class="font-weight-bold text-secondary">Designation:</div>
                                            <select name="designation_id" id="designation_id" class="form-control">
                                                <option value="">-- Select Designation -- </option>
                                                @foreach ($designation as $key => $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ SELECT($value->id, old('designation_id', $result->designation_id)) }}>
                                                        {{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3 p-3">
                                        <!-- Name -->
                                        <div class="col-md-4">
                                            <div class="font-weight-bold text-secondary">Name:</div>
                                            <input type="text" class="form-control" id="name"
                                                value="{{ old('name', $result->name) }}" name="name">
                                        </div>
                                        <!-- Mobile Number -->
                                        <div class="col-md-4">
                                            <div class="font-weight-bold text-secondary">Mobile Number:</div>
                                            <input type="tel" class="form-control" id="mobileNumber"
                                                value="{{ old('mobile_number', $result->mobile_number) }}"
                                                name="mobile_number">
                                        </div>
                                        <!-- Landline Number -->
                                        <div class="col-md-4">
                                            <div class="font-weight-bold text-secondary">Landline Number:</div>
                                            <input type="tel" class="form-control" id="landlineNumber"
                                                value="{{ old('landline_number', $result->landline_number) }}"
                                                name="landline_number">
                                        </div>
                                    </div>

                                    <div class="row mb-3 p-3">
                                        <!-- Email ID -->
                                        <div class="col-md-4">
                                            <div class="font-weight-bold text-secondary">Email ID:</div>
                                            <input type="email" class="form-control" id="emailId"
                                                value="{{ old('email_id', $result->email_id) }}" name="email_id">
                                        </div>
                                        <!-- Fax -->
                                        <div class="col-md-4">
                                            <div class="font-weight-bold text-secondary">Fax:</div>
                                            <input type="text" class="form-control" id="fax"
                                                value="{{ old('fax', $result->fax) }}" name="fax">
                                        </div>
                                        @if (!empty($isProfileUpdate))
                                            <input type="hidden" name="hud_id" id="hud_id"
                                                value="{{ $result->hud_id }}">
                                        @elseif(empty($isProfileUpdate) && (isAdmin() || isHud()))
                                            @if (
                                                $result->contactType->slug_key == 'hud' ||
                                                    $result->contactType->slug_key == 'block' ||
                                                    $result->contactType->slug_key == 'phc' ||
                                                    $result->contactType->slug_key == 'hsc')
                                                <!-- HUD -->
                                                <div class="col-md-4">
                                                    <div class="font-weight-bold text-secondary">HUD:</div>
                                                    <select name="hud_id" id="hud_id" class="form-control">
                                                        <option value="">-- Select HUD -- </option>
                                                        @foreach ($huds as $key => $value)
                                                            <option value="{{ $value->id }}"
                                                                {{ SELECT($value->id, old('hud_id', $result->hud_id)) }}>
                                                                {{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                    </div>
                                    @endif
                                    <div class="row mb-3 p-3">
                                        @if (
                                            $result->contactType->slug_key == 'block' ||
                                                $result->contactType->slug_key == 'phc' ||
                                                $result->contactType->slug_key == 'hsc')
                                            <!-- Block -->
                                            <div class="col-md-4">
                                                <div class="font-weight-bold text-secondary">Block:</div>
                                                <select name="block_id" id="block_id" class="form-control">
                                                    <option value="">-- Select Block -- </option>
                                                    @foreach ($blocks as $key => $value)
                                                        <option value="{{ $value->id }}"
                                                            {{ SELECT($value->id, old('block_id', $result->block_id)) }}>
                                                            {{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        <!-- PHC -->
                                        @if ($result->contactType->slug_key == 'phc' || $result->contactType->slug_key == 'hsc')
                                            <div class="col-md-4">
                                                <div class="font-weight-bold text-secondary">PHC:</div>
                                                <select name="phc_id" id="phc_id" class="form-control">
                                                    <option value="">-- Select PHC -- </option>
                                                    @foreach ($phc as $key => $value)
                                                        <option value="{{ $value->id }}"
                                                            {{ SELECT($value->id, old('phc_id', $result->phc_id)) }}>
                                                            {{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        <!-- HSC -->
                                        @if ($result->contactType->slug_key == 'hsc')
                                            <div class="col-md-4">
                                                <div class="font-weight-bold text-secondary">HSC:</div>
                                                <select name="hsc_id" id="hsc_id" class="form-control">
                                                    <option value="">-- Select HSC -- </option>
                                                    @foreach ($hsc as $key => $value)
                                                        <option value="{{ $value->id }}"
                                                            {{ SELECT($value->id, old('hsc_id', $result->hsc_id)) }}>
                                                            {{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                    </div>
                                    @endif
                                    @if (!empty($isProfileUpdate))
                                        <input type="hidden" name="status" value="{{ $result->status }}">
                                    @else
                                        <div class="row mb-3 p-3">
                                            <!-- Status -->
                                            <div class="col-md-4">
                                                <div class="font-weight-bold text-secondary">Status:</div>
                                                <select name="status" id="status" class="form-control">
                                                    @foreach ($statuses as $key => $value)
                                                        <option value="{{ $value }}"
                                                            {{ SELECT($value, old('status', $result->status)) }}>
                                                            {{ $key }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
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
    <script src="{{ asset('packa/custom/contact.js') }}"></script>
@endsection
