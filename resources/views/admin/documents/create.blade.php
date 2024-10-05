@extends('admin.layouts.layout')
@section('title', 'Upload Document')
@section('content')
    <style>
        #typeofdoc.readonly {
            pointer-events: none;
            background-color: #e9ecef;
        }
    </style>
    <div class="container" style="margin-top: 90px;">
        <div class="container-fluid p-2" style="background-color: #f2f2f2;">
            <div class="d-flex justify-content-between align-items-center" style="padding-left: 20px; padding-right: 20px;">
                <h5 class="mb-0">Documents</h5>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0" style="background-color: #f2f2f2;">
                        <li class="breadcrumb-item"><a href="#">Documents</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create
                            {{ $document_types->firstWhere('id', request('document_type'))->name ?? 'Documents' }}</li>
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

                <div class="container mt-2">
                    <div class="row">
                        <div class="col-lg-12 p-5" style="background-color: #ffffff; border-radius: 10px;">
                            <form id="documentForm" form action="{{ route('new-documents.store') }}"
                                enctype="multipart/form-data" method="post" class="disable_submit">
                                {{ csrf_field() }}
                                <div class="table-responsive">
                                    <h4 class="card-title mb-4 text-primary">Create
                                        {{ $document_types->firstWhere('id', request('document_type'))->name ?? 'Documents' }}
                                    </h4>
                                    <table class="table table-borderless">
                                        <tbody>
                                            <!-- Select Type of Document  -->
                                            @if (!in_array(request('document_type'), [4, 15]))
                                                <tr class="d-none">
                                                    <td>
                                                        <label for="typeofdoc" class="form-label">Select
                                                            Type Of Document <span style="color: red;">*</span></label>
                                                    </td>
                                                    <td>
                                                        <select class="form-select" id="typeofdoc" name="document_type_id">
                                                            @foreach ($document_types as $key => $value)
                                                                <option value="{{ $value->id }}"
                                                                    data-value="{{ $value->slug_key }}"
                                                                    {{ SELECT($value->id, request('document_type')) }}>
                                                                    {{ $value->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            @endif

                                            <!-- Select Program Divisions -->

                                            @if (!in_array(request('document_type'), [4, 15]))
                                                <tr>
                                                    <td class="col-12 col-md-3">
                                                        <label for="programDivisionsInput" class="form-label">Select Program
                                                            Divisions</label>
                                                    </td>
                                                    <td class="col-12 col-md-9">
                                                        <div class="position-relative">
                                                            <div class="select-wrapper">
                                                                <select class="form-select select-dropdown"
                                                                    id="programDivisions">
                                                                    <option> -- Select --</option>
                                                                    @foreach ($programs as $key => $value)
                                                                        <option value="{{ $key }}"
                                                                            {{ SELECT($key, old('programs')) }}>
                                                                            {{ $value }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                    </td>
                                                </tr>

                                                <!-- Select Schemes -->
                                                <tr>
                                                    <td class="col-12 col-md-3">
                                                        <label for="SchemesInput" class="form-label ">Select Schemes <span
                                                                style="color: red;">*</span></label>
                                                    </td>
                                                    <td class="col-12 col-md-9">
                                                        <div class="position-relative">
                                                            <div class="select-wrapper">
                                                                <select class="form-select select-dropdown" id="schemes"
                                                                    name="scheme_id" required>
                                                                    <option> -- Select --</option>
                                                                    @foreach ($schemes as $key => $value)
                                                                        <option value="{{ $key }}"
                                                                            {{ SELECT($key, old('schemes')) }}>
                                                                            {{ $value }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                            @if (in_array(request('document_type'), [4, 15]))
                                                <tr>
                                                    <td>
                                                        <label class="form-label">Select Type <span
                                                                style="color: red;">*</span></label>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="document_type_id" id="acts" value="4"
                                                                required>
                                                            <label class="form-check-label" for="acts">Acts</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="document_type_id" id="rules" value="15"
                                                                required>
                                                            <label class="form-check-label" for="rules">Rules</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                            <!-- Select Acts or Rules -->



                                            <!-- Enter File Name to Display -->
                                            <tr>
                                                <td>
                                                    <label for="fileName" class="form-label">Name<span
                                                            style="color: red;">*</span></label>
                                                </td>
                                                <td>
                                                    <input name="name" type="text" class="form-control" id="fileName"
                                                        placeholder="Enter file name" required>
                                                </td>
                                            </tr>

                                            <!-- Add File Description -->
                                            <tr>
                                                <td class="col-12 col-md-3">
                                                    <label for="fileDescription" class="form-label">Description <span
                                                            style="color: red;">*</span></label>
                                                </td>
                                                <td class="col-12 col-md-9">
                                                    <textarea class="form-control" id="fileDescription" placeholder="Enter file description" name="description" required></textarea>
                                                </td>
                                            </tr>


                                            <!-- Create Document -->
                                            <tr>
                                                <td>
                                                    <label for="createDocument" class="form-label">Upload File<span
                                                            style="color: red;">*</span></label>
                                                </td>
                                                <td>
                                                    <input type="file" name="document" class="form-control"
                                                        id="createDocument" placeholder="Enter document title" required>
                                                    <small style="color: red;">Accepted .pdf format &
                                                        allowed max size is
                                                        5MB</small>
                                                </td>
                                            </tr>

                                            <!-- Language of Document -->
                                            @if (!in_array(request('document_type'), [4, 15]))
                                                <tr>
                                                    <td class="col-12 col-md-3">
                                                        <label for="language" class="form-label">Language of Document
                                                            <span style="color: red;">*</span></label>
                                                    </td>
                                                    <td class="col-12 col-md-9">
                                                        <select class="form-select select-dropdown" id="language"
                                                            name="language" required>
                                                            <option> -- Select --</option>
                                                            @foreach ($languages as $key => $value)
                                                                <option value="{{ $key }}">
                                                                    {{ $value }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                </tr>
                                            @endif




                                            <!-- Enter GO's/Letter/Reference Number -->
                                            <tr>
                                                <td>
                                                    <label for="referenceNumber" class="form-label">Reference Number <span
                                                            style="color: red;">*</span></label>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="referenceNumber"
                                                        name="reference_no" placeholder="Enter reference number">
                                                </td>

                                                <td></td>
                                            </tr>

                                            @if (in_array(request('document_type'), [5]))
                                                <!-- Link -->
                                                <tr>
                                                    <td>
                                                        <label for="link" class="form-label">Link<span
                                                                style="color: red;">*</span></label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="link"
                                                            name="link" placeholder="Enter Link">
                                                    </td>
                                                </tr>
                                                <!-- Link Title -->
                                                <tr>
                                                    <td>
                                                        <label for="linkTitle" class="form-label">Link Title<span
                                                                style="color: red;">*</span></label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="linkTitle"
                                                            name="link_title" placeholder="Enter Link Title">
                                                    </td>
                                                </tr>
                                            @endif
                                            <!-- Date -->
                                            <tr>
                                                <td>
                                                    <label for="date" class="form-label">Date<span
                                                            style="color: red;">*</span></label>
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control" name="dated"
                                                        id="date">
                                                </td>
                                            </tr>




                                            <!-- Visible to public -->
                                            <tr>
                                                <td>
                                                    <label for="status" class="form-label">Visible to
                                                        Public</label>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" name="visible_to_public"
                                                            type="checkbox" id="toggleVisibleToPublic" value="1"
                                                            {{ CHECKBOX('document_visible_to_public') }}
                                                            onchange="toggleVisibleText('visibleToPublicLabel', this)">
                                                        <label class="form-check-label" for="toggleVisibleToPublic"
                                                            id="visibleToPublicLabel">No</label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Status -->
                                            <tr>
                                                <td>
                                                    <label for="status" class="form-label">Status</label>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" name="status" type="checkbox"
                                                            id="toggleStatus" value="1"
                                                            {{ CHECKBOX('document_status') }}
                                                            onchange="toggleStatusText('statusLabel', this)">
                                                        <label class="form-check-label" for="toggleStatus"
                                                            id="statusLabel">In-Active</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Buttons -->
                                <div class="d-flex mt-2">
                                    <button type="submit" class="btn btn-primary"
                                        onclick="validateForm()">Submit</button>
                                    <button type="button" style="margin-left: 10px;"
                                        class="btn btn-danger">Cancel</button>
                                </div>

                            </form>
                            <!-- popup for submitting confirmation start -->
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
                            <!-- popup for submitting confirmation end -->
                            <!-- insert the contents Here end -->
                        </div>
                    </div>
                </div>

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

    <script>
        document.getElementById('typeofdoc').classList.add('readonly');
    </script>
    <script src="{{ asset('packa/custom/document.js') }}"></script>
@endsection
