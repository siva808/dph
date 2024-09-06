@extends('admin.layouts.layout')

@section('title', 'Edit Configuration')

@section('content')
    <div class="container" style="margin-top: 90px;">
        <div class="container-fluid p-2" style="background-color: #f2f2f2;">
            <div class="d-flex justify-content-between align-items-center" style="padding-left: 20px; padding-right: 20px;">
                <h5 class="mb-0">Configuration</h5>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0" style="background-color: #f2f2f2;">
                        <li class="breadcrumb-item"><a href="#">Configuration</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Footer</li>
                    </ol>
                </nav>

            </div>
        </div>

        <div class="container-fluid">
            <div class="page-inner">
                <!-- insert the contents Here start -->



                <div class="container-fluid mt-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-10"
                            style="background: linear-gradient(to right, #ffffff, #ffffff); border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">

                            <form action="{{ url('footer/update/' . $result->id) }}" enctype="multipart/form-data"
                                method="post">
                                {{ csrf_field() }}
                                <!-- Table Layout -->

                                <!-- Image Preview Container -->
                                <div class="table-responsive mt-4">
                                    <h5>Logo In Footer</h5>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Logo Title</th>
                                                <th>Input</th>
                                                <th>Status</th>
                                                <th>Image Preview</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Logo Uploads -->
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control shadow-sm"
                                                        name="footer_logo_one_title" id="footer_logo_one_title"
                                                        placeholder="Enter logo title"
                                                        value="{{ old('footer_logo_one_title', $result->footer_logo_one_title) }}">
                                                </td>
                                                <td>
                                                    <input type="file" class="form-control shadow-sm" id="logo1"
                                                        accept="image/*" name="footer_logo_one"
                                                        onchange="previewImage(event, 'imagePreviewLogo1')">
                                                    <small style="color: red;">Accepted .jpg/.jpeg/.png format &
                                                        allowed max size is 5MB</small>
                                                </td>

                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="statusLogo1"
                                                            name="footer_logo_one_status" value="1"
                                                            {{ CHECKBOX('footer_logo_one_status', $result->footer_logo_one_status) }}
                                                            onchange="toggleStatusText('statusLabelLogo1', this)">
                                                        <label class="form-check-label" for="statusLogo1"
                                                            id="statusLabelLogo1">{{ $result->footer_logo_one_status == 1 ? 'Active' : 'In-Active' }}</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div id="imagePreviewContainer" style="display: {{ fileLink($result->footer_logo_one) ? 'block' : 'none' }};">
                                                        <img id="imagePreviewLogo1"
                                                            src="{{ fileLink($result->footer_logo_one) }}"
                                                            alt="Image Preview" class="img-fluid rounded border shadow-sm"
                                                            style="max-width: 100px;"
                                                            onclick="showImageModal('imagePreviewLogo1')">
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>

                                <!-- Image Modal -->
                                <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="modalImage" src="#" alt="Image Preview" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Separate div for Government and DPH Names -->
                                <div class="mb-4 pt-4">
                                    <h5 class="mb-4">Footer Details</h5>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="govNameTamilfooter" class="form-label font-weight-bold">Government
                                                Name (Tamil)
                                                <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control shadow-sm" id="govNameTamilfooter"
                                                placeholder="Enter government name in Tamil" name="footer_gov_name_tamil"
                                                required
                                                value="{{ old('footer_gov_name_tamil', $result->footer_gov_name_tamil) }}">
                                        </div>
                                        {{-- <div class="col-md-6 d-flex align-items-end">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                    id="statusGovNameTamilfooter" checked
                                                    onchange="toggleStatusText('statusLabelGovNameTamilfooter', this)">
                                                <label class="form-check-label" for="statusGovNameTamilfooter"
                                                    id="statusLabelGovNameTamilfooter">Active</label>
                                            </div>
                                        </div> --}}
                                    </div>

                                    <!-- Telephone Start -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="Footertelephone" class="form-label font-weight-bold">Office
                                                Telephone <span style="color: red;">*</span></label>
                                            <input type="tel" class="form-control shadow-sm" id="Footertelephone"
                                                placeholder="Enter Telephone Number"
                                                value="{{ old('dph_phone', $result->dph_phone) }}" name="dph_phone"
                                                required>
                                        </div>
                                        {{-- <div class="col-md-6 d-flex align-items-end">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="telephonefooter"
                                                    checked onchange="toggleStatusText('statusLabelTelephone', this)">
                                                <label class="form-check-label" for="telephonefooter"
                                                    id="statusLabelTelephone">Active</label>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <!-- Telephone End -->

                                    <!-- Address Start -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="FooterAddress" class="form-label font-weight-bold">Address <span
                                                    style="color: red;">*</span></label>
                                            <textarea class="form-control shadow-sm" id="FooterAddress" name="dph_address" placeholder="Enter Address"
                                                rows="2" required>{{ old('dph_address', $result->dph_address) }}</textarea>
                                        </div>
                                        {{-- <div class="col-md-6 d-flex align-items-end">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="addressActive"
                                                    checked onchange="toggleStatusText('statusLabelAddress', this)">
                                                <label class="form-check-label" for="addressActive"
                                                    id="statusLabelAddress">Active</label>
                                            </div>
                                        </div> --}}
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="FooterZipcode" class="form-label font-weight-bold">Zipcode <span
                                                    style="color: red;">*</span></label>
                                            <input type="text" class="form-control shadow-sm" id="FooterZipcode"
                                                name="dph_zip_code"
                                                value="{{ old('dph_zip_code', $result->dph_zip_code) }}"
                                                placeholder="Enter Zipcode" required>
                                        </div>
                                        {{-- <div class="col-md-6 d-flex align-items-end">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="zipcodeActive"
                                                    checked onchange="toggleStatusText('statusLabelZipcode', this)">
                                                <label class="form-check-label" for="zipcodeActive"
                                                    id="statusLabelZipcode">Active</label>
                                            </div>
                                        </div> --}}
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="FooterCity" class="form-label font-weight-bold">City
                                                <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control shadow-sm" id="FooterCity"
                                                name="dph_city" value="{{ old('dph_city', $result->dph_city) }}"
                                                placeholder="Enter City" required>
                                        </div>
                                        {{-- <div class="col-md-6 d-flex align-items-end">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="cityActive" checked
                                                    onchange="toggleStatusText('statusLabelCity', this)">
                                                <label class="form-check-label" for="cityActive"
                                                    id="statusLabelCity">Active</label>
                                            </div>
                                        </div> --}}
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="FooterState" class="form-label font-weight-bold">State
                                                <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control shadow-sm" id="FooterState"
                                                name="dph_state"
                                                value="{{ old('dph_state', $result->dph_state) }}"
                                                placeholder="Enter State" required>
                                        </div>
                                        <div class="col-md-6 d-flex align-items-end">
                                            {{-- <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="stateActive" checked
                                                    onchange="toggleStatusText('statusLabelState', this)">
                                                <label class="form-check-label" for="stateActive"
                                                    id="statusLabelState">Active</label>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <!-- Address End -->
                                </div>
                                <hr>

                                <!-- Separate div for web info start-->
                                <div class="mb-4 pt-4">
                                    <h5 class="mb-4">Web Information Manager, Joint Director - HEB</h5>

                                    <!-- Mobile Start -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="Footertelephone" class="form-label font-weight-bold">Mobile <span
                                                    style="color: red;">*</span></label>
                                            <input type="tel" class="form-control shadow-sm" id="Footertelephone"
                                                name="joint_director_phone"
                                                value="{{ old('joint_director_phone', $result->joint_director_phone) }}"
                                                placeholder="Enter Telephone Number" required>
                                        </div>
                                        {{-- <div class="col-md-6 d-flex align-items-end">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="mobileActive" checked
                                                    onchange="toggleStatusText('statusLabelMobile', this)">
                                                <label class="form-check-label" for="mobileActive"
                                                    id="statusLabelMobile">Active</label>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <!-- Mobile End -->

                                    <!-- Email Start -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="Footeremail" class="form-label font-weight-bold">Email
                                                <span style="color: red;">*</span></label>
                                            <input type="email" class="form-control shadow-sm" id="Footeremail"
                                                name="joint_director_email"
                                                value="{{ old('joint_director_email', $result->joint_director_email) }}"
                                                placeholder="Enter Email Address" required>
                                        </div>
                                        {{-- <div class="col-md-6 d-flex align-items-end">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="emailfooter" checked
                                                    onchange="toggleStatusText('statusLabelEmail', this)">
                                                <label class="form-check-label" for="emailfooter"
                                                    id="statusLabelEmail">Active</label>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <!-- Email End -->
                                </div>

                            <!-- Submit Button for the Entire Form -->
                            <div class="mt-4 mb-4">
                                <button type="submit" class="btn btn-primary btn-lg shadow-sm">Submit</button>
                                <button type="button" class="btn btn-danger btn-lg shadow-sm">Cancel</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>

                <!-- insert the contents Here end -->
            </div>
            <!-- page inner end-->
        </div>
        <!-- database table end -->
    </div>
    <!--JavaScript for image preview start -->
    <script>
        function previewImage(event, previewId) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById(previewId);
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <!-- script for allowing only number end -->
    <script>
        // Function to preview image
        function previewImage(event, imagePreviewId) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById(imagePreviewId);
                var container = document.getElementById('imagePreviewContainer');

                output.src = dataURL;
                output.style.display = 'block';
                container.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }

        // Function to show image modal
        function showImageModal(imagePreviewId) {
            var image = document.getElementById(imagePreviewId);
            var modalImage = document.getElementById('modalImage');

            modalImage.src = image.src;

            var imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
            imageModal.show();
        }
    </script>

@endsection
