@extends('admin.layouts.layout')
@section('title', 'View Contact')
@section('content')
<div class="container" style="margin-top: 90px;">
    <div class="container-fluid p-2" style="background-color: #f2f2f2;">
        <div class="d-flex justify-content-between align-items-center"
            style="padding-left: 20px; padding-right: 20px;">
            <h5 class="mb-0">Contact</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0" style="background-color: #f2f2f2;">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Contact</li>
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
                            <h4 class="card-title mb-4 text-primary">View Contact Details</h4>

                            <div class="row mb-3 p-3">
                                <!-- Contact Type -->
                                <div class="col-md-4">
                                    <div class="font-weight-bold text-secondary">Contact Type:</div>
                                    <div class="border p-3 rounded bg-light">{{$result->contactType->name ?? '--'}}</div>
                                </div>
                                <!-- Is Post Vacant -->
                                <div class="col-md-4">
                                    <div class="font-weight-bold text-secondary">Is Post Vacant:</div>
                                    <div class="border p-3 rounded bg-light">{{$result->is_post_vacant}}</div>
                                </div>
                                <!-- Designation -->
                                <div class="col-md-4">
                                    <div class="font-weight-bold text-secondary">Designation:</div>
                                    <div class="border p-3 rounded bg-light">{{$result->designation->name ?? '--'}}</div>
                                </div>
                            </div>

                            <div class="row mb-3 p-3">
                                <!-- Name -->
                                <div class="col-md-4">
                                    <div class="font-weight-bold text-secondary">Name:</div>
                                    <div class="border p-3 rounded bg-light">{{$result->name ?? '--'}}</div>
                                </div>
                                <!-- Mobile Number -->
                                <div class="col-md-4">
                                    <div class="font-weight-bold text-secondary">Mobile Number:</div>
                                    <div class="border p-3 rounded bg-light">{{$result->mobile_number ?? '--'}}</div>
                                </div>
                                <!-- Landline Number -->
                                <div class="col-md-4">
                                    <div class="font-weight-bold text-secondary">Landline Number:</div>
                                    <div class="border p-3 rounded bg-light">{{$result->landline_number ?? '--'}}</div>
                                </div>
                            </div>

                            <div class="row mb-3 p-3">
                                <!-- Email ID -->
                                <div class="col-md-4">
                                    <div class="font-weight-bold text-secondary">Email ID:</div>
                                    <div class="border p-3 rounded bg-light">{{$result->email_id ?? '--'}}</div>
                                </div>
                                <!-- Fax -->
                                <div class="col-md-4">
                                    <div class="font-weight-bold text-secondary">Fax:</div>
                                    <div class="border p-3 rounded bg-light">{{$result->fax ?? '--'}}</div>
                                </div>
                                <!-- HUD -->
                                @if($result->contactType->slug_key == 'hud' || $result->contactType->slug_key == 'block' || $result->contactType->slug_key == 'phc' || $result->contactType->slug_key == 'hsc')
                                <div class="col-md-4">
                                    <div class="font-weight-bold text-secondary">HUD:</div>
                                    <div class="border p-3 rounded bg-light">{{$result->hud->name ?? '--'}}</div>
                                </div>
                                @endif
                            </div>

                            <div class="row mb-3 p-3">
                                <!-- Block -->
                                @if($result->contactType->slug_key == 'block' || $result->contactType->slug_key == 'phc' || $result->contactType->slug_key == 'hsc')
                                <div class="col-md-4">
                                    <div class="font-weight-bold text-secondary">Block:</div>
                                    <div class="border p-3 rounded bg-light">{{$result->block->name ?? '--'}}</div>
                                </div>
                                @endif
                                <!-- PHC -->
                                <div class="col-md-4">
                                    @if($result->contactType->slug_key == 'phc' || $result->contactType->slug_key == 'hsc')
                                    <div class="font-weight-bold text-secondary">PHC:</div>
                                    <div class="border p-3 rounded bg-light">{{$result->phc->name ?? '--'}}</div>
                                    @endif
                                </div>
                                <!-- HSC -->
                                @if($result->contactType->slug_key == 'hsc')
                                <div class="col-md-4">
                                    <div class="font-weight-bold text-secondary">HSC:</div>
                                    <div class="border p-3 rounded bg-light">{{$result->hsc->name ?? '--'}}</div>
                                </div>
                                @endif
                            </div>

                            <div class="row mb-3 p-3">
                                <!-- Status -->
                                <div class="col-md-4">
                                    <div class="font-weight-bold text-secondary">Status:</div>
                                    <div class="border p-3 rounded bg-light">
                                        <span class="badge bg-success text-light"> {{findStatus($result->status)}}</span>
                                    </div>
                                </div>
                                <!-- Created At -->
                                <div class="col-md-4">
                                    <div class="font-weight-bold text-secondary">Created At:</div>
                                    <div class="border p-3 rounded bg-light">{{dateOf($result->created_at) ?? ''}}</div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="window.location.href='contact_list.html'" >Back</button>

                            
                        </div>



                        <!-- Edit Document Layout end -->




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
