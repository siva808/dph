@extends('admin.layouts.layout')

@section('title', 'Edit Configuration')

@section('content')
<div class="container-fluid">
    <div class="page-inner">
      <!-- insert the contents Here start -->

      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-lg-10"
            style="background: linear-gradient(to right, #ffffff, #ffffff); border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">

            <form>
              <!-- Separate div for Government and DPH Names -->
              <div class="mb-4 p-5">
                <h2 class="mb-4">Government Name In Header</h2>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="govNameTamil" class="form-label font-weight-bold">Government Name (Tamil)</label>
                    <input type="text" class="form-control shadow-sm" id="govNameTamil"
                      placeholder="Enter government name in Tamil" required>
                  </div>
                  <div class="col-md-6 d-flex align-items-center">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="statusGovNameTamil" checked>
                      <label class="form-check-label" for="statusGovNameTamil">Active</label>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="govNameEnglish" class="form-label font-weight-bold">Government Name
                      (English)</label>
                    <input type="text" class="form-control shadow-sm" id="govNameEnglish"
                      placeholder="Enter government name in English" required>
                  </div>
                  <div class="col-md-6 d-flex align-items-center">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="statusGovNameEnglish" checked>
                      <label class="form-check-label" for="statusGovNameEnglish">Active</label>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="dphNameTamil" class="form-label font-weight-bold">DPH Name (Tamil)</label>
                    <input type="text" class="form-control shadow-sm" id="dphNameTamil"
                      placeholder="Enter DPH name in Tamil" required>
                  </div>
                  <div class="col-md-6 d-flex align-items-center">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="statusDphNameTamil" checked>
                      <label class="form-check-label" for="statusDphNameTamil">Active</label>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="dphNameEnglish" class="form-label font-weight-bold">DPH Name (English)</label>
                    <input type="text" class="form-control shadow-sm" id="dphNameEnglish"
                      placeholder="Enter DPH name in English" required>
                  </div>
                  <div class="col-md-6 d-flex align-items-center">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="statusDphNameEnglish" checked>
                      <label class="form-check-label" for="statusDphNameEnglish">Active</label>
                    </div>
                  </div>
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
                      <td><label for="logo1" class="form-label font-weight-bold">Logo 1</label></td>
                      <td>
                        <input type="file" class="form-control shadow-sm" id="logo1" accept="image/*" required
                          onchange="previewLogoImage(event, 'imagePreviewLogo1')">
                        <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed max size is 5MB</small>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="statusLogo1" checked>
                          <label class="form-check-label" for="statusLogo1">Active</label>
                        </div>
                      </td>
                      <td>
                        <img id="imagePreviewLogo1" src="#" alt="Image Preview"
                          class="img-fluid rounded border shadow-sm" style="max-width: 100px; display: none;"
                          data-bs-toggle="modal" data-bs-target="#logoImageModal"
                          onclick="showLogoImageModal('imagePreviewLogo1')"
                          title="Click to view the image clearly">
                      </td>
                    </tr>
                    <!-- logo 1 end -->

                    <!-- logo 2 start -->
                    <tr>
                      <td><label for="logo2" class="form-label font-weight-bold">Logo 2</label></td>
                      <td>
                        <input type="file" class="form-control shadow-sm" id="logo2" accept="image/*" required
                          onchange="previewImage(event, 'imagePreviewLogo2')">
                        <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed max size is
                          5MB</small>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="statusLogo2" checked>
                          <label class="form-check-label" for="statusLogo2">Active</label>
                        </div>
                      </td>
                      <td>
                        <img id="imagePreviewLogo2" src="#" alt="Image Preview"
                          class="img-fluid rounded border shadow-sm" style="max-width: 100px; display: none;"
                          onclick="showImageModal('imagePreviewLogo2')">
                      </td>
                    </tr>
                    <!-- logo 2 end -->

                    <!-- logo 3 start -->
                    <tr>
                      <td><label for="logo3" class="form-label font-weight-bold">Logo 3</label></td>
                      <td>
                        <input type="file" class="form-control shadow-sm" id="logo3" accept="image/*" required
                          onchange="previewImage(event, 'imagePreviewLogo3')">
                        <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed max size is
                          5MB</small>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="statusLogo3" checked>
                          <label class="form-check-label" for="statusLogo3">Active</label>
                        </div>
                      </td>
                      <td>
                        <img id="imagePreviewLogo3" src="#" alt="Image Preview"
                          class="img-fluid rounded border shadow-sm" style="max-width: 100px; display: none;"
                          onclick="showImageModal('imagePreviewLogo3')">
                      </td>
                    </tr>
                    <!-- logo 3 end -->

                    <!-- logo 4 start -->
                    <tr>
                      <td><label for="logo4" class="form-label font-weight-bold">Logo 4</label></td>
                      <td>
                        <input type="file" class="form-control shadow-sm" id="logo4" accept="image/*" required
                          onchange="previewImage(event, 'imagePreviewLogo4')">
                        <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed max size is
                          5MB</small>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="statusLogo4" checked>
                          <label class="form-check-label" for="statusLogo4">Active</label>
                        </div>
                      </td>
                      <td>
                        <img id="imagePreviewLogo4" src="#" alt="Image Preview"
                          class="img-fluid rounded border shadow-sm" style="max-width: 100px; display: none;"
                          onclick="showImageModal('imagePreviewLogo4')">
                      </td>
                    </tr>
                    <!-- logo 4 end -->

                    <!-- logo 5 start -->
                    <tr>
                      <td><label for="logo5" class="form-label font-weight-bold">Logo 1</label></td>
                      <td>
                        <input type="file" class="form-control shadow-sm" id="logo5" accept="image/*" required
                          onchange="previewImage(event, 'imagePreviewLogo5')">
                        <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed max size is
                          5MB</small>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="statusLogo5" checked>
                          <label class="form-check-label" for="statusLogo5">Active</label>
                        </div>
                      </td>
                      <td>
                        <img id="imagePreviewLogo5" src="#" alt="Image Preview"
                          class="img-fluid rounded border shadow-sm" style="max-width: 100px; display: none;"
                          onclick="showImageModal('imagePreviewLogo5')">
                      </td>
                    </tr>
                    <!-- logo 5 end -->


                    <!-- logo 6 start -->
                    <tr>
                      <td><label for="logo6" class="form-label font-weight-bold">Logo 6</label></td>
                      <td>
                        <input type="file" class="form-control shadow-sm" id="logo6" accept="image/*" required
                          onchange="previewImage(event, 'imagePreviewLogo6')">
                        <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed max size is
                          5MB</small>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="statusLogo6" checked>
                          <label class="form-check-label" for="statusLogo6">Active</label>
                        </div>
                      </td>
                      <td>
                        <img id="imagePreviewLogo6" src="#" alt="Image Preview"
                          class="img-fluid rounded border shadow-sm" style="max-width: 100px; display: none;"
                          onclick="showImageModal('imagePreviewLogo6')">
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
                    <label for="scrollerNotification" class="form-label font-weight-bold">Notification
                      Text</label>
                    <textarea class="form-control shadow-sm" id="scrollerNotification"
                      placeholder="Enter scrolling notification text" rows="4" required></textarea>
                  </div>
                  <div class="col-md-2 d-flex align-items-center">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="statusScrollerNotification" checked>
                      <label class="form-check-label" for="statusScrollerNotification">Active</label>
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
                      <td><label for="Banner1" class="form-label font-weight-bold">Banner 1</label></td>
                      <td>
                        <input type="file" class="form-control shadow-sm" id="Banner1" accept="image/*" required
                          onchange="previewBannerImage(event, 'imagePreviewBanner1')">
                        <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed max size is 5MB</small>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="statusBanner1" checked>
                          <label class="form-check-label" for="statusBanner1">Active</label>
                        </div>
                      </td>
                      <td>
                        <img id="imagePreviewBanner1" src="#" alt="Image Preview"
                          class="img-fluid rounded border shadow-sm" style="max-width: 100px; display: none;"
                          data-bs-toggle="modal" data-bs-target="#bannerImageModal"
                          onclick="showBannerImageModal('imagePreviewBanner1')"
                          title="Click to view the image clearly">
                      </td>
                    </tr>
                    <!-- banner 1 end -->
                    <!-- banner 2 start -->
                    <tr>
                      <td><label for="Banner2" class="form-label font-weight-bold">Banner 2</label></td>
                      <td>
                        <input type="file" class="form-control shadow-sm" id="Banner2" accept="image/*" required
                          onchange="previewImage(event, 'imagePreviewBanner2')">
                        <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed max size is
                          5MB</small>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="statusBanner2" checked>
                          <label class="form-check-label" for="statusBanner2">Active</label>
                        </div>
                      </td>
                      <td>
                        <img id="imagePreviewBanner2" src="#" alt="Image Preview"
                          class="img-fluid rounded border shadow-sm" style="max-width: 100px; display: none;"
                          data-bs-toggle="modal" data-bs-target="#imageModal"
                          onclick="showImageModal('imagePreviewBanner2')" title="click to view the image clearly">
                      </td>
                    </tr>
                    <!-- banner 2 end -->
                    <!-- banner 3 start -->
                    <tr>
                      <td><label for="Banner3" class="form-label font-weight-bold">Banner 3</label></td>
                      <td>
                        <input type="file" class="form-control shadow-sm" id="Banner3" accept="image/*" required
                          onchange="previewImage(event, 'imagePreviewBanner3')">
                        <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed max size is
                          5MB</small>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="statusBanner3" checked>
                          <label class="form-check-label" for="statusBanner3">Active</label>
                        </div>
                      </td>
                      <td>
                        <img id="imagePreviewBanner3" src="#" alt="Image Preview"
                          class="img-fluid rounded border shadow-sm" style="max-width: 100px; display: none;"
                          data-bs-toggle="modal" data-bs-target="#imageModal"
                          onclick="showImageModal('imagePreviewBanner3')" title="click to view the image clearly">
                      </td>
                    </tr>
                    <!-- banner 3 end -->
                    <!-- banner 4 start -->
                    <tr>
                      <td><label for="Banner4" class="form-label font-weight-bold">Banner 4</label></td>
                      <td>
                        <input type="file" class="form-control shadow-sm" id="Banner4" accept="image/*" required
                          onchange="previewImage(event, 'imagePreviewBanner4')">
                        <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed max size is
                          5MB</small>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="statusBanner4" checked>
                          <label class="form-check-label" for="statusBanner4">Active</label>
                        </div>
                      </td>
                      <td>
                        <img id="imagePreviewBanner4" src="#" alt="Image Preview"
                          class="img-fluid rounded border shadow-sm" style="max-width: 100px; display: none;"
                          data-bs-toggle="modal" data-bs-target="#imageModal"
                          onclick="showImageModal('imagePreviewBanner4')" title="click to view the image clearly">
                      </td>
                    </tr>
                    <!-- banner 4 end -->
                    <!-- banner 5 start -->
                    <tr>
                      <td><label for="Banner5" class="form-label font-weight-bold">Banner 5</label></td>
                      <td>
                        <input type="file" class="form-control shadow-sm" id="Banner5" accept="image/*" required
                          onchange="previewImage(event, 'imagePreviewBanner5')">
                        <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed max size is
                          5MB</small>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="statusBanner5" checked>
                          <label class="form-check-label" for="statusBanner5">Active</label>
                        </div>
                      </td>
                      <td>
                        <img id="imagePreviewBanner5" src="#" alt="Image Preview"
                          class="img-fluid rounded border shadow-sm" style="max-width: 100px; display: none;"
                          data-bs-toggle="modal" data-bs-target="#imageModal"
                          onclick="showImageModal('imagePreviewBanner5')" title="click to view the image clearly">
                      </td>
                    </tr>
                    <!-- banner 5 end -->
                    <!-- banner 6 start -->
                    <tr>
                      <td><label for="Banner6" class="form-label font-weight-bold">Banner 6</label></td>
                      <td>
                        <input type="file" class="form-control shadow-sm" id="Banner6" accept="image/*" required
                          onchange="previewImage(event, 'imagePreviewBanner6')">
                        <small class="sizeoftextred">Accepted .jpg/.jpeg/.png format & allowed max size is
                          5MB</small>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="statusBanner6" checked>
                          <label class="form-check-label" for="statusBanner6">Active</label>
                        </div>
                      </td>
                      <td>
                        <img id="imagePreviewBanner6" src="#" alt="Image Preview"
                          class="img-fluid rounded border shadow-sm" style="max-width: 100px; display: none;"
                          data-bs-toggle="modal" data-bs-target="#imageModal"
                          onclick="showImageModal('imagePreviewBanner6')" title="click to view the image clearly">
                      </td>
                    </tr>
                    <!-- banner 6 end -->
                  </tbody>
                </table>
              </div>

              <!-- Image Modal with Custom Size popup start-->
              <!-- Banner Image Modal start-->
              <div class="modal fade" id="bannerImageModal" tabindex="-1" aria-labelledby="bannerImageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="bannerImageModalLabel">Banner Image Preview</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                      <img id="bannerModalImage" src="#" alt="Banner Image" class="img-fluid"
                        style="max-width: 100%; max-height: 80vh; object-fit: contain;">
                    </div>
                  </div>
                </div>
              </div>
              <!-- Banner Image Modal end-->

              <!-- Logo Image Modal start -->
              <div class="modal fade" id="logoImageModal" tabindex="-1" aria-labelledby="logoImageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="logoImageModalLabel">Logo Image Preview</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                      <img id="logoModalImage" src="#" alt="Logo Image" class="img-fluid"
                        style="max-width: 100%; max-height: 80vh; object-fit: contain;">
                    </div>
                  </div>
                </div>
              </div>
              <!-- Logo Image Modal end -->
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
@endsection