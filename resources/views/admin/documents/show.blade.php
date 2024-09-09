@extends('admin.layouts.layout')
@section('title', 'View Document')
@section('content')
    <div class="container" style="margin-top: 90px;">
        <div class="container-fluid p-2" style="background-color: #f2f2f2;">
            <div class="d-flex justify-content-between align-items-center" style="padding-left: 20px; padding-right: 20px;">
                <h5 class="mb-0">Documents</h5>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0" style="background-color: #f2f2f2;">
                        <li class="breadcrumb-item"><a href="#">Documents</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Documents</li>
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
                                <h4 class="card-title mb-4 text-primary">View Document Details</h4>

                                <div class="row mb-3 p-3">
                                    <!-- Type of Document -->
                                    <div class="col-md-4">
                                        <div class="font-weight-bold text-secondary">Type of Document:</div>
                                        <div class="border p-3 rounded bg-light">[Document Type Here]</div>
                                    </div>
                                    <!-- Name of Document -->
                                    <div class="col-md-4">
                                        <div class="font-weight-bold text-secondary">Name of Document:</div>
                                        <div class="border p-3 rounded bg-light"><a class="text-danger"
                                                href="{{ fileLink($result->document_url) }}" target="_blank"
                                                download="download">{{ $result->display_filename }}</a></div>
                                    </div>
                                    <!-- File Name to Display -->
                                    <div class="col-md-4">
                                        <div class="font-weight-bold text-secondary">File Name to Display:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->display_filename }}</div>
                                    </div>
                                </div>

                                <div class="row mb-3 p-3">
                                    <!-- Mapping Section -->
                                    <div class="col-md-4">
                                        <div class="font-weight-bold text-secondary">Mapping Section:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->tag->name ?? '--' }}</div>
                                    </div>
                                    <!-- G.O / Letter / Reference No. -->
                                    <div class="col-md-4">
                                        <div class="font-weight-bold text-secondary">G.O / Letter / Reference
                                            No.:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->reference_no ?? '--' }}</div>
                                    </div>
                                    <!-- Visible to Public -->
                                    <div class="col-md-4">
                                        <div class="font-weight-bold text-secondary">Visible to Public:</div>
                                        <div class="border p-3 rounded bg-light">
                                            {{ $result->visible_to_public == 1 ? 'Yes' : 'No' }}</div>
                                    </div>
                                </div>

                                <div class="row mb-3 p-3">
                                    <!-- Dated -->
                                    <div class="col-md-4">
                                        <div class="font-weight-bold text-secondary">Dated:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->dated }}</div>
                                    </div>
                                    <!-- Uploaded By -->
                                    <div class="col-md-4">
                                        <div class="font-weight-bold text-secondary">Uploaded By:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->employee->name }}</div>
                                    </div>
                                    <!-- Link -->
                                    <div class="col-md-4">
                                        <div class="font-weight-bold text-secondary">Link:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->link_url }}</div>
                                    </div>
                                </div>

                                <div class="row mb-3 p-3">
                                    <!-- Link Title -->
                                    <div class="col-md-4">
                                        <div class="font-weight-bold text-secondary">Link Title:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->link_title }}</div>
                                    </div>
                                    <!-- Status -->
                                    <div class="col-md-4">
                                        <div class="font-weight-bold text-secondary">Status:</div>
                                        <div class="border p-3 rounded bg-light">
                                            <span class="badge bg-success text-light">
                                                {{ findStatus($result->status) }}</span>
                                        </div>
                                    </div>
                                    <!-- Created At -->
                                    <div class="col-md-4">
                                        <div class="font-weight-bold text-secondary">Created At:</div>
                                        <div class="border p-3 rounded bg-light"> {{ dateOf($result->created_at) ?? '' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Edit Document Layout end -->
                            <!-- Edit Document Details End -->
                            <!-- insert the contents Here end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- page inner end-->
        </div>
        <!-- database table end -->
    </div>
@endsection
