@extends('admin.layouts.layout')

@section('title', 'Edit Configuration')

@section('content')
    <style>
        .sizeoftextred {
            color: red;
        }
    </style>
    <div class="container" style="margin-top: 90px;">
        <div class="container-fluid p-2" style="background-color: #f2f2f2;">
            <div class="d-flex justify-content-between align-items-center" style="padding-left: 20px; padding-right: 20px;">
                <h5 class="mb-0">Header</h5>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0" style="background-color: #f2f2f2;">
                        <li class="breadcrumb-item"><a href="#">Configuration</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Header</li>
                    </ol>
                </nav>

            </div>
        </div>
        @if ($errors->any())
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-body">

                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        @endif

        <div class="container-fluid">
            <div class="page-inner">
                <!-- insert the contents Here start -->

                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-10"
                            style="background: linear-gradient(to right, #ffffff, #ffffff); border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">

                            <form action="{{ url('header/update/'.$result->id) }}" enctype="multipart/form-data"
                                method="post">
                                {{ csrf_field() }}
                                <!-- Separate div for Government and DPH Names -->
                                <div class="mb-4 p-5">
                                    <h2 class="mb-4">Government Name In Header</h2>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="govNameTamil" class="form-label font-weight-bold">Government Name
                                                (Tamil)</label>
                                            <input type="text" class="form-control shadow-sm" id="govNameTamil"
                                                placeholder="Enter government name in Tamil"
                                                value="{{ old('tamilnadu_government_title_tamil', $result->tamilnadu_government_title_tamil) }}"
                                                name="tamilnadu_government_title_tamil" required>
                                        </div>
                                        {{-- <div class="col-md-6 d-flex align-items-center">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="statusGovNameTamil"
                                                    checked>
                                                <label class="form-check-label" for="statusGovNameTamil">{{ $result->notification_status == 1 ? 'Active' : 'In-Active' }}</label>
                                            </div>
                                        </div> --}}
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="govNameEnglish" class="form-label font-weight-bold">Government Name
                                                (English)</label>
                                            <input type="text" class="form-control shadow-sm" id="govNameEnglish"
                                                placeholder="Enter government name in English"
                                                value="{{ old('tamilnadu_government_title_english', $result->tamilnadu_government_title_english) }}"
                                                name="tamilnadu_government_title_english">
                                        </div>
                                        {{-- <div class="col-md-6 d-flex align-items-center">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="statusGovNameEnglish"
                                                    checked>
                                                <label class="form-check-label" for="statusGovNameEnglish">{{ $result->notification_status == 1 ? 'Active' : 'In-Active' }}</label>
                                            </div>
                                        </div> --}}
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="dphNameTamil" class="form-label font-weight-bold">DPH Name
                                                (Tamil)</label>
                                            <input type="text" class="form-control shadow-sm" id="dphNameTamil"
                                                placeholder="Enter DPH name in Tamil"
                                                value="{{ old('dph_full_form_tamil', $result->dph_full_form_tamil) }}"
                                                name="dph_full_form_tamil" required>
                                        </div>
                                        {{-- <div class="col-md-6 d-flex align-items-center">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="statusDphNameTamil"
                                                    checked>
                                                <label class="form-check-label" for="statusDphNameTamil">{{ $result->notification_status == 1 ? 'Active' : 'In-Active' }}</label>
                                            </div>
                                        </div> --}}
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="dphNameEnglish" class="form-label font-weight-bold">DPH Name
                                                (English)</label>
                                            <input type="text" class="form-control shadow-sm" id="dphNameEnglish"
                                                placeholder="Enter DPH name in English"
                                                value="{{ old('dph_full_form_english', $result->dph_full_form_english) }}"
                                                name="dph_full_form_english" required required>
                                        </div>
                                        {{-- <div class="col-md-6 d-flex align-items-center">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="statusDphNameEnglish"
                                                    checked>
                                                <label class="form-check-label" for="statusDphNameEnglish">{{ $result->notification_status == 1 ? 'Active' : 'In-Active' }}</label>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <!-- Table Layout -->
                                <h2>Logos In Header</h2>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Field</th>
                                                <th>Input</th>
                                                <th>Status</th>
                                                <th>Image Preview</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Logo Uploads -->
                                            <!-- logo 1 start -->
                                            <tr>
                                                <td><label for="logo1" class="form-label font-weight-bold">Logo 1</label>
                                                </td>
                                                <td>
                                                    <input type="file" class="form-control shadow-sm" id="logo1"
                                                        accept="image/*" name="header_logo_one"
                                                        onchange="previewLogoImage(event, 'imagePreviewLogo1')"
                                                        value="{{ old('header_Logo_one_title', $result->header_logo_one_title) }}">
                                                    <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed
                                                        max size is
                                                        5MB</small>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="header_logo_one_status" id="header_logo_one_status"
                                                            value="1"
                                                            {{ CHECKBOX('header_logo_one_status', $result->header_logo_one_status) }}>
                                                        <label class="form-check-label" for="statusLogo1">{{ $result->header_logo_one_status == 1 ? 'Active' : 'In-Active' }}</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($result->header_logo_one)
                                                        <img id="imagePreviewLogo1"
                                                            src="{{ fileLink($result->header_logo_one) }}"
                                                            alt="Image Preview" class="img-fluid rounded border shadow-sm"
                                                            style="max-width: 100px; display: {{ fileLink($result->header_logo_one) ? 'block' : 'none' }};"
                                                            data-bs-toggle="modal" data-bs-target="#logoImageModal"
                                                            onclick="showLogoImageModal('imagePreviewLogo1')"
                                                            title="Click to view the image clearly">
                                                    @else
                                                        No Logo Available
                                                    @endif
                                                </td>
                                            </tr>
                                            <!-- logo 1 end -->

                                            <!-- logo 2 start -->
                                            <tr>
                                                <td><label for="logo2" class="form-label font-weight-bold">Logo
                                                        2</label></td>
                                                <td>
                                                    <input type="file" class="form-control shadow-sm" id="logo2"
                                                        accept="image/*" name="header_logo_two"
                                                        onchange="previewLogoImage(event, 'imagePreviewLogo2')"
                                                        >
                                                    <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed
                                                        max size is
                                                        5MB</small>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="header_logo_two_status" id="header_Logo_two_status"
                                                            value="1"
                                                            {{ CHECKBOX('header_logo_two_status', $result->header_logo_two_status) }}>
                                                        <label class="form-check-label" for="statusLogo2">{{ $result->header_logo_two_status == 1 ? 'Active' : 'In-Active' }}</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <img id="imagePreviewLogo2"
                                                        src="{{ fileLink($result->header_logo_two) }}"
                                                        alt="Image Preview" class="img-fluid rounded border shadow-sm"
                                                        style="max-width: 100px; display: {{ fileLink($result->header_logo_two) ? 'block' : 'none' }};"
                                                        data-bs-target="#logoImageModal"
                                                        onclick="showLogoImageModal('imagePreviewLogo2')"
                                                        title="Click to view the image clearly">
                                                </td>
                                            </tr>
                                            <!-- logo 2 end -->

                                            <!-- logo 3 start -->
                                            <tr>
                                                <td><label for="logo3" class="form-label font-weight-bold">Logo
                                                        3</label></td>
                                                <td>
                                                    <input type="file" class="form-control shadow-sm" id="logo3"
                                                        accept="image/*" name="header_logo_three"
                                                        onchange="previewLogoImage(event, 'imagePreviewLogo3')"
                                                        value="{{ old('header_Logo_one_title', $result->header_logo_three_title) }}">
                                                    <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed
                                                        max size is
                                                        5MB</small>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="header_logo_three_status" id="header_logo_three_status"
                                                            value="1"
                                                            {{ CHECKBOX('header_logo_three_status', $result->header_logo_three_status) }}>
                                                        <label class="form-check-label" for="statusLogo3">{{ $result->header_logo_three_status == 1 ? 'Active' : 'In-Active' }}</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <img id="imagePreviewLogo3"
                                                        src="{{ fileLink($result->header_logo_three) }}"
                                                        alt="Image Preview" class="img-fluid rounded border shadow-sm"
                                                        style="max-width: 100px; display: {{ fileLink($result->header_logo_three) ? 'block' : 'none' }};"
                                                        data-bs-target="#logoImageModal"
                                                        onclick="showLogoImageModal('imagePreviewLogo3')"
                                                        title="Click to view the image clearly">
                                                </td>
                                            </tr>
                                            <!-- logo 3 end -->

                                            <!-- logo 4 start -->
                                            <tr>
                                                <td><label for="logo4" class="form-label font-weight-bold">Logo
                                                        4</label></td>
                                                <td>
                                                    <input type="file" class="form-control shadow-sm" id="logo4"
                                                        accept="image/*" name="header_logo_four"
                                                        onchange="previewLogoImage(event, 'imagePreviewLogo4')"
                                                        value="{{ old('header_Logo_one_title', $result->header_logo_four_title) }}">
                                                    <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed
                                                        max size is
                                                        5MB</small>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="header_logo_four_status" id="header_Logo_four_status"
                                                            value="1"
                                                            {{ CHECKBOX('header_logo_four_status', $result->header_logo_four_status) }}>
                                                        <label class="form-check-label" for="statusLogo4">{{ $result->header_logo_four_status == 1 ? 'Active' : 'In-Active' }}</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <img id="imagePreviewLogo4"
                                                        src="{{ fileLink($result->header_logo_four) }}"
                                                        alt="Image Preview" class="img-fluid rounded border shadow-sm"
                                                        style="max-width: 100px; display: {{ fileLink($result->header_logo_four) ? 'block' : 'none' }};"
                                                        data-bs-target="#logoImageModal"
                                                        onclick="showLogoImageModal('imagePreviewLogo4')"
                                                        title="Click to view the image clearly">
                                                </td>
                                            </tr>
                                            <!-- logo 4 end -->

                                            <!-- logo 5 start -->
                                            <tr>
                                                <td><label for="logo5" class="form-label font-weight-bold">Logo
                                                        5</label></td>
                                                <td>
                                                    <input type="file" class="form-control shadow-sm" id="logo5"
                                                        accept="image/*" name="header_logo_five"
                                                        onchange="previewLogoImage(event, 'imagePreviewLogo5')"
                                                        value="{{ old('header_Logo_one_title', $result->header_logo_five_title) }}">
                                                    <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed
                                                        max size is
                                                        5MB</small>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="header_logo_five_status" id="header_Logo_five_status"
                                                            value="1"
                                                            {{ CHECKBOX('header_logo_five_status', $result->header_logo_five_status) }}>
                                                        <label class="form-check-label" for="statusLogo5">{{ $result->header_logo_five_status == 1 ? 'Active' : 'In-Active' }}</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <img id="imagePreviewLogo5"
                                                        src="{{ fileLink($result->header_logo_five) }}"
                                                        alt="Image Preview" class="img-fluid rounded border shadow-sm"
                                                        style="max-width: 100px; display: {{ fileLink($result->header_logo_five) ? 'block' : 'none' }};"
                                                        data-bs-target="#logoImageModal"
                                                        onclick="showLogoImageModal('imagePreviewLogo4')"
                                                        title="Click to view the image clearly">
                                                </td>
                                            </tr>
                                            <!-- logo 5 end -->


                                            <!-- logo 6 start -->
                                            <tr>
                                                <td><label for="logo6" class="form-label font-weight-bold">Logo
                                                        6</label></td>
                                                <td>
                                                    <input type="file" class="form-control shadow-sm" id="logo6"
                                                        accept="image/*" name="header_logo_six"
                                                        onchange="previewLogoImage(event, 'imagePreviewLogo6')"
                                                        value="{{ old('header_Logo_one_title', $result->header_logo_six_title) }}">
                                                    <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed
                                                        max size is
                                                        5MB</small>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="header_logo_six_status" id="header_Logo_six_status"
                                                            value="1"
                                                            {{ CHECKBOX('header_logo_six_status', $result->header_logo_six_status) }}>
                                                        <label class="form-check-label" for="statusLogo6">{{ $result->header_logo_six_status == 1 ? 'Active' : 'In-Active' }}</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <img id="imagePreviewLogo6"
                                                        src="{{ fileLink($result->header_logo_six) }}"
                                                        alt="Image Preview" class="img-fluid rounded border shadow-sm"
                                                        style="max-width: 100px; display: {{ fileLink($result->header_logo_six) ? 'block' : 'none' }};"
                                                        data-bs-target="#logoImageModal"
                                                        onclick="showLogoImageModal('imagePreviewLogo6')"
                                                        title="Click to view the image clearly">
                                                </td>
                                            </tr>
                                            <!-- logo 6 end -->
                                            <!-- Buttons -->
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Separate div for Scroller Notification -->
                                <div class="mb-4 p-5">
                                    <h2 class="mb-4">Scroller Notification</h2>
                                    <div class="row mb-3">
                                        <div class="col-md-10">
                                            <label for="scrollerNotification"
                                                class="form-label font-weight-bold">Notification
                                                Text</label>
                                            <textarea class="form-control shadow-sm" id="scrollerNotification" placeholder="Enter scrolling notification text"
                                                rows="4" name="notification_content">{{ old('notification_content', $result->notification_content) }}</textarea>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    name="notification_status"
                                                    {{ CHECKBOX('notification_status', $result->notification_status) }}>
                                                <label class="form-check-label"
                                                    for="statusScrollerNotification">{{ $result->notification_status == 1 ? 'Active' : 'In-Active' }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- banner image start -->
                                <h2>Banner Image</h2>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Field</th>
                                                <th>Input</th>
                                                <th>Status</th>
                                                <th>Image Preview</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Repeat for each banner -->
                                            <!-- banner 1 start -->
                                            <tr>
                                                <td><label for="Banner1" class="form-label font-weight-bold">Banner
                                                        1</label></td>
                                                <td>
                                                    <input type="file" class="form-control shadow-sm" id="Banner1"
                                                        accept="image/*" name="homepage_banner_one"
                                                        onchange="previewBannerImage(event, 'imagePreviewBanner1')"
                                                        >
                                                    <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed
                                                        max size is
                                                        5MB</small>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="homepage_banner_one_status"
                                                            id="homepage_banner_one_status" value="1"
                                                            {{ CHECKBOX('homepage_banner_one_status', $result->homepage_banner_one_status) }}>
                                                        <label class="form-check-label" for="statusBanner1">{{ $result->homepage_banner_one_status == 1 ? 'Active' : 'In-Active' }}</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <img id="imagePreviewBanner1"
                                                        src="{{ fileLink($result->homepage_banner_one) }}"
                                                        alt="Image Preview" class="img-fluid rounded border shadow-sm"
                                                        style="max-width: 100px; display: {{ fileLink($result->homepage_banner_one) ? 'block' : 'none' }};"
                                                        data-bs-toggle="modal" data-bs-target="#bannerImageModal"
                                                        onclick="showBannerImageModal('imagePreviewBanner1')"
                                                        title="Click to view the image clearly">
                                                </td>
                                            </tr>
                                            <!-- banner 1 end -->
                                            <!-- banner 2 start -->
                                            <tr>
                                                <td><label for="Banner2" class="form-label font-weight-bold">Banner
                                                        2</label></td>
                                                <td>
                                                    <input type="file" class="form-control shadow-sm" id="Banner2"
                                                        accept="image/*" name="homepage_banner_two"
                                                        onchange="previewBannerImage(event, 'imagePreviewBanner2')"
                                                        value="{{ old('homepage_banner_two_title', $result->homepage_banner_two_title) }}">
                                                    <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed
                                                        max size is
                                                        5MB</small>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="homepage_banner_two_status"
                                                            id="homepage_banner_two_status" value="1"
                                                            {{ CHECKBOX('homepage_banner_two_status', $result->homepage_banner_two_status) }}>
                                                        <label class="form-check-label" for="statusBanner2">{{ $result->homepage_banner_two_status == 1 ? 'Active' : 'In-Active' }}</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <img id="imagePreviewBanner2"
                                                        src="{{ fileLink($result->homepage_banner_two) }}"
                                                        alt="Image Preview" class="img-fluid rounded border shadow-sm"
                                                        style="max-width: 100px; display: {{ fileLink($result->homepage_banner_two) ? 'block' : 'none' }};"
                                                        data-bs-toggle="modal" data-bs-target="#bannerImageModal"
                                                        onclick="showBannerImageModal('imagePreviewBanner2')"
                                                        title="Click to view the image clearly">
                                                </td>
                                            </tr>
                                            <!-- banner 2 end -->
                                            <!-- banner 3 start -->
                                            <tr>
                                                <td><label for="Banner3" class="form-label font-weight-bold">Banner
                                                        3</label></td>
                                                <td>
                                                    <input type="file" class="form-control shadow-sm" id="Banner3"
                                                        accept="image/*" name="homepage_banner_three"
                                                        onchange="previewBannerImage(event, 'imagePreviewBanner3')"
                                                        value="{{ old('homepage_banner_three_title', $result->homepage_banner_three_title) }}">
                                                    <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed
                                                        max size is
                                                        5MB</small>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="homepage_banner_three_status"
                                                            id="homepage_banner_three_status" value="1"
                                                            {{ CHECKBOX('homepage_banner_three_status', $result->homepage_banner_three_status) }}>
                                                        <label class="form-check-label" for="statusBanner3">{{ $result->homepage_banner_three_status == 1 ? 'Active' : 'In-Active' }}</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <img id="imagePreviewBanner3"
                                                        src="{{ fileLink($result->homepage_banner_three) }}"
                                                        alt="Image Preview" class="img-fluid rounded border shadow-sm"
                                                        style="max-width: 100px; display: {{ fileLink($result->homepage_banner_three) ? 'block' : 'none' }};"
                                                        data-bs-toggle="modal" data-bs-target="#bannerImageModal"
                                                        onclick="showBannerImageModal('imagePreviewBanner3')"
                                                        title="Click to view the image clearly">
                                                </td>
                                            </tr>
                                            <!-- banner 3 end -->
                                            <!-- banner 4 start -->
                                            <tr>
                                                <td><label for="Banner4" class="form-label font-weight-bold">Banner
                                                        4</label></td>
                                                <td>
                                                    <input type="file" class="form-control shadow-sm" id="Banner4"
                                                        accept="image/*" name="homepage_banner_four"
                                                        onchange="previewBannerImage(event, 'imagePreviewBanner4')"
                                                        value="{{ old('homepage_banner_four_title', $result->homepage_banner_four_title) }}">
                                                    <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed
                                                        max size is
                                                        5MB</small>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="homepage_banner_four_status"
                                                            id="homepage_banner_four_status" value="1"
                                                            {{ CHECKBOX('homepage_banner_four_status', $result->homepage_banner_four_status) }}>
                                                        <label class="form-check-label" for="statusBanner4">{{ $result->homepage_banner_four_status == 1 ? 'Active' : 'In-Active' }}</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <img id="imagePreviewBanner4"
                                                        src="{{ fileLink($result->homepage_banner_four) }}"
                                                        alt="Image Preview" class="img-fluid rounded border shadow-sm"
                                                        style="max-width: 100px; display: {{ fileLink($result->homepage_banner_four) ? 'block' : 'none' }};"
                                                        data-bs-toggle="modal" data-bs-target="#bannerImageModal"
                                                        onclick="showBannerImageModal('imagePreviewBanner4')"
                                                        title="Click to view the image clearly">
                                                </td>
                                            </tr>
                                            <!-- banner 4 end -->
                                            <!-- banner 5 start -->
                                            <tr>
                                                <td><label for="Banner5" class="form-label font-weight-bold">Banner
                                                        5</label></td>
                                                <td>
                                                    <input type="file" class="form-control shadow-sm" id="Banner5"
                                                        accept="image/*" name="homepage_banner_five"
                                                        onchange="previewBannerImage(event, 'imagePreviewBanner5')"
                                                        value="{{ old('homepage_banner_five_title', $result->homepage_banner_five_title) }}">
                                                    <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed
                                                        max size is
                                                        5MB</small>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="homepage_banner_five_status"
                                                            id="homepage_banner_five_status" value="1"
                                                            {{ CHECKBOX('homepage_banner_five_status', $result->homepage_banner_five_status) }}>
                                                        <label class="form-check-label" for="statusBanner5">{{ $result->homepage_banner_five_status == 1 ? 'Active' : 'In-Active' }}</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <img id="imagePreviewBanner5"
                                                        src="{{ fileLink($result->homepage_banner_five) }}"
                                                        alt="Image Preview" class="img-fluid rounded border shadow-sm"
                                                        style="max-width: 100px; display: {{ fileLink($result->homepage_banner_five) ? 'block' : 'none' }};"
                                                        data-bs-toggle="modal" data-bs-target="#bannerImageModal"
                                                        onclick="showBannerImageModal('imagePreviewBanner5')"
                                                        title="Click to view the image clearly">
                                                </td>
                                            </tr>
                                            <!-- banner 5 end -->
                                        </tbody>
                                    </table>
                                </div>


                                <!-- banner image end -->
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
    <!-- Logo Image Modal -->
    <div class="modal fade" id="logoImageModal" tabindex="-1" aria-labelledby="logoImageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="logoImageModalImage" src="#" alt="Logo Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>



    <!-- Banner Image Modal -->
    <div class="modal fade" id="bannerImageModal" tabindex="-1" aria-labelledby="bannerImageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="bannerImageModalImage" src="#" alt="Banner Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <script>
        // Function to preview banner image
        function previewBannerImage(event, imagePreviewId) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById(imagePreviewId);
                output.src = dataURL;
                output.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }

        // Function to preview logo image
        function previewLogoImage(event, imagePreviewId) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById(imagePreviewId);
                output.src = dataURL;
                output.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }

        // Function to show banner image modal
        function showBannerImageModal(imagePreviewId) {
            var image = document.getElementById(imagePreviewId);
            var modalImage = document.getElementById('bannerImageModalImage');
            modalImage.src = image.src;
        }

        // Function to show logo image modal
        function showLogoImageModal(imagePreviewId) {
            var image = document.getElementById(imagePreviewId);
            var modalImage = document.getElementById('logoImageModalImage');
            modalImage.src = image.src;
        }
    </script>
@endsection
