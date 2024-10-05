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
                                        <div class="border p-3 rounded bg-light">{{ $result->document_type->name }}</div>
                                    </div>
                                    <!-- Name of Document -->
                                    <div class="col-md-4">
                                        <div class="font-weight-bold text-secondary">Name of Document:</div>
                                        <div class="border p-3 rounded bg-light"><a class="text-danger"
                                                href="{{ fileLink($result->document_url) }}" target="_blank"
                                                download="download">{{ $result->name }}</a></div>
                                    </div>
                                    <!-- File Name to Display -->
                                    <div class="col-md-4">
                                        <div class="font-weight-bold text-secondary">File Name to Display:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->name }}</div>
                                    </div>
                                </div>

                                <div class="row mb-3 p-3">
                                    <!-- Mapping Section -->
                                    <div class="col-md-4">
                                        <div class="font-weight-bold text-secondary">Mapping Scheme:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->scheme->name ?? '--' }}</div>
                                    </div>
                                    <!-- G.O / Letter / Reference No. -->
                                    <div class="col-md-4">
                                        <div class="font-weight-bold text-secondary">G.O / Letter / Reference
                                            No.:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->reference_no ?? '--' }}</div>
                                    </div>

                                    <!-- Description -->
                                    <div class="col-md-4">
                                        <div class="font-weight-bold text-secondary">Description:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->description ?? '--' }}</div>
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
                                    <!-- Created At -->
                                    <div class="col-md-4">
                                        <div class="font-weight-bold text-secondary">Created At:</div>
                                        <div class="border p-3 rounded bg-light"> {{ dateOf($result->created_at) ?? '' }}
                                        </div>
                                    </div>

                                </div>

                                <div class="row mb-3 p-3">
                                    <!-- Visisble to public -->
                                    <div class="col-md-4">
                                        <div class="font-weight-bold text-secondary">Visible to Public:</div>
                                        <div class="border p-3 rounded bg-light"><span
                                                class="badge {{ $result->visible_to_public == 1 ? 'bg-success' : 'bg-danger' }} text-light">
                                                {{ $result->visible_to_public == 1 ? 'Yes' : 'No' }}</span></div>
                                    </div>
                                    <!-- Status -->
                                    <div class="col-md-4">
                                        <div class="font-weight-bold text-secondary">Status:</div>
                                        <div class="border p-3 rounded bg-light">
                                            <span
                                                class="badge {{ $result->status == 1 ? 'bg-success' : 'bg-danger' }} text-light">
                                                {{ findStatus($result->status) }}</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Back Button -->
                                <button type="button" onclick="window.location.href='{{route('new-documents.index')}}';"
                                    class="btn btn-primary mt-3" style="margin-left: 13px;">Back</button>
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
