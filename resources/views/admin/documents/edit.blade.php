@extends('admin.layouts.layout')
@section('title', 'Edit Document')
@section('content')
    <div class="container" style="margin-top: 90px;">
        <div class="container-fluid p-2" style="background-color: #f2f2f2;">
            <div class="d-flex justify-content-between align-items-center" style="padding-left: 20px; padding-right: 20px;">
                <h5 class="mb-0">Documents</h5>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0" style="background-color: #f2f2f2;">
                        <li class="breadcrumb-item"><a href="#">Documents</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit {{ $result->navigation->name }}</li>
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
                                <h4 class="card-title mb-4 text-primary">Edit {{ $result->navigation->name }}</h4>
                                <form action="{{ route('documents.update', $result->id) }}" enctype="multipart/form-data"
                                    method="post">
                                    {{ csrf_field() }}
                                    @method('PUT')
                                    <div class="row mb-3 p-3">
                                        <!-- Type of Document -->
                                        <div class="col-md-6">
                                            <div class="font-weight-bold text-secondary">Type of Document:</div>
                                            <select class="form-control" id="documentType" disabled required>
                                                <option value="" selected>{{ $result->navigation->name }}</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                        <!-- Name of Document -->
                                        <div class="col-md-6">
                                            <div class="font-weight-bold text-secondary">Document File:</div>
                                            <input type="text" class="form-control" id="documentName"
                                                value="{{ $result->document_url }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3 p-3">
                                        <!-- File Name to Display -->
                                        <div class="col-md-6">
                                            <div class="font-weight-bold text-secondary">Enter File Name to Display:
                                            </div>
                                            <input type="text" class="form-control" id="fileName"
                                                name="display_filename"
                                                value="{{ old('display_filename', $result->display_filename) }}">
                                        </div>
                                        <!-- Mapping Section -->
                                        <div class="col-md-6">
                                            <div class="font-weight-bold text-secondary">Mapping Section:</div>
                                            <select class="form-control" id="mappingSection" name="tags">
                                                @foreach ($tags as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{ SELECT($key, old('tags', $result->tag_id)) }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3 p-3">
                                        <!-- G.O / Letter / Reference No. -->
                                        <div class="col-md-6">
                                            <div class="font-weight-bold text-secondary">G.O / Letter /
                                                Reference No.:</div>
                                            <input type="text" class="form-control" id="referenceNumber"
                                                value="{{ old('reference_no', $result->reference_no) }}"
                                                name="reference_no" />
                                        </div>
                                        <!-- Visible to Public -->
                                        <div class="col-md-6">
                                            <div class="font-weight-bold text-secondary">Visible to Public:
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="visible_to_public" type="checkbox"
                                                    id="toggleVisibleToPublic" value="1"
                                                    {{ CHECKBOX('visible_to_public', $result->visible_to_public) }}
                                                    onchange="toggleVisibleText('visibleToPublicLabel', this)">
                                                <label class="form-check-label" for="toggleVisibleToPublic"
                                                    id="visibleToPublicLabel">{{ $result->visible_to_public == 1 ? 'Yes' : 'No' }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3 p-3">
                                        <!-- Dated -->
                                        <div class="col-md-6">
                                            <div class="font-weight-bold text-secondary">Dated:</div>
                                            <input type="text" class="form-control mydatepicker" id="dated"
                                                placeholder="mm/dd/yyyy" value="{{ old('dated', $result->dated) }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3 p-3">
                                        <!-- Link -->
                                        <div class="col-md-6">
                                            <div class="font-weight-bold text-secondary">Link:</div>
                                            <input type="text" class="form-control" id="link_url" name="link_url"
                                                value="{{ old('link_url', $result->link_url) }}" />
                                        </div>
                                        <!-- Link Title -->
                                        <div class="col-md-6">
                                            <div class="font-weight-bold text-secondary">Link Title:</div>
                                            <input type="text" class="form-control" id="link_title" name="link_title"
                                                value="{{ old('link_title', $result->link_title) }}" />
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
