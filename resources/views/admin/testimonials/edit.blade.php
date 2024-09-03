@extends('admin.layouts.layout')
@section('title', 'Create Director Message')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('packa/theme/assets/node_modules/html5-editor/bootstrap-wysihtml5.css') }}" />
    </head>
    <div class="container" style="margin-top: 90px;">
        <div class="container-fluid p-2" style="background-color:#f2f2f2;">
            <h5 style="margin-left: 20px;">Edit Director Message</h5>
        </div>
        <div class="container-fluid">
            <div class="page-inner">
                <!-- insert the contents Here start -->

                <div class="container">
                    <div class="row">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="col-lg-12 p-5" style="background-color: #ffffff; border-radius: 10px;">
                            <form action="{{route('testimonials.update',$result->id)}}" enctype="multipart/form-data" method="post"
                                id="myForm">
                                {{csrf_field()}} @method('PUT')
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <!-- Name -->
                                            <tr>
                                                <td>
                                                    <label for="name" class="form-label">Name <span
                                                            style="color: red;">*</span></label>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="name"
                                                        placeholder="Enter your name"
                                                        value="{{ old('name', $result->name) }}" name="name" required>
                                                </td>
                                            </tr>

                                            <!-- Designation -->
                                            <tr>
                                                <td>
                                                    <label for="designation" class="form-label">Designation <span
                                                            style="color: red;">*</span></label>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="designation"
                                                        name="designation" placeholder="Enter your designation"
                                                        value="{{ old('designation', $result->designation) }}" required>
                                                </td>
                                            </tr>

                                            <!-- Content -->
                                            <tr>
                                                <td>
                                                    <label for="content" class="form-label">Content <span
                                                            style="color: red;">*</span></label>
                                                </td>
                                                <td>
                                                    <textarea class="textarea_editor form-control" style="width: 100%" name="content" id="content" rows="15"
                                                        placeholder="Enter content here" required>{!! old('content', $result->content) !!}</textarea>
                                                </td>
                                            </tr>

                                            <!-- Profile Image and Preview -->
                                            <tr>
                                                <td>
                                                    <label for="profileImage" class="form-label">Profile Image <span
                                                            style="color: red;">*</span></label>
                                                </td>
                                                <td>
                                                    <input type="file" class="form-control" name="testimonial_image"
                                                        id="profileImage" accept="image/*"
                                                        value="{{old('image_url',$result->image_url)}}">
                                                    <small style="color: red;">Accepted .jpg/.jpeg/.png format & allowed max
                                                        size is 5MB</small>
                                                </td>
                                                <td>
                                                    <img src="{{fileLink($result->image_url)}}" alt="Image Preview"
                                                        class="img-fluid" height="100" width="100">
                                                </td>
                                            </tr>

                                            <!-- Select Profile Document -->
                                            <tr>
                                                <td>
                                                    <label for="profileDocument" class="form-label">Select Profile Document
                                                        <span style="color: red;">*</span></label>
                                                </td>
                                                <td>
                                                    <input type="file" name="testimonial_document" class="form-control"
                                                        id="profileDocument" accept=".pdf,.doc,.docx">
                                                </td>


                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="publicVisibility" class="form-label">Visible to
                                                        Public</label>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="status"
                                                            id="publicVisibility" checked>
                                                        <label class="form-check-label" for="publicVisibility">Yes</label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Buttons -->
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-danger"
                                        href="{{ route('testimonials.index') }}">Cancel</button>
                                </div>
                            </form>

                            <!-- Confirmation Modal -->
                            <div class="modal fade" id="confirmationModal" tabindex="-1"
                                aria-labelledby="confirmationModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center position-relative">
                                            <h5 class="modal-title" id="confirmationModalLabel">Confirm Submission</h5>
                                            <button type="button" class="btn-close position-absolute end-0 me-3"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <div class="confirmation-icon mb-4">
                                                <i class="fas fa-check-circle fa-4x text-success"></i>
                                            </div>
                                            <p class="mb-4">Are you sure you want to submit the form?</p>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-success" onclick="submitForm()">Yes,
                                                Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Confirmation Modal end -->
                        </div>
                    </div>
                </div>

                <!-- insert the contents Here end -->
            </div>
            <!-- page inner end-->
        </div>
        <!-- database table end -->
    </div>
    <script src="{{ asset('packa/theme/assets/node_modules/html5-editor/wysihtml5-0.3.0.js') }}"></script>
    <script src="{{ asset('packa/theme/assets/node_modules/html5-editor/bootstrap-wysihtml5.js') }}"></script>
    <script>
        document.getElementById('profileImage').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                const imagePreview = document.getElementById('imagePreview');
                imagePreview.src = URL.createObjectURL(file);
                imagePreview.style.display = 'block';
            }
        });
    </script>
    <script>
        $(document).ready(function() {

            $('.textarea_editor').wysihtml5();
        });
    </script>
@endsection
