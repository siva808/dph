@extends('admin.layouts.layout')
@section('title', 'Upload Document')
@section('content')
<div class="container" id="maincontent">
    <div class="container-fluid p-2" style="background-color: #f2f2f2;">
        <div class="d-flex justify-content-between align-items-center" style="padding-left: 20px; padding-right: 20px;">
            <h5 class="mb-0">Documents</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0" style="background-color: #f2f2f2;">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Events</li>
                </ol>
            </nav>

        </div>
    </div>
    <div class="container-fluid">
        <div class="page-inner">
            <div class="container-fluid mt-2">
                <div class="col-lg-12 p-5" style="background-color: #ffffff; border-radius: 10px;">
                    <form id="eventForm">
                        <h4 class="card-title mb-4 text-primary">Create Event</h4>

                        <!-- All Fields in One Div using d-grid -->
                        <div class="d-grid gap-4 mb-3 grid-3 grid-2 grid-1">
                            <div>
                                <label for="EventName" class="form-label">Name Of Event <span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="EventName" placeholder="Enter Name Of Event"
                                    required>
                            </div>
                            <div>
                                <label for="schemeName" class="form-label">Scheme Name <span
                                        style="color: red;">*</span></label>
                                <select class="form-select" id="schemeName" required>
                                    <option value="">Select Scheme name</option>
                                    <option value="event1">Scheme 1</option>
                                    <option value="event2">Scheme 2</option>
                                    <option value="event3">Scheme 3</option>
                                    <option value="event4">Scheme 4</option>
                                </select>
                            </div>
                            <div>
                                <label for="eventDescription" class="form-label">Event Description <span
                                        style="color: red;">*</span></label>
                                <textarea class="form-control" id="eventDescription"
                                    placeholder="Enter event description" required></textarea>
                            </div>
                            <div>
                                <label for="startDate" class="form-label">Start Date <span
                                        style="color: red;">*</span></label>
                                <input type="date" class="form-control" id="startDate" required>
                            </div>
                            <div>
                                <label for="endDate" class="form-label">End Date <span
                                        style="color: red;">*</span></label>
                                <input type="date" class="form-control" id="endDate" required>
                            </div>
                            <div>
                                <label for="link" class="form-label">Link</label>
                                <input type="url" class="form-control" id="link" placeholder="Enter link URL" required>
                            </div>
                            <div>
                                <label for="eventPdf" class="form-label">Event PDF Upload</label>
                                <input type="file" class="form-control" id="eventPdf" required>
                                <small style="color: red;">Accepted formats: .pdf, max size 5MB</small>
                            </div>
                            <div>
                                <label for="imageUploads" class="form-label">Select Images</label>
                                <input type="file" id="imageUploads" class="form-control" accept="image/*" multiple
                                    onchange="previewImages()">
                                <small style="color: red;">Upload Max 5 Images, Accepted file types
                                    .jpg/.jpeg/.png</small>
                            </div>
                            <div>
                                <label for="status" class="form-label">Status</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="toggleStatus" checked
                                        onchange="toggleStatusText('statusLabel', this)">
                                    <label class="form-check-label" for="toggleStatus" id="statusLabel">Active</label>
                                </div>
                            </div>
                            <div>
                                <label for="visibleToPublic" class="form-label">Visible to Public</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="toggleVisibleToPublic" checked
                                        onchange="toggleVisibilityText('publicStatusLabel', this)">
                                    <label class="form-check-label" for="toggleVisibleToPublic"
                                        id="publicStatusLabel">Yes</label>
                                </div>
                            </div>
                        </div>

                        <!-- Image Preview Section -->
                        <div class="mb-3">
                            <div id="imagePreviews" class="d-flex flex-wrap"></div>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex mt-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a type="reset" class="btn btn-inverse waves-effect waves-light"
                                href="{{route('documents.index')}}"> Cancel </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- database table end -->
</div>