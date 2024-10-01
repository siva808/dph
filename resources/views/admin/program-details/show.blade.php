@extends('admin.layouts.layout')
@section('title', 'View Programs')
@section('content')
    <div class="container" id="maincontent">
        <div class="container-fluid p-2" style="background-color: #f2f2f2;">
            <div class="d-flex justify-content-between align-items-center" style="padding-left: 20px; padding-right: 20px;">
                <h5 class="mb-0">View Program & Divisions</h5>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0" style="background-color: #f2f2f2;">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Program & Divisions View</li>
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
                                <h4 class="card-title mb-4 text-primary">View Program & Divisions</h4>

                                <!-- Row for Program Title -->
                                <div class="row mb-3 p-3">
                                    <div class="col-md-2 font-weight-bold text-secondary">Program Title:</div>
                                    <div class="col-md-8 border p-3 rounded bg-light">
                                        {{ $result->program->name }}
                                    </div>
                                </div>

                                <!-- Row for Description -->
                                <div class="row mb-3 p-3">
                                    <div class="col-md-2 font-weight-bold text-secondary">Description:</div>
                                    <div class="col-md-8 border p-3 rounded bg-light">
                                        {{ $result->description }}
                                    </div>
                                </div>

                                <!-- Row for Uploaded Document Name -->
                                <div class="row mb-3 p-3">
                                    <div class="col-md-2 font-weight-bold text-secondary">Uploaded Document Name:</div>
                                    <div class="col-md-8 border p-3 rounded bg-light">
                                        {{ $result->document }}
                                    </div>
                                    <div class="col-md-3">
                                        <!-- Use an anchor tag with the download attribute for downloading -->
                                        <a href="{{ filelink($result->document) }}" target="_blank"
                                            class="btn btn-primary">View Document</a>
                                    </div>
                                </div>



                                <!-- Row for Related Images -->
                                <div class="row mb-3 p-3">
                                    <div class="col-md-2 font-weight-bold text-secondary">Related Images:</div>
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

                                <!-- Row for Status -->
                                <div class="row mb-3 p-3">
                                    <div class="col-md-2 font-weight-bold text-secondary">Status:</div>
                                    <div class="col-md-8">
                                       <span class="badge {{ $result->status == 1 ? 'bg-success' : 'bg-danger' }} text-light"> {{ $result->status == 1 ? 'Active' : 'Inactive' }}</span>
                                    </div>
                                </div>

                                <div class="row">
                                 @foreach($officers as $officer)
                                     <div class="col-md-6 col-lg-4 mb-4">
                                         <div class="card border-primary shadow-sm">
                                             <div class="card-body">
                             
                                                 <!-- Official Image -->
                                                 <img src="{{ fileLink($officer->image) }}" alt="{{ $officer->name }}" class="img-fluid rounded mb-3"
                                                     style="max-height: 150px; max-width: 150px; object-fit: cover;">
                                                 <!-- Official Name -->
                                                 <h5 class="card-title">{{ $officer->name }}</h5>
                                                 <!-- Qualification -->
                                                 <p><strong>Qualification:</strong> {{ $officer->qualification }}</p>
                                                 <!-- Designation -->
                                                 <p><strong>Designation:</strong> {{ $officer->designation->name }}</p>
                                                 <!-- Status -->
                                                 <p><strong>Status:</strong> <span class="badge {{ $officer->status === 1 ? 'bg-success' : 'bg-danger' }}">
                                                     {{ $officer->status === 1 ? 'Active' : 'Inactive' }}</span></p>
                                             </div>
                                         </div>
                                     </div>
                                 @endforeach
                             
                                 <!-- Add more official cards as needed -->
                             </div>
                             
                                <!-- Row for Back Button -->
                                <button type="button" class="btn btn-primary px-5 py-2 mt-5"
                                    onclick="window.location.href='{{ route('programdetails.index') }}'">Back</button>
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
        <!-- main panel end -->
    </div>
@endsection
