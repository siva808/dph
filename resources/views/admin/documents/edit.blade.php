@extends('admin.layouts.layout')
@section('title', 'Edit Document')
@section('content')
<div class="container" style="margin-top: 90px;">
    <div class="container-fluid p-2" style="background-color: #f2f2f2;">
        <div class="d-flex justify-content-between align-items-center"
            style="padding-left: 20px; padding-right: 20px;">
            <h5 class="mb-0">Documents</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0" style="background-color: #f2f2f2;">
                    <li class="breadcrumb-item"><a href="#">Documents</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit {{$result->navigation->name}}</li>
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
                            <!-- Heading -->
                            <h4 class="card-title mb-4 text-primary">Edit {{$result->navigation->name}}</h4>
                            <form>
                                <div class="row mb-3 p-3">
                                    <!-- Type of Document -->
                                    <div class="col-md-6">
                                        <div class="font-weight-bold text-secondary">Type of Document:</div>
                                        <select class="form-control" id="documentType" disabled required>
                                            <option value="" selected>{{$result->navigation->name}}</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                    <!-- Name of Document -->
                                    <div class="col-md-6">
                                        <div class="font-weight-bold text-secondary">Document File:</div>
                                        <input type="text" class="form-control" id="documentName"
                                            value="{{$result->document_url}}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3 p-3">
                                    <!-- File Name to Display -->
                                    <div class="col-md-6">
                                        <div class="font-weight-bold text-secondary">Enter File Name to Display:
                                        </div>
                                        <input type="text" class="form-control" id="fileName" name="display_filename"
                                        value="{{old('display_filename',$result->display_filename)}}">
                                    </div>
                                    <!-- Mapping Section -->
                                    <div class="col-md-6">
                                        <div class="font-weight-bold text-secondary">Mapping Section:</div>
                                        <select class="form-control" id="mappingSection" name="tags">
                                            @foreach($tags as $key => $value)
                                            <option value="{{$key}}" {{SELECT($key,old('tags',$result->tag_id))}}>{{$value}}</option>
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
                                        value="{{old('reference_no', $result->reference_no)}}" name="reference_no">
                                    </div>
                                    <!-- Visible to Public -->
                                    <div class="col-md-6">
                                        <div class="font-weight-bold text-secondary">Visible to Public:
                                        </div>
                                        <select class="form-control" id="visibleToPublic" required>
                                            <option value="" disabled selected>Select Visibility</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3 p-3">
                                    <!-- Dated -->
                                    <div class="col-md-6">
                                        <div class="font-weight-bold text-secondary">Dated:</div>
                                        <input type="date" class="form-control" id="date"
                                            value="[Date Here]" required>
                                    </div>
                                    <!-- Uploaded By -->
                                    <div class="col-md-6">
                                        <div class="font-weight-bold text-secondary">Uploaded By:</div>
                                        <input type="text" class="form-control" id="uploaderName"
                                            value="[Uploader Name Here]" required>
                                    </div>
                                </div>

                                <div class="row mb-3 p-3">
                                    <!-- Link -->
                                    <div class="col-md-6">
                                        <div class="font-weight-bold text-secondary">Link:</div>
                                        <input type="url" class="form-control" id="link"
                                            value="[Link Here]">
                                    </div>
                                    <!-- Link Title -->
                                    <div class="col-md-6">
                                        <div class="font-weight-bold text-secondary">Link Title:</div>
                                        <input type="text" class="form-control" id="linkTitle"
                                            value="[Link Title Here]">
                                    </div>
                                </div>

                                <div class="row mb-3 p-3">
                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <div class="font-weight-bold text-secondary">Status:</div>
                                        <select class="form-control" id="status" required>
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="active" selected>Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <!-- Created At -->
                                    <div class="col-md-6">
                                        <div class="font-weight-bold text-secondary">Created At:</div>
                                        <input type="text" class="form-control" id="creationDate"
                                            value="[Creation Date Here]" readonly>
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
    $(document).ready(function(){
        $('.mydatepicker, #datepicker').datepicker();
        $('.disable_submit').on('keyup keypress', function(e) {
          var keyCode = e.keyCode || e.which;
          if (keyCode === 13) {
            e.preventDefault();
            return false;
          }
        });
    });


     $(function () {
        $("#display_filename").keypress(function (e) {
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
<script src="{{asset('packa/custom/document.js')}}"></script>
@endsection
