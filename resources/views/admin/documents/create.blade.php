@extends('admin.layouts.layout')
@section('title', 'Upload Document')
@section('content')
    <div class="container" style="margin-top: 90px;">
        <div class="container-fluid p-2" style="background-color: #f2f2f2;">
            <div class="d-flex justify-content-between align-items-center" style="padding-left: 20px; padding-right: 20px;">
                <h5 class="mb-0">Documents</h5>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0" style="background-color: #f2f2f2;">
                        <li class="breadcrumb-item"><a href="#">Documents</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create (Type Of Document)</li>
                    </ol>
                </nav>

            </div>
        </div>
        <div class="container-fluid">
            <div class="page-inner">
                <!-- insert the contents Here start -->

                <div class="container mt-2">
                    <div class="row">
                        <div class="col-lg-12 p-5" style="background-color: #ffffff; border-radius: 10px;">
                            <form id="documentForm">
                                <div class="table-responsive">
                                    <h4 class="card-title mb-4 text-primary">Create
                                        {{ $navigations->firstWhere('id', request('navigation'))->name ?? 'Documents' }}
                                    </h4>
                                    <table class="table table-borderless">
                                        <tbody>
                                            <!-- Select Type of Document  -->
                                            <tr>
                                                <td>
                                                    <label for="typeofdoc" class="form-label">Select
                                                        Type Of Document <span style="color: red;">*</span></label>
                                                </td>
                                                <td>
                                                    <select class="form-select" id="typeofdoc" name="navigation_id" required
                                                        disabled>
                                                        @foreach ($navigations as $key => $value)
                                                            <option value="{{ $value->id }}"
                                                                data-value="{{ $value->slug_key }}"
                                                                {{ SELECT($value->id, old('navigation_id')) }}>
                                                                {{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <!-- Create Document -->
                                            <tr>
                                                <td>
                                                    <label for="createDocument" class="form-label">Create
                                                        Document <span style="color: red;">*</span></label>
                                                </td>
                                                <td>
                                                    <input type="file" name="document" class="form-control"
                                                        id="createDocument" placeholder="Enter document title" required>
                                                    <small style="color: red;">Accepted .jpg/.jpeg/.png format &
                                                        allowed max size is
                                                        5MB</small>
                                                </td>


                                                <td></td>
                                            </tr>

                                            <!-- Enter File Name to Display -->
                                            <tr>
                                                <td>
                                                    <label for="fileName" class="form-label">Enter File Name to
                                                        Display <span style="color: red;">*</span></label>
                                                </td>
                                                <td>
                                                    <input name="display_filename" type="text" class="form-control"
                                                        id="fileName" placeholder="Enter file name" required>
                                                </td>

                                                <td></td>
                                            </tr>

                                            <!-- Select Mapping Section -->
                                            <tr>
                                                <td>
                                                    <label for="mappingSection" class="form-label">Select
                                                        Mapping Section <span style="color: red;">*</span></label>
                                                </td>
                                                <td>
                                                    <select name="tags" id="tags" class="form-control">
                                                        @foreach ($tags as $key => $value)
                                                            <option value="{{ $key }}"
                                                                {{ SELECT($key, old('tags')) }}>{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td></td>
                                            </tr>

                                            <!-- Enter GO's/Letter/Reference Number -->
                                            <tr>
                                                <td>
                                                    <label for="referenceNumber" class="form-label">Enter
                                                        GO's/Letter/Reference Number <span
                                                            style="color: red;">*</span></label>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="referenceNumber"
                                                        name="reference_no" placeholder="Enter reference number" required>
                                                </td>

                                                <td></td>
                                            </tr>

                                            <!-- Date -->
                                            <tr>
                                                <td>
                                                    <label for="date" class="form-label">Date <span
                                                            style="color: red;">*</span></label>
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control" name="dated" id="date"
                                                        required>
                                                </td>

                                                <td></td>
                                            </tr>



                                            <!-- Link -->
                                            <tr>
                                                <td>
                                                    <label for="link" class="form-label">Link <span
                                                            style="color: red;">*</span></label>
                                                </td>
                                                <td>
                                                    <input type="url" class="form-control" id="link"
                                                        name="link_url" placeholder="Enter link URL" required>
                                                </td>

                                                <td></td>
                                            </tr>

                                            <!-- Link Title -->
                                            <tr>
                                                <td>
                                                    <label for="linkTitle" class="form-label">Link Title <span
                                                            style="color: red;">*</span></label>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="linkTitle"
                                                        name="link_title" placeholder="Enter link title" required>
                                                </td>

                                                <td></td>
                                            </tr>

                                            <!-- Status -->
                                            <tr>
                                                <td>
                                                    <label for="status" class="form-label">Status</label>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" name="status" type="checkbox" id="toggleStatus"
                                                            checked onchange="toggleStatusText('statusLabel', this)">
                                                        <label class="form-check-label" for="toggleStatus"
                                                            id="statusLabel">Active</label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Buttons -->
                                <div class="d-flex mt-2">
                                    <button type="button" class="btn btn-primary" onclick="validateForm()">Submit</button>
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
    <script src="{{ asset('packa/custom/document.js') }}"></script>
@endsection
