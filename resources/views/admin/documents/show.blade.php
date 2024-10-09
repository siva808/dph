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
                                <div class="d-grid gap-4 mb-3 grid-3 grid-2 grid-1">

                                    <!-- Type of Document -->
                                    <div>
                                        <div class="font-weight-bold text-secondary">Type of Document:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->document_type->name }}</div>
                                    </div>


                                    <!-- Mapping Section -->
                                    @if (!in_array($result->document_type_id, [4, 15, 7, 8, 9, 10, 11, 12, 14]))
                                    <div>
                                        <div class="font-weight-bold text-secondary">Scheme:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->scheme->name ?? '--' }}</div>
                                    </div>
                                    @endif

                                    @if ($result->scetion_id)
                                    <!-- Mapping Section -->
                                    <div>
                                        <div class="font-weight-bold text-secondary">Section:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->section->name ?? '--' }}</div>
                                    </div>
                                    @endif

                                    @if (in_array($result->document_type_id, [5]))
                                    <!-- Publication -->
                                    <div>
                                        <div class="font-weight-bold text-secondary">Publication Type:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->publication->name ?? '--' }}</div>
                                    </div>
                                    @endif

                                    @if (in_array($result->document_type_id, [12]))
                                    <!-- Notification -->
                                    <div>
                                        <div class="font-weight-bold text-secondary">Notification Type:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->notification->name ?? '--' }}</div>
                                    </div>
                                    @endif

                                    <!-- Name of Document -->
                                    <div>
                                        <div class="font-weight-bold text-secondary">Name of Document:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->name }}</div>
                                    </div>

                                    <!-- Description -->
                                    @if (!in_array($result->document_type_id, [8, 9]))
                                    <div>
                                        <div class="font-weight-bold text-secondary">Description:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->description ?? '--' }}</div>
                                    </div>
                                    @endif

                                    <!-- Reference No. -->
                                    @if (!in_array($result->document_type_id, [8, 9, 10, 11, 12, 13, 14]))
                                    <div>
                                        <div class="font-weight-bold text-secondary">Reference No:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->reference_no ?? '--' }}</div>
                                    </div>
                                    @endif

                                    <!-- Financial Year -->
                                    @if (in_array($result->document_type_id, [8, 9]))
                                    <div>
                                        <div class="font-weight-bold text-secondary">Financial Year:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->financial_year ?? '--' }}</div>
                                    </div>
                                    @endif

                                    {{-- File --}}
                                    @if (!in_array($result->document_type_id, [4, 15, 14]))
                                    <div>
                                        <div class="font-weight-bold text-secondary">File:</div>
                                        <div class="border p-3 rounded bg-light"><a class="text-primary"
                                                href="{{ fileLink($result->document_url) }}" target="_blank">View</a></div>
                                    </div>

                                    {{-- Language --}}
                                    <div>
                                        <div class="font-weight-bold text-secondary">File Language:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->language->name ?? '--' }}</div>
                                    </div>
                                    @endif

                                    {{-- Image --}}
                                    @if (in_array($result->document_type_id, [12, 13, 14]))
                                    <div>
                                        <div class="font-weight-bold text-secondary">Image:</div>
                                        <div class="border p-3 rounded bg-light"><a class="text-primary"
                                                href="{{ fileLink($result->image_url) }}" target="_blank">View</a></div>
                                    </div>
                                    @endif

                                    <!-- Link Url -->
                                    @if (in_array($result->document_type_id, [5, 11, 12, 13, 14]))
                                    <div>
                                        <div class="font-weight-bold text-secondary">Link Url:</div>
                                        <div class="border p-3 rounded bg-light"><a href="{{ $result->link }}" target="_blank">{{ $result->link ?? '--' }}</a></div>
                                    </div>

                                    <!-- Link Title -->
                                    <div>
                                        <div class="font-weight-bold text-secondary">Link Title:</div>
                                        <div class="border p-3 rounded bg-light">{{$result->link_title ?? '--' }}</div>
                                    </div>
                                    @endif

                                    <!-- Start Date -->
                                    @if (in_array($result->document_type_id, [13]))
                                    <div>
                                        <div class="font-weight-bold text-secondary">Start Date:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->start_date }}</div>
                                    </div>

                                    <!-- End Date -->
                                    <div>
                                        <div class="font-weight-bold text-secondary">End Date:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->end_date }}</div>
                                    </div>
                                    @endif

                                    <!-- Expiry Date -->
                                    @if (in_array($result->document_type_id, [12]))
                                    <div>
                                        <div class="font-weight-bold text-secondary">Expiry Date:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->expiry_date }}</div>
                                    </div>
                                    @endif

                                    <!-- Dated -->
                                    @if (!in_array($result->document_type_id, [8, 9, 13, 14]))
                                    <div>
                                        <div class="font-weight-bold text-secondary">Dated:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->dated }}</div>
                                    </div>
                                    @endif

                                    <!-- Uploaded By -->
                                    <div>
                                        <div class="font-weight-bold text-secondary">Uploaded By:</div>
                                        <div class="border p-3 rounded bg-light">{{ $result->employee->name }}</div>
                                    </div>

                                    <!-- Created At -->
                                    <div>
                                        <div class="font-weight-bold text-secondary">Created At:</div>
                                        <div class="border p-3 rounded bg-light"> {{ dateOf($result->created_at) ?? '' }}
                                        </div>
                                    </div>



                                    <!-- Visisble to public -->
                                    <div>
                                        <div class="font-weight-bold text-secondary">Visible to Public:</div>
                                        <div class="border p-3 rounded bg-light"><span
                                                class="badge {{ $result->visible_to_public == 1 ? 'bg-success' : 'bg-danger' }} text-light">
                                                {{ $result->visible_to_public == 1 ? 'Yes' : 'No' }}</span></div>
                                    </div>
                                    <!-- Status -->
                                    <div>
                                        <div class="font-weight-bold text-secondary">Status:</div>
                                        <div class="border p-3 rounded bg-light">
                                            <span
                                                class="badge {{ $result->status == 1 ? 'bg-success' : 'bg-danger' }} text-light">
                                                {{ findStatus($result->status) }}</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Back Button -->
                                <button type="button" onclick="window.location.href='{{ route('new-documents.index') }}';"
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
