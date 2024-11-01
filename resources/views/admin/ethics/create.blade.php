@extends('admin.layouts.layout')
@section('title', 'Create Programs Details')
@section('content')
      <div class="container" style="margin-top: 90px;">
        <div class="container-fluid p-2" style="background-color: #f2f2f2;">
          <div class="d-flex justify-content-between align-items-center"
            style="padding-left: 20px; padding-right: 20px;">
            <h5 class="mb-0">Documents</h5>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0" style="background-color: #f2f2f2;">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ethics Commitee</li>
              </ol>
            </nav>

          </div>
        </div>
        <div class="container-fluid">
          <div class="page-inner">
            <div class="container-fluid mt-2">
              <div class="col-lg-12 p-5" style="background-color: #ffffff; border-radius: 10px;">
                <!-- <form id="eventForm"> -->
                <h4 class="card-title mb-4 text-primary">Ethics Committee</h4>

                <!-- Form Structure -->
                <div class="mt-3 mb-3 p-3" style="background-color: #f7f7f7;">
                  <form action="{{ route('notifications.store') }}" method="POST" enctype="multipart/form-data" id="ethicscommitteeform" class="mb-3">
                  {{ csrf_field() }}
                    <div class="row mb-3">
                      <!-- Title-->
                      <div class="col-lg-6">
                        <label for="Title" class="form-label">Title<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="Title" placeholder="Enter Title" >
                      </div>

                      <!-- Document Upload -->
                      <div class="col-lg-6">
                        <label for="iconUpload" class="form-label">ScrollerNotification Icon (PNG Only)<span
                            style="color: red;">*</span></label>
                        <input type="file" class="form-control" id="iconUpload" accept=".png" >
                        <small style="color: red;">Accepted formats: .PNG, max size 5MB</small>
                      </div>
                    </div>



                    <div class="row mb-3">
                      <!-- Scroller Notification -->
                      <div class="col-lg-6">
                        <label for="scrollerNotification" class="form-label">Scroller Notification <span
                            style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="scrollerNotification"
                          placeholder="Enter scroller notification" >
                      </div>

                      <!-- Document Upload -->
                      <div class="col-lg-6">
                        <label for="scrollerNotification" class="form-label">Scroller Notification Link<span
                            style="color: red;">*</span></label>
                        <input type="url" class="form-control" id="scrollerNotification"
                          placeholder="Enter scroller notification Link" >
                      </div>
                    </div>

                    <div class="row mb-3">

                      <!-- Document Upload -->
                      <div class="col-lg-6">
                        <label for="documentUpload" class="form-label">Upload Document (EC Guidelines)<span
                            style="color: red;">*</span></label>
                        <input type="file" class="form-control" id="documentUpload" >
                        <small style="color: red;">Accepted formats: .pdf, max size 5MB</small>
                      </div>

                      <!-- Scroller Notification -->
                      <div class="col-lg-6">
                        <label for="eventDescription" class="form-label">Description <span
                            style="color: red;">*</span></label>
                        <textarea class="form-control" id="eventDescription" placeholder="Enter description"
                          ></textarea>
                      </div>


                    </div>

                    <!-- <hr style="color: #c7c7c7;"> -->


                    <!-- Contact Details -->
                    <h5 class="mb-3 mt-3">Contact Details</h5>
                    <div class="row mb-5 mt-4">
                      <div class="col-lg-6">
                        <label for="contactDescription" class="form-label">Description <span
                            style="color: red;">*</span></label>
                        <textarea class="form-control" id="contactDescription" placeholder="Enter contact description"
                          ></textarea>
                      </div>
                      <div class="col-lg-6">
                        <label for="contactEmail" class="form-label">Email <span style="color: red;">*</span></label>
                        <input type="email" class="form-control" id="contactEmail" placeholder="Enter email" >
                      </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-end">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <!-- <button type="button" class="btn btn-danger" style="margin-left: 10px;" data-bs-dismiss="modal">Cancel</button> -->
                    </div>
                  </form>
                </div>

                <!-- <hr style="color: #c7c7c7;"> -->



                <!-- Image Upload for Banners -->
                <!-- banner image start=======================================================================================================-->
                <div class="container-fluid mt-3">
                  <div class="card">
                    <div class="card-header">
                      <div class="d-flex align-items-center">
                        <h4 class="card-title">Ethics Committee Banner Images</h4>
                        <!-- Add Banner Button -->
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                          data-bs-target="#addBannerModal">
                          <i class="fa fa-plus"></i> Add
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <form>
                        <!-- Table Layout -->
                        <div class="table-responsive">
                          <table class="table table-striped table-hover">
                            <thead>
                              <tr>
                                <th style="width: 20%;">Order ID</th>
                                <th style="width: 20%;">Banner Title</th>
                                <th style="width: 20%;">Input</th>
                                <th style="width: 20%;">Last Update</th>
                                <th style="width: 8%;">Status</th>
                                <th style="width: 10%;" class="text-center">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <!-- Banner 1 start -->
                              <tr>
                                <td>1</td>
                                <td>Banner Title Name</td>
                                <td>
                                  <img src="assets/img/dphadmin/DPH_LOGO (1).png" alt="Logo" style="max-width: 100px;">
                                </td>
                                <td>09/12/2024</td>
                                <td class="text-success" style="font-weight: bold;">Active</td>
                                <td class="text-center">
                                  <!-- Actions with icons -->
                                  <div class="form-button-action">
                                    <button type="button" class="btn btn-link btn-primary text-center"
                                      data-bs-toggle="modal" data-bs-target="#editBannerModal"
                                      onclick="editBanner('Banner Title 1', 'assets/img/banners/banner1.png', true)">
                                      <i class="fa fa-edit"></i>
                                    </button>
                                  </div>
                                </td>
                              </tr>
                              <!-- Banner 1 end -->
                              <!-- Repeat similar rows for additional banners -->
                            </tbody>
                          </table>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>

                <!-- banner image end=====================================================================================================-->

                <!-- modal for adding banner start -->
                <!-- Modal Popup for Adding Banner -->
                <div class="modal fade" id="addBannerModal" tabindex="-1" aria-labelledby="addBannerModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="addBannerModalLabel">Add New Banner</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form id="addBannerForm">

                          <!-- Order ID -->
                          <div class="mb-3">
                            <label for="editOrderId" class="form-label">Order ID</label>
                            <input type="text" class="form-control" id="editOrderId" placeholder="Enter order ID">
                          </div>

                          <!-- Banner Title Field -->
                          <div class="mb-3">
                            <label for="bannerTitle" class="form-label">Banner Title</label>
                            <input type="text" class="form-control" id="bannerTitle" placeholder="Enter banner title"
                              required>
                          </div>

                          <!-- Select Image Field with Preview -->
                          <div class="mb-3">
                            <label for="bannerImage" class="form-label">Select Banner Image</label>
                            <input type="file" class="form-control" id="bannerImage" accept="image/*" required
                              onchange="previewBannerImage(event)">
                            <small class="form-text text-danger">Accepted formats: .jpg, .jpeg, .png, max size:
                              5MB</small>
                          </div>

                          <!-- Image Preview -->
                          <div class="mb-3 text-center">
                            <img id="bannerPreview" src="" alt="Image Preview"
                              style="display:none; max-width: 100px; margin-top: 10px;" />
                          </div>

                          <!-- Status Toggle -->
                          <div class="mb-3">
                            <label for="bannerStatus" class="form-label">Status</label>
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="bannerStatus" checked
                                onchange="toggleStatusText('bannerStatusText', this)">
                              <label class="form-check-label" for="bannerStatus" id="bannerStatusText">Active</label>
                            </div>
                          </div>

                          <!-- Submit Button -->
                          <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-danger" style="margin-left: 10px;" data-bs-dismiss="modal">Cancel</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- modal for adding banner end -->

                <!-- model for edit banner start -->
                <!-- Edit Banner Modal -->
                <div class="modal fade" id="editBannerModal" tabindex="-1" aria-labelledby="editBannerModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editBannerModalLabel">Edit Banner</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form id="editBannerForm">

                          <!-- Order ID -->
                          <div class="mb-3">
                            <label for="editOrderId" class="form-label">Order ID</label>
                            <input type="text" class="form-control" id="editOrderId" placeholder="Enter order ID">
                          </div>

                          <!-- Banner Title -->
                          <div class="mb-3">
                            <label for="editBannerTitle" class="form-label">Banner Title</label>
                            <input type="text" class="form-control" id="editBannerTitle"
                              placeholder="Enter banner title">
                          </div>

                          <!-- Current Banner Preview -->
                          <div class="mb-3">
                            <label class="form-label">Current Banner</label>
                            <img id="currentBannerPreview" src="" alt="Current Banner" style="max-width: 100px;"
                              class="d-block mb-2">
                          </div>

                          <!-- New Banner Image Preview -->
                          <div class="mb-3">
                            <label for="editBannerImage" class="form-label">New Banner Image</label>
                            <input type="file" class="form-control" id="editBannerImage"
                              onchange="previewNewBannerImage()">
                            <small class="text-muted">Select a new image to update.</small>
                            <img id="newBannerPreview" src="" alt="New Banner Preview"
                              style="max-width: 100px; display: none;" class="d-block mt-2">
                          </div>

                          <!-- Status Toggle -->
                          <div class="mb-3">
                            <label for="editBannerStatus" class="form-label">Status</label>
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="editBannerStatus"
                                onchange="toggleStatusText('editBannerStatusLabel', this)">
                              <label class="form-check-label" for="editBannerStatus"
                                id="editBannerStatusLabel">Active</label>
                            </div>
                          </div>

                          <!-- Submit Button -->
                          <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-danger" style="margin-left: 10px;" data-bs-dismiss="modal">Cancel</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- model for edit banner end -->

                <!-- member list start ============================================================================================================================ -->
                <div class="container-fluid mt-3">
                  <div class="card">
                    <div class="card-header">
                      <div class="d-flex align-items-center">
                        <h4 class="card-title">Member List</h4>
                        <!-- Add Member Button -->
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                          data-bs-target="#addMemberModal">
                          <i class="fa fa-plus"></i> Add
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <form>
                        <!-- Table Layout -->
                        <div class="table-responsive">
                          <table class="table table-striped table-hover">
                            <thead>
                              <tr>
                                <th style="width: 20%;">Order ID</th>
                                <th style="width: 20%;">Name</th>
                                <th style="width: 20%;">Qualification</th>
                                <th style="width: 20%;">Institution</th>
                                <th style="width: 15%;">Designation</th>
                                <th style="width: 15%;">Affiliation</th>
                                <th style="width: 10%;" class="text-center">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <!-- Member Row start -->
                              <tr>
                                <td>1</td>
                                <td>Dr. C.Padma Priyadharshini</td>
                                <td>MBBS, DNB, MS., Ph.D.</td>
                                <td>Director, NIRT, Chennai</td>
                                <td>Chairperson</td>
                                <td> Not Affiliated</td>
                                <td class="text-center">
                                  <!-- Actions with icons -->
                                  <div class="form-button-action">
                                    <button type="button" class="btn btn-link btn-primary text-center"
                                      data-bs-toggle="modal" data-bs-target="#editMemberModal"
                                      onclick="editMember('John Doe', 'M.Sc Computer Science', 'Harvard University', 'Professor', 'IEEE', true)">
                                      <i class="fa fa-edit"></i>
                                    </button>
                                  </div>
                                </td>
                              </tr>
                              <!-- Member Row end -->
                              <!-- Repeat similar rows for additional members -->
                            </tbody>
                          </table>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>
                <!-- member list end =========================================================================================================================== -->

                <!-- modal for adding member start -->
                <div class="modal fade" id="addMemberModal" tabindex="-1" aria-labelledby="addMemberModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="addMemberModalLabel">Add New Member</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form id="addMemberForm">


                          <!-- Order ID -->
                          <div class="mb-3">
                            <label for="editOrderId" class="form-label">Order ID</label>
                            <input type="text" class="form-control" id="editOrderId" placeholder="Enter order ID">
                          </div>

                          <!-- Name Field -->
                          <div class="mb-3">
                            <label for="memberName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="memberName" placeholder="Enter member name"
                              required>
                          </div>

                          <!-- Qualification Field -->
                          <div class="mb-3">
                            <label for="memberQualification" class="form-label">Qualification</label>
                            <input type="text" class="form-control" id="memberQualification"
                              placeholder="Enter qualification" required>
                          </div>

                          <!-- Institution Field -->
                          <div class="mb-3">
                            <label for="memberInstitution" class="form-label">Institution</label>
                            <input type="text" class="form-control" id="memberInstitution"
                              placeholder="Enter institution" required>
                          </div>

                          <!-- Designation Field -->
                          <div class="mb-3">
                            <label for="memberDesignation" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="memberDesignation"
                              placeholder="Enter designation" required>
                          </div>

                          <!-- Affiliation Toggle -->
                          <div class="mb-3">
                            <label for="addMemberAffiliation" class="form-label">Affiliation</label>
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="addMemberAffiliation"
                                onchange="toggleAffiliationText('addMemberAffiliationLabel', this)">
                              <label class="form-check-label" for="addMemberAffiliation"
                                id="addMemberAffiliationLabel">No Affiliation</label>
                            </div>
                          </div>

                          <!-- Status Toggle -->
                          <div class="mb-3">
                            <label for="memberStatus" class="form-label">Status</label>
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="memberStatus" checked
                                onchange="toggleStatusText('memberStatusLabel', this)">
                              <label class="form-check-label" for="memberStatus" id="memberStatusLabel">Active</label>
                            </div>
                          </div>

                          <!-- Submit Button -->
                          <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-danger" style="margin-left: 10px;" data-bs-dismiss="modal">Cancel</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- modal for adding member end -->

                <!-- modal for edit member start -->
                <div class="modal fade" id="editMemberModal" tabindex="-1" aria-labelledby="editMemberModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editMemberModalLabel">Edit Member</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form id="editMemberForm">

                          <!-- Order ID -->
                          <div class="mb-3">
                            <label for="editOrderId" class="form-label">Order ID</label>
                            <input type="text" class="form-control" id="editOrderId" placeholder="Enter order ID">
                          </div>


                          <!-- Name Field -->
                          <div class="mb-3">
                            <label for="editMemberName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editMemberName" placeholder="Enter member name">
                          </div>

                          <!-- Qualification Field -->
                          <div class="mb-3">
                            <label for="editMemberQualification" class="form-label">Qualification</label>
                            <input type="text" class="form-control" id="editMemberQualification"
                              placeholder="Enter qualification">
                          </div>

                          <!-- Institution Field -->
                          <div class="mb-3">
                            <label for="editMemberInstitution" class="form-label">Institution</label>
                            <input type="text" class="form-control" id="editMemberInstitution"
                              placeholder="Enter institution">
                          </div>

                          <!-- Designation Field -->
                          <div class="mb-3">
                            <label for="editMemberDesignation" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="editMemberDesignation"
                              placeholder="Enter designation">
                          </div>

                          <!-- Affiliation Toggle -->
                          <div class="mb-3">
                            <label for="editMemberAffiliationToggle" class="form-label">Affiliation</label>
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="editMemberAffiliationToggle"
                                onchange="toggleAffiliationText('editMemberAffiliationLabel', this)">
                              <label class="form-check-label" for="editMemberAffiliationToggle"
                                id="editMemberAffiliationLabel">No Affiliation</label>
                            </div>
                          </div>

                          <!-- Status Toggle -->
                          <div class="mb-3">
                            <label for="editMemberStatus" class="form-label">Status</label>
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="editMemberStatus"
                                onchange="toggleStatusText('editMemberStatusLabel', this)">
                              <label class="form-check-label" for="editMemberStatus"
                                id="editMemberStatusLabel">Active</label>
                            </div>
                          </div>

                          <!-- Submit Button -->
                          <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-danger" style="margin-left: 10px;" data-bs-dismiss="modal">Cancel</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- modal for edit member end -->

                <!-- Certificate Images Upload start==================================================================================-->
                <div class="container-fluid mt-3">
                  <div class="card">
                    <div class="card-header">
                      <div class="d-flex align-items-center">
                        <h4 class="card-title">Certificate Image List</h4>
                        <!-- Add Image Button -->
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                          data-bs-target="#addImageModal">
                          <i class="fa fa-plus"></i> Add
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <form>
                        <!-- Table Layout -->
                        <div class="table-responsive">
                          <table class="table table-striped table-hover">
                            <thead>
                              <tr>
                                <th style="width: 20%;">Order ID</th>
                                <th style="width: 20%;">Image</th>
                                <th style="width: 20%;">Last Update</th>
                                <th style="width: 15%;">Status</th>
                                <th style="width: 10%;" class="text-center">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <!-- Image Row start -->
                              <tr>
                                <td>12345</td>
                                <td>
                                  <img src="assets/img/sample-image.png" alt="Sample Image" style="max-width: 100px;">
                                </td>
                                <td>10/20/2024</td>
                                <td class="text-success" style="font-weight: bold;">Active</td>
                                <td class="text-center">
                                  <!-- Actions with icons -->
                                  <div class="form-button-action">
                                    <button type="button" class="btn btn-link btn-primary text-center"
                                      data-bs-toggle="modal" data-bs-target="#editImageModal"
                                      onclick="editImage('12345', 'assets/img/sample-image.png', true)">
                                      <i class="fa fa-edit"></i>
                                    </button>
                                  </div>
                                </td>
                              </tr>
                              <!-- Image Row end -->
                            </tbody>
                          </table>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <hr>

                <!-- Modal for Adding Image -->
                <div class="modal fade" id="addImageModal" tabindex="-1" aria-labelledby="addImageModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="addImageModalLabel">Add New Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form id="addImageForm">
                          <!-- Order ID -->
                          <div class="mb-3">
                            <label for="orderId" class="form-label">Order ID</label>
                            <input type="text" class="form-control" id="orderId" placeholder="Enter order ID" required>
                          </div>

                          <!-- Image Upload -->
                          <div class="mb-3">
                            <label for="imageUpload" class="form-label">Upload Image</label>
                            <input type="file" class="form-control" id="imageUpload" accept="image/*" required
                              onchange="previewImage(event)">
                            <small class="form-text text-danger">Accepted formats: .jpg, .jpeg, .png, max size:
                              5MB</small>
                          </div>

                          <!-- Image Preview -->
                          <div class="mb-3 text-center">
                            <img id="imagePreview" src="" alt="Image Preview"
                              style="display:none; max-width: 100px; margin-top: 10px;" />
                          </div>

                          <!-- Status Toggle -->
                          <div class="mb-3">
                            <label for="imageStatus" class="form-label">Status</label>
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="imageStatus" checked
                                onchange="toggleStatusText('imageStatusLabel', this)">
                              <label class="form-check-label" for="imageStatus" id="imageStatusLabel">Active</label>
                            </div>
                          </div>

                         <!-- Submit Button -->
                         <div class="d-flex justify-content-end">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <button type="button" class="btn btn-danger" style="margin-left: 10px;" data-bs-dismiss="modal">Cancel</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal for Editing Image -->
                <div class="modal fade" id="editImageModal" tabindex="-1" aria-labelledby="editImageModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editImageModalLabel">Edit Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form id="editImageForm">
                          <!-- Order ID -->
                          <div class="mb-3">
                            <label for="editOrderId" class="form-label">Order ID</label>
                            <input type="text" class="form-control" id="editOrderId" placeholder="Enter order ID">
                          </div>

                          <!-- Current Image Preview -->
                          <div class="mb-3">
                            <label class="form-label">Current Image</label>
                            <img id="currentImagePreview" src="" alt="Current Image" style="max-width: 100px;"
                              class="d-block mb-2">
                          </div>

                          <!-- New Image Upload -->
                          <div class="mb-3">
                            <label for="editImageUpload" class="form-label">New Image Upload</label>
                            <input type="file" class="form-control" id="editImageUpload" onchange="previewNewImage()">
                            <small class="text-muted">Select a new image to update.</small>
                            <img id="newImagePreview" src="" alt="New Image Preview"
                              style="max-width: 100px; display: none;" class="d-block mt-2">
                          </div>

                          <!-- Status Toggle -->
                          <div class="mb-3">
                            <label for="editImageStatus" class="form-label">Status</label>
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="editImageStatus"
                                onchange="toggleStatusText('editImageStatusLabel', this)">
                              <label class="form-check-label" for="editImageStatus"
                                id="editImageStatusLabel">Active</label>
                            </div>
                          </div>

                          <!-- Submit Button -->
                          <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-danger" style="margin-left: 10px;" data-bs-dismiss="modal">Cancel</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Buttons
                  <div class="d-flex mt-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-danger" style="margin-left: 10px;">Cancel</button>
                  </div> -->
                <!-- </form> -->
              </div>
            </div>
          </div>
        </div>

        <!-- database table end -->
      </div>
      @endsection
