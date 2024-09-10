@extends('admin.layouts.layout')
@section('title', 'Create Contact')
@section('content')

    <div class="container" style="margin-top: 90px;">
        <div class="container-fluid p-2" style="background-color: #f2f2f2;">
            <div class="d-flex justify-content-between align-items-center" style="padding-left: 20px; padding-right: 20px;">
                <h5 class="mb-0">Contacts</h5>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0" style="background-color: #f2f2f2;">
                        <li class="breadcrumb-item"><a href="#">Contacts</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create contact</li>
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
                <!-- insert the contents Here start -->

                <div class="container-fluid mt-2">
                    <div class="row">
                        <div class="col-lg-10 py-5 px-5" style="background-color: #ffffff; border-radius: 10px;">
                            <form id="contactForm" action="{{ route('contacts.store') }}" enctype="multipart/form-data"
                                method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="hidden_hud_id" id="hidden_hud_id"
                                    value="{{ auth()->user()->hud_id }}">
                                <div class="container">
                                    <h4 class="card-title mb-4 text-primary">Create Contact</h4>

                                    <!-- Contact Type Row -->
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-3">
                                            <label for="contactType" class="form-label">Contact Type <span
                                                    style="color: red;">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <select name="contact_type" id="contact_type" class="form-select">
                                                <option value="">-- Select Contact Type -- </option>
                                                @foreach ($contact_types as $key => $value)
                                                    <option value="{{ $value->id }}" data-value="{{ $value->slug_key }}"
                                                        {{ SELECT($value->id, old('contact_type')) }}>{{ $value->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Is Post Vacant Row -->
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-3">
                                            <label for="isPostVacant" class="form-label">Is Post Vacant? <span
                                                    style="color: red;">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-5">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="is_post_vacant"
                                                    name="is_post_vacant" value="1"
                                                    {{ CHECKBOX('is_post_vacant', old('is_post_vacant')) }}
                                                    onchange="toggleVisibleText('postvacantLabel', this)">
                                                <label class="form-check-label" for="isPostVacant"
                                                    id="postvacantLabel">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Designation Row -->
                                    <div class="row mb-3" id="designation_div">
                                        <div class="col-12 col-md-3">
                                            <label for="designation" class="form-label">Designation <span
                                                    style="color: red;">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <select name="designation_id" id="designation_id" class="form-control">
                                                <option value="">-- Select Designation -- </option>
                                                @foreach ($designation as $key => $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ SELECT($value->id, old('designation_id')) }}>
                                                        {{ $value->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Name Row -->
                                    <div class="row mb-3" id="name_div">
                                        <div class="col-12 col-md-3">
                                            <label for="name" class="form-label">Name <span
                                                    style="color: red;">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Enter Name" value="{{ old('name') }}">
                                        </div>
                                    </div>

                                    <!-- Mobile Number Row -->
                                    <div class="row mb-3" id="mobile_number_div">
                                        <div class="col-12 col-md-3">
                                            <label for="mobileNumber" class="form-label">Mobile Number <span
                                                    style="color: red;">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <input type="text" name="mobile_number" class="form-control"
                                                id="mobile_number" placeholder="Enter Mobile Number"
                                                value="{{ old('mobile_number') }}">
                                        </div>
                                    </div>

                                    <!-- Landline Number Row -->
                                    <div class="row mb-3" id="landline_number_div">
                                        <div class="col-12 col-md-3">
                                            <label for="landlineNumber" class="form-label">Landline
                                                Number</label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <input type="text" name="landline_number" class="form-control"
                                                id="landline_number" placeholder="Enter Landline Number"
                                                value="{{ old('landline_number') }}">
                                        </div>
                                    </div>

                                    <!-- Email Row -->
                                    <div class="row mb-3" id="email_id_div">
                                        <div class="col-12 col-md-3">
                                            <label for="email" class="form-label">Email ID <span
                                                    style="color: red;">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <input type="text" name="email_id" class="form-control" id="email_id"
                                                placeholder="Enter Email Id" value="{{ old('email_id') }}">
                                        </div>
                                    </div>

                                    <!-- Fax Row -->
                                    <div class="row mb-3" id="fax_div">
                                        <div class="col-12 col-md-3">
                                            <label for="fax" class="form-label">Fax</label>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <input type="text" name="fax" class="form-control" id="fax"
                                                placeholder="Enter Fax" value="{{ old('fax') }}">
                                        </div>
                                    </div>
                                    @if (isAdmin() || isHud())
                                        <div class="row mb-3" id="hud_div" style="display:none;">
                                            <div class="col-12 col-md-3">
                                                <label for="hud_id" class="required">HUD</label>
                                            </div>
                                            <div class="col-12 col-md-7">
                                                <select name="hud_id" id="hud_id" class="form-control">
                                                    <option value="">-- Select HUD -- </option>
                                                    @foreach ($huds as $key => $value)
                                                        <option value="{{ $value->id }}"
                                                            {{ SELECT($value->id, old('hud_id')) }}>{{ $value->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3" id="block_div" style="display:none;">
                                            <div class="col-12 col-md-3">
                                                <label for="block_id" class="required">Block</label>
                                            </div>
                                            <div class="col-12 col-md-7">
                                                <select name="block_id" id="block_id" class="form-control">
                                                    <option value="">-- Select Block -- </option>
                                                    @foreach ($blocks as $key => $value)
                                                        <option value="{{ $value->id }}"
                                                            {{ SELECT($value->id, old('block_id')) }}>{{ $value->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3" id="phc_div" style="display:none;">
                                            <div class="col-12 col-md-3">
                                                <label for="phc_id" class="required">PHC</label>
                                            </div>
                                            <div class="col-12 col-md-7">
                                                <select name="phc_id" id="phc_id" class="form-control">
                                                    <option value="">-- Select PHC -- </option>
                                                    @foreach ($phc as $key => $value)
                                                        <option value="{{ $value->id }}"
                                                            {{ SELECT($value->id, old('phc_id')) }}>{{ $value->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3" id="hsc_div" style="display:none;">
                                            <div class="col-12 col-md-3">
                                                <label for="hsc_id" class="required">HSC</label>
                                            </div>
                                            <div class="col-12 col-md-7">
                                                <select name="hsc_id" id="hsc_id" class="form-control">
                                                    <option value="">-- Select HSC -- </option>
                                                    @foreach ($hsc as $key => $value)
                                                        <option value="{{ $value->id }}"
                                                            {{ SELECT($value->id, old('hsc_id')) }}>{{ $value->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    @endif
                                    <!-- Status Row -->
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-3">
                                            <label for="status" class="form-label">Status</label>
                                        </div>
                                        <div class="col-12 col-md-5">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="status" type="checkbox"
                                                            id="toggleStatus" value="1"
                                                            {{ CHECKBOX('document_status') }}
                                                            onchange="toggleStatusText('statusLabel', this)">
                                                        <label class="form-check-label" for="toggleStatus"
                                                            id="statusLabel">In-Active</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Buttons -->
                                    <div class="d-flex mt-2">
                                        <button type="submit" class="btn btn-primary"
                                            onclick="validateForm()">Submit</button>
                                        <button type="button" style="margin-left: 10px;"
                                            class="btn btn-danger">Cancel</button>
                                    </div>
                                </div>


                            </form>


                            <!-- Confirmation Modal -->
                            <div class="modal fade" id="confirmationModal" tabindex="-1"
                                aria-labelledby="confirmationModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center position-relative">
                                            <h5 class="modal-title" id="confirmationModalLabel">Confirm
                                                Submission</h5>
                                            <button type="button" class="btn-close position-absolute end-0 me-3"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <div class="confirmation-icon mb-4">
                                                <i class="fas fa-question-circle fa-4x text-danger"></i>
                                            </div>
                                            <p class="mb-4">Are you sure you want to submit the form?</p>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-outline-danger"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-success" onclick="submitForm()">Yes,
                                                Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
