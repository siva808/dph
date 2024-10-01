@extends('admin.layouts.layout')
@section('title', 'Create Scheme Details')
@section('content')
<div class="container" style="margin-top: 90px;">
    <div class="container-fluid p-2" style="background-color: #f2f2f2;">
        <div class="d-flex justify-content-between align-items-center"
            style="padding-left: 20px; padding-right: 20px;">
            <h5 class="mb-0">Schemes</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0" style="background-color: #f2f2f2;">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Schemes Create</li>
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

            <!-- description start============================================================ -->
            <div class="container mt-2">
                <div class="row">
                    <div class="col-lg-12 p-5" style="background-color: #ffffff; border-radius: 10px;">
                        <form id="combinedForm" action="{{route('schemedetails.store')}}" enctype="multipart/form-data" method="post">
                            {{csrf_field()}}
                            <div class="container">
                                <h4 class="card-title mb-4 text-primary">Create Scheme Details</h4>

                                <!-- Main Menu Dropdown Row -->
                                <div class="row mb-3">
                                    <div class="col-12 col-md-3">
                                        <label for="mainmenu" class="form-label">Programs & Division</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <select name="program_id" id="program_id" class="form-control">
                                            <option value="">-- Select Program -- </option>
                                            @foreach ($programs as $key => $value)
                                                <option value="{{ $value->id }}"
                                                    {{ SELECT($value->id, old('program_id')) }}>
                                                    {{ $value->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Main Menu Dropdown Row -->
                                <div class="row mb-3">
                                    <div class="col-12 col-md-3">
                                        <label for="mainmenu" class="form-label">Schemes<span
                                                style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <select name="scheme_id" id="scheme_id" class="form-control">
                                            <option value="">-- Select Scheme -- </option>
                                            @foreach ($schemes as $key => $value)
                                                <option value="{{ $value->id }}"
                                                    {{ SELECT($value->id, old('scheme_id')) }}>
                                                    {{ $value->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Description Text Area -->
                                <div class="row mb-3">
                                    <div class="col-12 col-md-3">
                                        <label for="description" class="form-label">Description <span
                                                style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <textarea class="form-control" id="description" rows="4"
                                            placeholder="Enter description" name="description" required></textarea>
                                    </div>
                                </div>

                                <!-- Image Upload Section -->
                                <div class="row mb-3">
                                    <div class="col-12 col-md-3">
                                        <label for="imageUploads" class="form-label">Select Images <span
                                                style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input type="file" id="imageUploads" name="images[]" class="form-control"
                                            accept="image/*" multiple onchange="previewImages()" required>
                                    </div>
                                </div>

                                <!-- Image Preview Section -->
                                <div class="row mb-3">
                                    <div class="col-12 col-md-7 offset-md-3">
                                        <div id="imagePreviews" class="d-flex flex-wrap"></div>
                                        <small class="sizeoftextred">Upload upto 5 images only, Accepted formats: .jpg .jpeg .png, Max size: 5MB</small>
                                    </div>
                                </div>

                                <!-- Upload Document Row -->
                                <div class="row mb-3">
                                    <div class="col-12 col-md-3">
                                        <label for="document" class="form-label">Upload Document</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input type="file" class="form-control" id="document" name="document"
                                            accept=".pdf,.doc,.docx" required>
                                            <small class="sizeoftextred">Accepted formats: .pdf, Max size: 5MB</small>
                                    </div>
                                </div>

                                <!-- Report Image Upload Section -->
                                <div class="row mb-3">
                                    <div class="col-12 col-md-3">
                                        <label for="imageUploads" class="form-label">Select Report Images<span
                                                style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input type="file" id="imageUploads" class="form-control" name="report_images[]"
                                            accept="image/*" multiple onchange="previewReportImages()" required>
                                    </div>
                                </div>

                                <!-- Report Image Preview Section -->
                                <div class="row mb-3">
                                    <div class="col-12 col-md-7 offset-md-3">
                                        <div id="reportImagePreviews" class="d-flex flex-wrap"></div>
                                        <small class="sizeoftextred">Upload upto 5 images only, Accepted formats: .jpg .jpeg .png                                   , Max size: 5MB</small>
                                    </div>
                                </div>

                                <!-- Status Row -->
                                <div class="row mb-3">
                                    <div class="col-12 col-md-3">
                                        <label for="status" class="form-label">Status <span
                                                style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                id="toggleStatus" value="1"
                                                onchange="toggleStatusText('statusLabel', this)">
                                            <label class="form-check-label" for="toggleStatus"
                                                id="statusLabel">Active</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="d-flex mt-2 pl-5">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <!-- <button type="button" style="margin-left: 10px;" class="btn btn-danger">Cancel</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- insert the contents Here end -->
    </div>
    <!-- page inner end-->
</div>
<script>
    function previewImages() {
            const imagePreview = document.getElementById("imagePreviews");
            const files = document.getElementById("imageUploads").files;

            // Loop through all selected files
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function (e) {
                    // Create a wrapper div for image and close button
                    const previewWrapper = document.createElement("div");
                    previewWrapper.classList.add("position-relative", "m-2");
                    previewWrapper.style.width = "150px";
                    previewWrapper.style.height = "150px";

                    // Create the image element
                    const img = document.createElement("img");
                    img.src = e.target.result;
                    img.classList.add("img-thumbnail");
                    img.style.width = "100%";
                    img.style.height = "100%";

                    // Create the close button
                    const closeButton = document.createElement("span");
                    closeButton.innerHTML = "&times;";
                    closeButton.classList.add("remove-button");

                    // Add event listener to remove the image on clicking the close button
                    closeButton.onclick = function () {
                        imagePreview.removeChild(previewWrapper);
                    };

                    // Append the image and close button to the wrapper div
                    previewWrapper.appendChild(img);
                    previewWrapper.appendChild(closeButton);

                    // Append the wrapper div to the image preview container
                    imagePreview.appendChild(previewWrapper);
                };

                reader.readAsDataURL(file);
            }
        }

        function previewReportImages() {
            const reportImagePreview = document.getElementById("reportImagePreviews");
            const files = document.getElementById("imageUploads").files;

            // Loop through all selected files
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function (e) {
                    // Create a wrapper div for image and close button
                    const previewWrapper = document.createElement("div");
                    previewWrapper.classList.add("position-relative", "m-2");
                    previewWrapper.style.width = "150px";
                    previewWrapper.style.height = "150px";

                    // Create the image element
                    const img = document.createElement("img");
                    img.src = e.target.result;
                    img.classList.add("img-thumbnail");
                    img.style.width = "100%";
                    img.style.height = "100%";

                    // Create the close button
                    const closeButton = document.createElement("span");
                    closeButton.innerHTML = "&times;";
                    closeButton.classList.add("remove-button");

                    // Add event listener to remove the image on clicking the close button
                    closeButton.onclick = function () {
                        reportImagePreview.removeChild(previewWrapper);
                    };

                    // Append the image and close button to the wrapper div
                    previewWrapper.appendChild(img);
                    previewWrapper.appendChild(closeButton);

                    // Append the wrapper div to the image preview container
                    reportImagePreview.appendChild(previewWrapper);
                };

                reader.readAsDataURL(file);
            }
        }
</script>
@endsection
