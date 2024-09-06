<div class="sidebar" data-background-color="white">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="white">
            <a href="{{url('/dashboard')}}" class="logo">
                <img src="{{logo()}}" alt="navbar brand" class="navbar-brand"
                    height="60" />
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
                    <h4 class="text-section">Menu</h4>
                </li>

                <!-- dashboard------------------ -->
                <li class="nav-item active">
                    <a href="{{url('/dashboard')}}" class="collapsed" aria-expanded="false">
                        <i class="bi bi-house"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- Website Management------------------ -->
                <li class="nav-section">
                    <h4 class="text-section">Website Management</h4>
                </li>
                <!-- Testimonial------------------ -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#base">
                        <i class="bi bi-bar-chart"></i>
                        <p>Director Message</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href={{url('/testimonials/create')}}>
                                    <span class="sub-item">Create</span>
                                </a>
                            </li>
                            <li>
                                <a href={{url('/testimonials')}}>
                                    <span class="sub-item">List</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Config------------------ -->
                <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#config">
                    <i class="bi bi-gear"></i>
                      <p>Configuration</p>
                      <span class="caret"></span>
                  </a>
                  <div class="collapse" id="config">
                      <ul class="nav nav-collapse">
                          <li>
                              <a  href="{{url('/header')}}">
                                  <span class="sub-item">Header</span>
                                  <!-- <span class="caret"></span> -->
                              </a>
                          </li>
                          <li>
                            <a href="{{url('/footer')}}">
                                <span class="sub-item">Footer</span>
                                <!-- <span class="caret"></span> -->
                            </a>
                        </li>
                      </ul>
                  </div>
              </li>
                <!-- Documents------------------ -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#forms">
                        <i class="bi bi-file-earmark-text"></i>
                        <p>Documents</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="forms">
                        <ul class="nav nav-collapse">
                          <li>
                            <a href="{{url('/documents')}}">
                              <span class="sub-item">All Documents</span>
                            </a>
                          </li>
                          <li>
                            <a href="{{url('/documents?navigation=1')}}">
                              <span class="sub-item">GO's</span>
                            </a>
                          </li>
                          <li>
                            <a href="doc_list_circulars.html">
                              <span class="sub-item">Circulars</span>
                            </a>
                          </li>
                          <li>
                            <a href="doc_list_instructions.html">
                              <span class="sub-item">Instructions</span>
                            </a>
                          </li>
                          <li>
                            <a href="doc_list_actsAndrules.html">
                              <span class="sub-item">Acts/Rules</span>
                            </a>
                          </li>
                          <li>
                            <a href="doc_list_proceedings.html">
                              <span class="sub-item">Proceedings</span>
                            </a>
                          </li>
                          <li>
                            <a href="doc_list_publications.html">
                              <span class="sub-item">publications</span>
                            </a>
                          </li>
                          <li>
                            <a href="doc_list_others.html">
                              <span class="sub-item">Others</span>
                            </a>
                          </li>
                          <li>
                            <a href="doc_list_newsAndnitification.html">
                              <span class="sub-item">News & Notifications</span>
                            </a>
                          </li>
                          <li>
                            <a href="doc_list_events.html">
                              <span class="sub-item">Events</span>
                            </a>
                          </li>
                          <li>
                            <a href="doc_list_importantlinks.html">
                              <span class="sub-item">Important Links</span>
                            </a>
                          </li>
                          <li>
                            <a href="doc_list_rti.html">
                              <span class="sub-item">RTI</span>
                            </a>
                          </li>
                          <li>
                            <a href="doc_list_announcements.html">
                              <span class="sub-item">Announcements</span>
                            </a>
                          </li>
                          <li>
                            <a href="doc_list_library.html">
                              <span class="sub-item">Library</span>
                            </a>
                          </li>
                        </ul>
                    </div>
                </li>
                <!-- Contacts------------------ -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#tables">
                        <i class="bi bi-person-lines-fill"></i>
                        <p>Contacts</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="tables">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="#">
                                    <span class="sub-item">Create</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">List</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Masters------------------ -->
                <li class="nav-section">
                    <h4 class="text-section">Masters</h4>
                </li>
                <!-- Designation------------------ -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#maps">
                        <i class="bi bi-person-badge"></i>
                        <p>Designation</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="maps">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="#">
                                    <span class="sub-item">Create</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">List</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#">
                        <i class="bi bi-heart"></i>
                        <p>Health Walk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#districts">
                        <i class="bi bi-map"></i>
                        <p>District</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="districts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="charts/charts.html">
                                    <span class="sub-item">Create</span>
                                </a>
                            </li>
                            <li>
                                <a href="charts/sparkline.html">
                                    <span class="sub-item">List</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#HUD">
                        <i class="bi bi-hospital"></i>
                        <p>HUD</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="HUD">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="#">
                                    <span class="sub-item">Create</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/huds')}}">
                                    <span class="sub-item">List</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#block">
                        <i class="bi bi-grid-3x3"></i>
                        <p>Block</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="block">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="#">
                                    <span class="sub-item">Create</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">List</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#PHC">
                        <i class="bi bi-building"></i>
                        <p>PHC</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="PHC">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="#">
                                    <span class="sub-item">Create</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">List</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#HSC">
                        <i class="bi bi-shield-plus"></i>
                        <p>HSC</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="HSC">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="#">
                                    <span class="sub-item">Create</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">List</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#facility">
                        <i class="bi bi-chat"></i>
                        <p>Facility Type</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="facility">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="#">
                                    <span class="sub-item">Create</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">List</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-section">
                    <h4 class="text-section">Reports</h4>
                </li>
                <li class="nav-item">
                    <a href="#">
                        <i class="bi bi-bookmarks"></i>
                        <p>Report</p>
                        <span class="badge badge-danger">4</span>
                    </a>
                </li>
                <!-- Account------------------ -->
                <li class="nav-section">
                    <h4 class="text-section">USER Management</h4>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#accounts">
                        <i class="bi bi-people"></i>
                        <p>Users</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="accounts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="#">
                                    <span class="sub-item">Add User</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">All User</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">User Roles</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#submenu">
                        <i class="fas fa-bars"></i>
                        <p>Menu Levels</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="submenu">
                        <ul class="nav nav-collapse">
                            <li>
                                <a data-bs-toggle="collapse" href="#subnav1">
                                    <span class="sub-item">Level 1</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="subnav1">
                                    <ul class="nav nav-collapse subnav">
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 2</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a data-bs-toggle="collapse" href="#subnav2">
                                    <span class="sub-item">Level 1</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="subnav2">
                                    <ul class="nav nav-collapse subnav">
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">Level 1</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
