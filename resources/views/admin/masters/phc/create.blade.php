@extends('admin.layouts.layout')
@section('title', 'Create Phc')
@section('content')
<div class="container" style="margin-top: 90px;">
    <div class="container-fluid p-2" style="background-color: #f2f2f2;">
        <div class="d-flex justify-content-between align-items-center"
            style="padding-left: 20px; padding-right: 20px;">
            <h5 class="mb-0">PHC</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0" style="background-color: #f2f2f2;">
                    <li class="breadcrumb-item"><a href="#">PHC</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create PHC</li>
                </ol>
            </nav>

        </div>
    </div>
    <div class="container-fluid">
        <div class="page-inner">
            <!-- insert the contents Here start -->

            <div class="container-fluid mt-2">
                <div class="row">
                    <div class="col-lg-5 py-5 px-5" style="background-color: #ffffff; border-radius: 10px;">
                        <form id="urbanForm">
                            <div class="container">
                                <h4 class="card-title mb-4 text-primary">PHC (Public Health Center)</h4>

                                <!-- Is Urban (Toggle Switch) Row -->
                                <div class="row mb-3">
                                    <!-- <div class="col-12 col-md-3">
                                        <label for="isUrban" class="form-label">Is Urban? <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="isUrban" checked
                                                onchange="toggleUrbanStatus('urbanLabel', this)">
                                            <label class="form-check-label" for="isUrban" id="urbanLabel">Yes</label>
                                        </div>
                                    </div> -->
                                </div>

                                <!-- name Row -->
                                <div class="row mb-3">
                                    <div class="col-12 col-md-3">
                                        <label for="phcname" class="form-label">Name</label>
                                    </div>
                                    <div class="col-12 col-md-10">
                                        <input type="text" class="form-control" name="name" id="phcname"
                                            placeholder="Enter name">
                                    </div>
                                </div>

                                <!-- Block Row as Dropdown -->
                                <div class="row mb-3">
                                    <div class="col-12 col-md-3">
                                        <label for="block" class="form-label">Block<span
                                                style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-12 col-md-10">
                                        <select class="form-control" id="block" name="block_id">
                                            <option value="" disabled selected>Select Block</option>
                                            <option value="Ariyalur">Ariyalur</option>
                                            <option value="Chengalpattu">Chengalpattu</option>
                                            <option value="Chennai">Chennai</option>
                                            <option value="Coimbatore">Coimbatore</option>
                                            <option value="Cuddalore">Cuddalore</option>
                                            <option value="Dharmapuri">Dharmapuri</option>
                                            <option value="Dindigul">Dindigul</option>
                                            <option value="Erode">Erode</option>
                                            <option value="Kallakurichi">Kallakurichi</option>
                                            <option value="Kancheepuram">Kancheepuram</option>
                                            <option value="Karur">Karur</option>
                                            <option value="Krishnagiri">Krishnagiri</option>
                                            <option value="Madurai">Madurai</option>
                                            <option value="Nagapattinam">Nagapattinam</option>
                                            <option value="Kanyakumari">Kanyakumari</option>
                                            <option value="Namakkal">Namakkal</option>
                                            <option value="Nilgiris">Nilgiris</option>
                                            <option value="Perambalur">Perambalur</option>
                                            <option value="Pudukkottai">Pudukkottai</option>
                                            <option value="Ramanathapuram">Ramanathapuram</option>
                                            <option value="Ranipet">Ranipet</option>
                                            <option value="Salem">Salem</option>
                                            <option value="Sivaganga">Sivaganga</option>
                                            <option value="Tenkasi">Tenkasi</option>
                                            <option value="Thanjavur">Thanjavur</option>
                                            <option value="Theni">Theni</option>
                                            <option value="Thiruvallur">Thiruvallur</option>
                                            <option value="Thiruvarur">Thiruvarur</option>
                                            <option value="Thoothukudi">Thoothukudi</option>
                                            <option value="Tiruchirappalli">Tiruchirappalli</option>
                                            <option value="Tirunelveli">Tirunelveli</option>
                                            <option value="Tirupathur">Tirupathur</option>
                                            <option value="Tiruppur">Tiruppur</option>
                                            <option value="Tiruvannamalai">Tiruvannamalai</option>
                                            <option value="Vellore">Vellore</option>
                                            <option value="Viluppuram">Viluppuram</option>
                                            <option value="Virudhunagar">Virudhunagar</option>
                                        </select>
                                    </div>
                                </div>



                                <!-- Status Row -->
                                <div class="row mb-3">
                                    <div class="col-12 mt-2 col-md-3">
                                        <label for="status" class="form-label">Status</label>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                id="toggleStatus" checked
                                                onchange="toggleStatusText('statusLabel', this)">
                                            <label class="form-check-label" for="toggleStatus"
                                                id="statusLabel">Active</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Select Image Row -->
                                <!-- <div class="row mb-3">
                                    <div class="col-12 col-md-3">
                                        <label for="selectImage" class="form-label">Select Image</label>
                                    </div>
                                    <div class="col-12 col-md-7">
                                        <input type="file" class="form-control" id="selectImage" accept="image/*">
                                    </div>
                                </div> -->

                                <!-- Video URL Row -->
                                <!-- <div class="row mb-3">
                                    <div class="col-12 col-md-3">
                                        <label for="videoUrl" class="form-label">Video URL</label>
                                    </div>
                                    <div class="col-12 col-md-7">
                                        <input type="url" class="form-control" id="videoUrl" placeholder="Enter video URL">
                                    </div>
                                </div> -->

                                <!-- Map Location URL Row -->
                                <!-- <div class="row mb-3">
                                    <div class="col-12 col-md-3">
                                        <label for="mapLocation" class="form-label">Map Location URL</label>
                                    </div>
                                    <div class="col-12 col-md-7">
                                        <input type="url" class="form-control" id="mapLocation" placeholder="Enter map location URL">
                                    </div>
                                </div> -->

                                <!-- Land Document Row -->
                                <!-- <div class="row mb-3">
                                    <div class="col-12 col-md-3">
                                        <label for="landDocument" class="form-label">Land Document</label>
                                    </div>
                                    <div class="col-12 col-md-7">
                                        <input type="file" class="form-control" id="landDocument" accept=".pdf, .doc, .docx">
                                    </div>
                                </div> -->

                                <!-- Buttons -->
                                <div class="d-flex mt-2">
                                    <button type="button" class="btn btn-primary"
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
                                        <button type="button" class="btn btn-success"
                                            onclick="submitForm()">Yes, Submit</button>
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
@endsection
