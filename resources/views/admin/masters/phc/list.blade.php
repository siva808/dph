@extends('admin.layouts.layout')
@section('title', 'List Phc')
@section('content')
    <div class="container" style="margin-top: 90px;">
        <div class="container-fluid p-2" style="background-color: #f2f2f2;">
            <div class="d-flex justify-content-between align-items-center" style="padding-left: 20px; padding-right: 20px;">
                <h5 class="mb-0">Public Health District</h5>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0" style="background-color: #f2f2f2;">
                        <li class="breadcrumb-item"><a href="#">PHC</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ol>
                </nav>

            </div>
        </div>
        <div class="container-fluid">
            <div class="page-inner">
                <!-- insert the contents Here start -->

                <div class="card mb-0 mt-2">
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col col-md-4">
                                    <div class="form-group">
                                        <label>Block</label>
                                        <select name="block_id" class="form-control searchable" onchange="searchFun()">
                                            <option value="">-- Select Block -- </option>
                                            @foreach ($huds as $hud)
                                                <optgroup label="{{ $hud->name }}">
                                                    @foreach ($hud->blocks as $block)
                                                        <option value="{{ $block->id }}"
                                                            {{ SELECT($block->id, request('block_id')) }}>
                                                            {{ $block->name }}
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-end align-items-center mt-2">
                                    <div class="form-group d-flex">
                                        <button type="reset" onClick="resetSearch()" class="btn btn-secondary resetSearch" style="border-radius: 10px;">
                                            <i class="fas fa-redo"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>


                <!-- Filter Card -->
                <div>
                    <!-- DataTable Start -->
                    <div class="container-fluid mt-2">
                        <div class="col-md-12 col-lg-12 mt-lg-5 mt-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title mb-4 text-primary">All PHC</h4>
                                        <!-- Button to add employees if needed -->
                                        <button class="btn btn-primary btn-round ms-auto"
                                            onclick="window.location.href='{{ route('phc.create') }}';">
                                            <i class="fa fa-plus"></i> Add PHC
                                        </button>

                                        <button class="btn btn-secondary btn-round ms-2">
                                            <i class="fa fa-download"></i> Download
                                        </button>

                                    </div>
                                </div>

                                <!-- Table Card -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="add-row" class="display table table-striped table-hover"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Block</th> <!-- New Block Column -->
                                                    <th>Status</th>
                                                    <th class="text-center" style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($results as $result)
                                                    <tr>
                                                        <td>{{ $result->name ?? '' }}</td>
                                                        <td>{{ $result->block->name ?? '' }}</td>
                                                        <td>
                                                            @if (isset($result->status) && $result->status == 1)
                                                                <span class="text-success"
                                                                    style="font-weight: bold;">Active</span>
                                                            @else
                                                                <span class="text-danger"
                                                                    style="font-weight: bold;">In-Active</span>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-button-action">
                                                                <button type="button"
                                                                    class="btn btn-link btn-primary btn-lg"
                                                                    onclick="window.location.href='{{route('phc.edit',$result->id)}}'"
                                                                    data-bs-toggle="tooltip" title="Edit PHC">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-link btn-danger"
                                                                    onclick="window.location.href='{{route('phc.show',$result->id)}}'"
                                                                    data-bs-toggle="tooltip" title="View PHC">
                                                                    <i class="fa fa-eye"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <!-- Additional rows as needed -->
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DataTable End -->


                    <!-- insert the contents Here end -->
                </div>
            </div>
        </div>

        <!-- content end here -->
        <!-- main panel end -->
    </div>
    <script>
        $(document).ready(function() {
            var tableData = @json($results);
            if (tableData.length > 0) {
                $('#add-row').DataTable({
                    "paging": true,
                    "searching": true,
                    "lengthChange": true,
                    "pageLength": 10,
                    "info": true,
                    "autoWidth": false,
                });
            } else {
                $('#add-row').DataTable({
                    "data": [],
                    "paging": true,
                    "searching": true,
                    "lengthChange": true,
                    "pageLength": 10,
                    "info": true,
                    "autoWidth": false
                });
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            setPageUrl('/phc?');
        });
    </script>
@endsection
