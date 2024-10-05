@extends('admin.layouts.layout')
@section('title', 'Edit Document')
@section('content')
    <div class="container" style="margin-top: 90px;">
        <div class="container-fluid p-2" style="background-color: #f2f2f2;">
            <div class="d-flex justify-content-between align-items-center" style="padding-left: 20px; padding-right: 20px;">
                <h5 class="mb-0">Documents</h5>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0" style="background-color: #f2f2f2;">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit {{ $result->document_type->name }}</li>
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
                        <div class="col-lg-12 p-5" style="background-color: #ffffff; border-radius: 10px;">
                            <!-- new form start ============================================-->
                            <form id="documentForm" action="{{ route('new-documents.update', $result->id) }}"
                                enctype="multipart/form-data" method="post">
                                {{ csrf_field() }}
                                @method('PUT')
                                <div class="card-body">
                                    <h4 class="card-title mb-4 text-primary">Edit {{ $result->document_type->name }}</h4>

                                    <div class="row mb-3 p-3">
                                        @if (!in_array($result->document_type_id, [4, 15]))
                                            <input type="hidden" name="document_type_id"
                                                value="{{ $result->document_type_id }}">
                                        @endif
                                        @if (in_array($result->document_type_id, [4, 15]))
                                            <div class="col-md-4">
                                                <div class="font-weight-bold text-secondary">Select Type<span
                                                        style="color: red;">*</span>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="acts"
                                                        name="document_type_id" value="4"
                                                        {{ CHECKBOX('document_type_id', $result->document_type_id == 4) }}
                                                        required>
                                                    <label class="form-check-label" for="acts">Acts</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="rules"
                                                        name="document_type_id" value="15"
                                                        {{ CHECKBOX('document_type_id', $result->document_type_id == 15) }}
                                                        required>
                                                    <label class="form-check-label" for="rules">Rules</label>
                                                </div>
                                            </div>
                                        @endif
                                        @if (!in_array($result->document_type_id, [4, 15]))

                                            <!-- Program Divisions -->
                                            <div class="col-md-4">
                                                <div class="font-weight-bold text-secondary">Select Program Divisions</div>
                                                <select class="form-control select-dropdown" id="programDivisions">
                                                    <option value=""> -- Select --</option>
                                                    @foreach ($programs as $key => $value)
                                                        <option value="{{ $key }}"
                                                            {{ SELECT($key, $result->scheme->programs_id) }}>
                                                            {{ $value }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <!-- Select Schemes -->
                                            <div class="col-md-4">
                                                <div class="font-weight-bold text-secondary">Select Schemes <span
                                                        style="color: red;">*</span></div>
                                                <select class="form-control select-dropdown" id="schemes" name="scheme_id"
                                                    required>
                                                    <option> -- Select --</option>
                                                    @foreach ($schemes as $key => $value)
                                                        <option value="{{ $key }}"
                                                            {{ SELECT($key, $result->scheme_id) }}>
                                                            {{ $value }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        <!-- Name -->
                                        <div class="col-md-4">
                                            <div class="font-weight-bold text-secondary">Name</div>
                                            <input type="text" class="form-control" id="orderTitle"
                                                placeholder="Enter Name" name="name" value="{{ $result->name }}"
                                                required>
                                        </div>
                                    </div>

                                    <div class="row mb-3 p-3">
                                        <!-- Description -->
                                        <div class="col-md-4">
                                            <div class="font-weight-bold text-secondary">Description</div>
                                            <textarea class="form-control" id="fileDescription" placeholder="Enter file description" name="description" required>{{ $result->description }}</textarea>
                                        </div>
                                        <!-- File Upload -->
                                        <div class="col-md-4">
                                            <div class="font-weight-bold text-secondary">File Upload</div>
                                            <div class="input-group">
                                                <!-- File Upload Input -->
                                                <input type="file" class="form-control" name="document" id="fileUpload">

                                                <!-- View Document Button -->
                                                <div class="input-group-append">
                                                    <a href="{{ fileLink($result->document_url) }}" target="_blank"
                                                        class="btn btn-primary">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <small style="color: red;">Accepted Only .pdf format & Allowed max size in
                                                5MB</small>
                                        </div>
                                        <!-- Language of Document -->
                                        <div class="col-md-4">
                                            <div class="font-weight-bold text-secondary">Language of Document</div>
                                            <select class="form-select select-dropdown" id="language" name="language"
                                                required>
                                                <option> -- Select --</option>
                                                @foreach ($languages as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{ SELECT($key, $result->language_id) }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>


                                    </div>

                                    <div class="row mb-3 p-3">

                                        <!-- Reference Number -->
                                        <div class="col-md-4">
                                            <div class="font-weight-bold text-secondary">Reference Number</div>
                                            <input type="text" class="form-control" id="referenceNumber"
                                                name="reference_no" value="{{ $result->reference_no }}"
                                                placeholder="Enter reference number" required>
                                        </div>

                                        {{-- Link --}}
                                        <div class="col-md-4">
                                            <div class="font-weight-bold text-secondary">Link</div>
                                            <input type="text" class="form-control" name="link" value="{{$result->link}}" id="link"
                                                placeholder="Enter link URL">
                                        </div>

                                        {{-- Link Title --}}
                                        <div class="col-md-4">
                                            <div class="font-weight-bold text-secondary">Link Title</div>
                                            <input type="text" class="form-control" name="link_title" value="{{$result->link_title}}" id="linkTitle"
                                                placeholder="Enter link title">
                                        </div>

                                    </div>

                                    <div class="row mb-3 p-3">
                                        <!-- Date -->
                                        <div class="col-md-4">
                                            <div class="font-weight-bold text-secondary">Date
                                            </div>
                                            <input type="date" class="form-control" name="dated" id="dateOfGo"
                                                value="{{ $result->dated }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3 p-3">
                                        <!-- Status -->
                                        <div class="col-md-2">
                                            <div class="font-weight-bold text-secondary">Status</div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input " name="status" type="checkbox"
                                                    id="toggleStatus" value="1"
                                                    {{ CHECKBOX('status', $result->status) }}
                                                    onchange="toggleStatusText('statusLabel', this)">
                                                <label class="form-check-label" for="toggleStatus"
                                                    id="statusLabel">{{ $result->status == 1 ? 'Active' : 'In-Active' }}</label>
                                            </div>
                                        </div>

                                        <!-- Visible to Public -->
                                        <div class="col-md-2">
                                            <div class="font-weight-bold text-secondary">Visible to Public</div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input " name="visible_to_public" type="checkbox"
                                                    id="toggleVisibleToPublic" value="1"
                                                    {{ CHECKBOX('visible_to_public', $result->visible_to_public) }}
                                                    onchange="toggleVisibleText('visibleToPublicLabel', this)">
                                                <label class="form-check-label" for="toggleVisibleToPublic"
                                                    id="visibleToPublicLabel">{{ $result->visible_to_public == 1 ? 'Yes' : 'No' }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="d-flex mt-2">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="button" style="margin-left: 10px;"
                                            class="btn btn-danger">Cancel</button>
                                    </div>
                                </div>
                            </form>
                            <!-- new form end ============================================-->
                        </div>
                    </div>
                </div>
                <!-- insert the contents Here end -->
            </div>
            <!-- page inner end-->
        </div>

        <!-- database table end -->
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.mydatepicker, #datepicker').datepicker();
            $('.disable_submit').on('keyup keypress', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });
        });


        $(function() {
            $("#display_filename").keypress(function(e) {
                var keyCode = e.keyCode || e.which;

                $("#lblError").html("");

                //Regex for Valid Characters i.e. Alphabets and Numbers.
                var regex = /^[a-z\d\-_\s]+$/i;

                //Validate TextBox value against the Regex.
                var isValid = regex.test(String.fromCharCode(keyCode));
                if (!isValid) {
                    $("#lblError").html("Only Alphabets and Numbers allowed.");
                }
                return isValid;
            });
        });
    </script>
    <script src="{{ asset('packa/custom/document.js') }}"></script>
@endsection
