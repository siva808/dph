@extends('admin.layouts.layout')
@section('title', 'List Facility Type')
@section('content')
<div class="container" style="margin-top: 90px;">
    <div class="container-fluid p-2" style="background-color: #f2f2f2;">
        <div class="d-flex justify-content-between align-items-center"
            style="padding-left: 20px; padding-right: 20px;">
            <h5 class="mb-0">Facility Masters</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0" style="background-color: #f2f2f2;">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Facility Masters</li>
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
                        <form id="facilityForm">
                            <div class="table-responsive">
                                <h4 class="card-title mb-4 text-primary">Create Facility Details</h4>
                                <table class="table table-borderless">
                                    <tbody>
                                        <!-- Facility ID -->
                        
                                        <!-- Facility Name -->
                                        <tr>
                                            <td>
                                                <label for="facilityName" class="form-label">Facility Name <span style="color: red;">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="facilityName" placeholder="Enter facility name" required>
                                            </td>
                                            <td></td>
                                        </tr>
                        
                                        <!-- Facility Code -->
                                        <tr>
                                            <td>
                                                <label for="facilityCode" class="form-label">Facility Code <span style="color: red;">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="facilityCode" placeholder="Enter facility code" required>
                                            </td>
                                            <td></td>
                                        </tr>
                        
                                        <!-- Facility Level -->
                                        <tr>
                                            <td>
                                                <label for="facilityLevel" class="form-label">Facility Level <span style="color: red;">*</span></label>
                                            </td>
                                            <td>
                                                <select class="form-control searchable" id="facility_level" name="facility_level_id" onchange="searchFun()">
                                                    <option value="">-- Select Level -- </option>
                                                    @foreach ($facility_levels as $facility_level)
                                                        <option value="{{ $facility_level->id }}" {{ SELECT($facility_level->id, request('facility_level_id')) }}>{{ $facility_level->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td></td>
                                        </tr>
                        
                                        <!-- District ID -->
                                        <tr>
                                            <td>
                                                <label for="districtId" class="form-label">District ID <span style="color: red;">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="districtId" placeholder="Enter district ID" required>
                                            </td>
                                            <td></td>
                                        </tr>
                        
                                        <!-- HUD ID -->
                                        <tr>
                                            <td>
                                                <label for="hudId" class="form-label">HUD ID <span style="color: red;">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="hudId" placeholder="Enter HUD ID" required>
                                            </td>
                                            <td></td>
                                        </tr>
                        
                                        <!-- Block ID -->
                                        <tr>
                                            <td>
                                                <label for="blockId" class="form-label">Block ID <span style="color: red;">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="blockId" placeholder="Enter block ID" required>
                                            </td>
                                            <td></td>
                                        </tr>
                        
                                        <!-- PHC ID -->
                                        <tr>
                                            <td>
                                                <label for="phcId" class="form-label">PHC ID <span style="color: red;">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="phcId" placeholder="Enter PHC ID" required>
                                            </td>
                                            <td></td>
                                        </tr>
                        
                                        <!-- HSC ID -->
                                        <tr>
                                            <td>
                                                <label for="hscId" class="form-label">HSC ID <span style="color: red;">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="hscId" placeholder="Enter HSC ID" required>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        
                            <!-- Buttons -->
                            <div class="d-flex mt-2">
                                <button type="button" class="btn btn-primary" onclick="validateForm()">Submit</button>
                                <button type="button" style="margin-left: 10px;" class="btn btn-danger">Cancel</button>
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
                                        <button type="button" class="btn btn-success"
                                            onclick="submitForm()">Yes, Submit</button>
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
            setPageUrl('/facility_hierarchy?');
        });
    </script>
@endsection
