@extends('admin.layouts.layout')
@section('title', 'View Facility Type')
@section('content')
    <div class="container" style="margin-top: 90px;">
        <div class="container-fluid p-2" style="background-color: #f2f2f2;">
            <div class="d-flex justify-content-between align-items-center" style="padding-left: 20px; padding-right: 20px;">
                <h5 class="mb-0">View Scheme Details</h5>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0" style="background-color: #f2f2f2;">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Scheme View</li>
                    </ol>
                </nav>

            </div>
        </div>

        <div class="container-fluid">
            <div class="page-inner">
                <div class="container mt-2">
                    <!-- insert the contents Here start -->

                    <div class="col-md-12 col-lg-12 p-3">
                        <div class="card border-primary shadow-sm">
                            <div class="card-body">
                                <!-- Heading -->
                                <h4 class="card-title mb-4 text-primary">View Scheme</h4>

                                <!-- Row for Program Title -->
                                <div class="row mb-3 p-3">
                                    <div class="col-md-2 font-weight-bold text-secondary">Program & Division:</div>
                                    <div class="col-md-8 border p-3 rounded bg-light">
                                        {{ $result->scheme->program->name }}
                                    </div>
                                </div>

                                <!-- Row for Name  -->
                                <div class="row mb-3 p-3">
                                    <div class="col-md-2 font-weight-bold text-secondary">Name</div>
                                    <div class="col-md-8 border p-3 rounded bg-light">
                                        {{ $result->scheme->name }}
                                    </div>
                                </div>

                                <!-- Row for Program Title -->


                                <!-- Row for Uploaded Document Name -->
                                <div class="row mb-3 p-3">
                                    <div class="col-md-2 font-weight-bold text-secondary">Uploaded Document Name:</div>
                                    <div class="col-md-7 border p-3 rounded bg-light">
                                        {{ $result->document_url }}
                                    </div>
                                    <div class="col-md-3">
                                        <!-- Use an anchor tag with the download attribute for downloading -->
                                        <a href="{{ filelink($result->document_url) }}" target="_blank"
                                            class="btn btn-primary">View Document</a>
                                    </div>
                                </div>

                                <!-- Row for Related Images -->
                                <div class="row mb-3 p-3">
                                    <div class="col-md-2 font-weight-bold text-secondary">Scheme Related Images:</div>
                                    <div class="col-md-8 d-flex flex-wrap gap-3">
                                        @if ($result->image_one)
                                            <img src="{{ filelink($result->image_one) }}" alt="Related Image 1"
                                                class="img-fluid rounded" style="max-width: 100px; object-fit: cover;">
                                        @endif

                                        @if ($result->image_two)
                                            <img src="{{ filelink($result->image_two) }}" alt="Related Image 2"
                                                class="img-fluid rounded" style="max-width: 100px; object-fit: cover;">
                                        @endif

                                        @if ($result->image_three)
                                            <img src="{{ filelink($result->image_three) }}" alt="Related Image 3"
                                                class="img-fluid rounded" style="max-width: 100px; object-fit: cover;">
                                        @endif

                                        @if ($result->image_four)
                                            <img src="{{ filelink($result->image_four) }}" alt="Related Image 4"
                                                class="img-fluid rounded" style="max-width: 100px; object-fit: cover;">
                                        @endif

                                        @if ($result->image_five)
                                            <img src="{{ filelink($result->image_five) }}" alt="Related Image 5"
                                                class="img-fluid rounded" style="max-width: 100px; object-fit: cover;">
                                        @endif

                                    </div>
                                </div>

                                <!-- Row for Description -->
                                <div class="row mb-3 p-3">
                                    <div class="col-md-2 font-weight-bold text-secondary">Description</div>
                                    <div class="col-md-8 border p-3 rounded bg-light">
                                        {{ $result->description }}
                                    </div>
                                </div>

                                <!-- Row for Related Images -->
                                <div class="row mb-3 p-3">
                                    <div class="col-md-2 font-weight-bold text-secondary">Performance report Images</div>
                                    <div class="col-md-8 d-flex flex-wrap gap-3">
                                        @if ($result->report_image_one)
                                            <img src="{{ filelink($result->report_image_one) }}" alt="Related Image 1"
                                                class="img-fluid rounded" style="max-width: 100px; object-fit: cover;">
                                        @endif

                                        @if ($result->report_image_two)
                                            <img src="{{ filelink($result->report_image_two) }}" alt="Related Image 2"
                                                class="img-fluid rounded" style="max-width: 100px; object-fit: cover;">
                                        @endif

                                        @if ($result->report_image_three)
                                            <img src="{{ filelink($result->report_image_three) }}" alt="Related Image 3"
                                                class="img-fluid rounded" style="max-width: 100px; object-fit: cover;">
                                        @endif

                                        @if ($result->report_image_four)
                                            <img src="{{ filelink($result->report_image_four) }}" alt="Related Image 4"
                                                class="img-fluid rounded" style="max-width: 100px; object-fit: cover;">
                                        @endif

                                        @if ($result->report_image_five)
                                            <img src="{{ filelink($result->report_image_five) }}" alt="Related Image 5"
                                                class="img-fluid rounded" style="max-width: 100px; object-fit: cover;">
                                        @endif
                                    </div>
                                </div>

                                <!-- Row for Status -->
                                <div class="row mb-3 p-3">
                                    <div class="col-md-2 font-weight-bold text-secondary">Status:</div>
                                    <div class="col-md-8">
                                        <span class="badge {{ $result->status == 1 ? 'bg-success' : 'bg-danger' }} text-light"> {{ $result->status == 1 ? 'Active' : 'Inactive' }}</span>
                                    </div>
                                </div>

                                <!-- Row for Back Button -->
                                <button type="button" class="btn btn-primary px-5 py-2 mt-5"
                                    onclick="window.location.href='{{route('schemedetails.index')}}'">Back</button>
                            </div>
                        </div>
                    </div>

                    <!-- insert the contents Here end -->
                </div>
                <!-- page inner end-->
            </div>
            <!-- database table end -->
        </div>

        <!-- content end here -->


        <footer class="footer">
            <div class="container-fluid d-flex justify-content-center align-items-center">
                <div class="copyright">
                    <p> Copyright © 2024 <a target="_blank" href="http://tansam.org/">TANSAM</a>. All Rights
                        Reserved.Created
                        By
                        TANSAM IT DEPARTMENT </p>
                </div>

            </div>
        </footer>
        <!-- main panel end -->
    </div>
@endsection
