@extends('admin.layouts.layout')
@section('title', 'Edit Scheme')
@section('content')
    <div class="container" style="margin-top: 90px;">
        <div class="container-fluid p-2" style="background-color: #f2f2f2;">
            <div class="d-flex justify-content-between align-items-center" style="padding-left: 20px; padding-right: 20px;">
                <h5 class="mb-0">Schemes</h5>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0" style="background-color: #f2f2f2;">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Scheme Details Edit</li>
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
                            <form id="combinedForm" action="{{ route('schemedetails.update', $result->id) }}"
                                enctype="multipart/form-data" method="post">
                                {{ csrf_field() }}
                                @method('PUT')
                                <div class="container">
                                    <h4 class="card-title mb-4 text-primary">Edit Scheme Details</h4>


                                    <!-- Schemes Dropdown Row -->
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-3">
                                            <label for="mainmenu" class="form-label">Programs></label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <select name="programs_id" id="programs_id" class="form-control">
                                                <option value="">-- Select Programs -- </option>
                                                @foreach ($schemes as $scheme)
                                                    <option value="{{ $scheme->programs_id }}"
                                                        {{ SELECT($scheme->programs_id, old('programs_id', $result->scheme->programs_id)) }}>
                                                        {{ $scheme->program->name ?? 'N/A' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Schemes Dropdown Row -->
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-3">
                                            <label for="mainmenu" class="form-label">Schemes<span
                                                    style="color: red;">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <select name="scheme_id" id="schemes_id" class="form-control">
                                                <option value="">-- Select Shemes -- </option>
                                                @foreach ($schemes as $key => $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ SELECT($value->id, old('schemes_id', $result->schemes_id)) }}>
                                                        {{ $value->name }}</option>
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
                                            <textarea class="form-control" id="description" rows="4" placeholder="Enter description" name="description"
                                                required>{{ old('description', $result->description) }}</textarea>
                                        </div>
                                    </div>

                                    <!-- Image Upload Section -->
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-3">
                                            <label for="imageUploads" class="form-label">Select Images <span
                                                    style="color: red;">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="file" id="imageUploads" class="form-control" accept="image/*"
                                                multiple onchange="previewImages()" name="images[]">
                                            <small class="sizeoftextred">Upload Max 5 Images,Accepted file types
                                                .jpg/.jpeg/.png</small>
                                        </div>
                                    </div>

                                    <!-- Image Preview Section -->
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-7 offset-md-3">
                                            <div id="imagePreviews" class="d-flex flex-wrap"></div>
                                            @foreach (['image_one', 'image_two', 'image_three', 'image_four', 'image_five'] as $imageField)
                                                @if ($result->$imageField)
                                                    <div class="position-relative m-2" style="width: 150px; height: 150px;">
                                                        <img src="{{ filelink($result->$imageField) }}"
                                                            class="img-thumbnail" style="width: 100%; height: 100%;">
                                                        <span
                                                            onclick="removeImage('{{ $imageField }}', '{{ $result->id }}')"
                                                            class="remove-button position-absolute top-0 end-0 p-1 text-white bg-danger rounded-circle cursor-pointer">&times;</span>
                                                    </div>
                                                @endif
                                            @endforeach
                                            <!-- <small class="sizeoftextred">Accepted formats: .png, Max size: 5MB</small> -->
                                        </div>
                                    </div>

                                    <!-- Upload Document Row -->
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-3">
                                            <label for="document" class="form-label">Upload Document</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="file" class="form-control" id="document" name="document"
                                                accept=".pdf,.doc,.docx">
                                            <small class="sizeoftextred">Accepted formats: .png, Max size:
                                                5MB</small>
                                            @if ($result->document_url)
                                                <div class="mt-2">
                                                    <a href="{{ filelink($result->document_url) }}" target="_blank"
                                                        class="btn btn-info btn-sm">
                                                        View Document
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Performance Report Row -->
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-3">
                                            <label for="reportimageUploads" class="form-label">Performance
                                                report Images</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="file" id="reportimageUploads" class="form-control"
                                                name="report_images[]" accept="image/*" multiple
                                                onchange="reportPreviewImages()">
                                            <small class="sizeoftextred">Upload Max 5 Images, Accepted file
                                                types .jpg/.jpeg/.png</small>
                                            <!-- Preview container for report images -->

                                            <div id="reportImagePreviews" class="d-flex flex-wrap mt-2"></div>
                                            @foreach (['report_image_one', 'report_image_two', 'report_image_three', 'report_image_four', 'report_image_five'] as $reportImageField)
                                                @if ($result->$reportImageField)
                                                    <div class="position-relative m-2"
                                                        style="width: 150px; height: 150px;">
                                                        <img src="{{ filelink($result->$reportImageField) }}"
                                                            class="img-thumbnail" style="width: 100%; height: 100%;">
                                                        <span
                                                            onclick="removeImage('{{ $reportImageField }}', '{{ $result->id }}')"
                                                            class="remove-button position-absolute top-0 end-0 p-1 text-white bg-danger rounded-circle cursor-pointer">&times;</span>
                                                    </div>
                                                @endif
                                            @endforeach

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
                                                <input class="form-check-input " name="status" type="checkbox"
                                                    id="toggleStatus" value="1"
                                                    {{ CHECKBOX('status', $result->status) }}
                                                    onchange="toggleStatusText('statusLabel', this)">
                                                <label class="form-check-label" for="toggleStatus"
                                                    id="statusLabel">{{ $result->status == 1 ? 'Active' : 'In-Active' }}</label>
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
        </div>
        <!-- page inner end-->
    </div>

    <script>
        let selectedFiles = [];

        function previewImages() {
            const imagePreview = document.getElementById("imagePreviews");
            const files = document.getElementById("imageUploads").files;

            // Get the current number of previewed images
            const currentImageCount = imagePreview.childElementCount;

            // Check if the total number of images (current + new) exceeds 5
            if (currentImageCount + files.length > 5) {
                alert("You can upload a maximum of 5 images.");
                return; // Prevent further execution if limit exceeded
            }

            // Loop through all selected files
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();
                selectedFiles.push(file);

                reader.onload = function(e) {
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
                    closeButton.onclick = function() {
                        imagePreview.removeChild(previewWrapper);
                        const fileIndex = selectedFiles.indexOf(file);
                        if (fileIndex > -1) {
                            selectedFiles.splice(fileIndex, 1);
                        }

                        // Optionally clear the input field if no files are selected
                        if (selectedFiles.length === 0) {
                            document.getElementById("imageUploads").value = '';
                        }
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

        function removeImage(imageField, schemeDetailsId) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/schemedetails/${schemeDetailsId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken // Include CSRF token in headers
                    },
                    body: JSON.stringify({
                        image_field: imageField
                    }) // Send image field to remove
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    // Check if there is a response body
                    return response.text();
                })
                .then(data => {
                    if (data) {
                        console.log('Response data:', data);
                    } else {
                        console.log('No response data received');
                    }
                    // Reload the page upon successful image removal
                    location.reload();
                })
                .catch(error => {
                    console.error('Error removing image:', error);
                    alert('An error occurred while removing the image. Please try again.');
                });
        }
    </script>

    <script>
        function reportPreviewImages() {
            const imagePreview = document.getElementById("reportImagePreviews");
            const files = document.getElementById("reportimageUploads").files;

            // Get the current number of previewed images
            const currentImageCount = imagePreview.childElementCount;

            // Check if the total number of images (current + new) exceeds 5
            if (currentImageCount + files.length > 5) {
                alert("You can upload a maximum of 5 images.");
                return; // Prevent further execution if limit exceeded
            }

            // Loop through all selected files
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function(e) {
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
                    closeButton.classList.add("remove-button", "position-absolute", "top-0", "end-0", "p-1",
                        "text-white", "bg-danger", "rounded-circle", "cursor-pointer");

                    // Add event listener to remove the image on clicking the close button
                    closeButton.onclick = function() {
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
    </script>
@endsection
