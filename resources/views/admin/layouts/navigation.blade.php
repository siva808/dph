<div class="sidebar" data-background-color="white">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="white">
        <a href="{{url('/dashboard')}}" class="logo">
          <img src="{{logo()}}" alt="navbar brand" class="navbar-brand" height="60" />
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i style="color: black;" class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i style="color: black;" class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i style="color: black;" class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
          <li class="nav-section">
            <h4 class="text-section">Menus</h4>
          </li>




          <!-- dashboard------------------ -->
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#dashboard">
              <i class="bi bi-house"></i>
              <p>Dashboard</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="dashboard">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{url('/dashboard')}}">
                    <span class="sub-item">Admin</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <!-- Reports------------------ -->
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#reports">
              <i class="bi bi-bookmarks"></i>
              <p>Reports</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="reports">
              <ul class="nav nav-collapse">
                <li>
                  <a href="reports.html">
                    <span class="sub-item">Downloads</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <!-- Approval Management------------------ -->
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#appmanage">
              <i class="bi bi-grid"></i>
              <p>Approval Management</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="appmanage">
              <ul class="nav nav-collapse">
                <li>
                  <a href="manage_documents.html">
                    <span class="sub-item">Uploads</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <!-- Upload Management------------------ -->
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#uploadmanage">
              <i class="bi bi-upload"></i>
              <p>Upload Management</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="uploadmanage">
              <ul class="nav nav-collapse">
                <li>
                  <a href="all_documents.html">
                    <span class="sub-item">All Documents</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
           <!-- Content Upload ------------------ -->
           <li class="nav-item">
            <a data-bs-toggle="collapse" href="#contentupload">
              <i class="bi bi-cloud-upload"></i>
              <p>Content Upload</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="contentupload">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{url('/testimonials')}}">
                    <span class="sub-item">Director Message</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/programdetails')}}">
                    <span class="sub-item">Program & Divisions</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/welcome-banner')}}">
                    <span class="sub-item">Welcome Banner</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/schemedetails')}}">
                    <span class="sub-item">Scheme Details</span>
                  </a>
                </li>
                <li>
                  <a href="scrollernotification_list.html">
                    <span class="sub-item">Scroller Notification</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/new-documents?document_type=1')}}">
                    <span class="sub-item">GO's</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/new-documents?document_type=2')}}">
                    <span class="sub-item">Circulars/Instructions</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/new-documents?document_type=3')}}">
                    <span class="sub-item">Proceedings</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/new-documents?document_type=4,15')}}">
                    <span class="sub-item">Acts/Rules</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/new-documents?document_type=5')}}">
                    <span class="sub-item">Publications</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/new-documents?document_type=7')}}">
                    <span class="sub-item">RTI</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/new-documents?document_type=8')}}">
                    <span class="sub-item">Policy Note</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/new-documents?document_type=9')}}">
                    <span class="sub-item">Performance Budget</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/new-documents?document_type=10')}}">
                    <span class="sub-item">Reports</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/new-documents?document_type=11')}}">
                    <span class="sub-item">Other Documents</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/new-documents?document_type=12')}}">
                    <span class="sub-item">Notification</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/new-documents?document_type=13')}}">
                    <span class="sub-item">Events</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/new-documents?document_type=14')}}">
                    <span class="sub-item">Important Link</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/contacts')}}">
                    <span class="sub-item">Contacts</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/health-walk')}}">
                    <span class="sub-item">HealthWalk</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/dph-icon')}}">
                    <span class="sub-item">DPH ICON</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/notifications')}}">
                    <span class="sub-item">Ethics Committes
                    </span>
                  </a>
                </li>

              </ul>
            </div>
          </li>
          <!-- Website Management------------------ -->
          <!-- <li class="nav-section">
            <h4 class="text-section"></h4>
          </li> -->
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#webmanage">
              <i class="bi bi-gear"></i>
              <p>Website Management</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="webmanage">
              <ul class="nav nav-collapse">
                <li>
                  <a href="mainmenu_list.html">
                    <span class="sub-item">Main Menu</span>
                  </a>
                </li>
                <li>
                  <a href="parentsubmenu_list.html">
                    <span class="sub-item">Parent SubMenu</span>
                  </a>
                </li>
                <li>
                  <a href="childsubmenu_list.html">
                    <span class="sub-item">Child SubMenu</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/scroller-notif')}}">
                    <span class="sub-item">Scroller Notification</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/social-media')}}">
                    <span class="sub-item">Social Media Update</span>
                  </a>
                </li>
                <li>
                  <a href="nearbyphc_list.html">
                    <span class="sub-item">Nearby PHC</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/partner')}}">
                    <span class="sub-item">Partner Logos</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/header')}}">
                    <span class="sub-item">Header</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/footer')}}">
                    <span class="sub-item">Footer</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <!-- USER Management------------------ -->
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#usermgmt">
              <i class="bi bi-people"></i>
              <p>User Management</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="usermgmt">
              <ul class="nav nav-collapse">
                <li>
                  <a href="users_list.html">
                    <span class="sub-item">Create</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
           <!-- Health Facility------------------ -->
           <li class="nav-item">
            <a data-bs-toggle="collapse" href="#healthfac">
              <i class="bi bi-shield-plus"></i>
              <p>Health Facility</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="healthfac">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('facility_hierarchy.index')}}">
                    <span class="sub-item">Facility Master</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="sub-item">Facility Profile</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <!-- Reference Tables------------------ -->
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#reftable">
              <i class="bi bi-table"></i>
              <p>Reference Tables</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="reftable">
              <ul class="nav nav-collapse">
                <li>
                  <a href="userrole_list.html">
                    <span class="sub-item">User Roles</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/designations')}}">
                    <span class="sub-item">Designations</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/sections')}}">
                    <span class="sub-item">Sections</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/programs')}}">
                    <span class="sub-item">Program Division</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/schemes')}}">
                    <span class="sub-item">Schemes</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/masters?master_type=1')}}">
                    <span class="sub-item">Language</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/masters?master_type=2')}}">
                    <span class="sub-item">Publication</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/masters?master_type=3')}}">
                    <span class="sub-item">Notification</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <!--  Hierarchy Levels ------------------ -->
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#hierarchylvl">
              <i class="bi bi-diagram-2"></i>
              <p>Hierarchy Levels</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="hierarchylvl">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{url('/districts')}}">
                    <span class="sub-item">District</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/huds')}}">
                    <span class="sub-item">HUD</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/blocks')}}">
                    <span class="sub-item">Block</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/phc')}}">
                    <span class="sub-item">PHC</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/hsc')}}">
                    <span class="sub-item">HSC</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

        </ul>
      </div>
    </div>
  </div>
