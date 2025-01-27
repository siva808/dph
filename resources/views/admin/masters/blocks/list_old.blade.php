@extends('admin.layouts.layout')
@section('title', 'List Blocks')
@section('content')
<div class="page-wrapper">
   <div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Blocks</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Blocks</li>
                </ol>
                 @if (isAdmin())
                <a class="btn btn-info d-ntone d-lg-block m-l-15" href="{{route('blocks.create')}}"><i class="fa fa-plus-circle"></i> Create New</a>

                @endif
            </div>
        </div>
    </div>
     <div class="row">

         <div class="col-lg-12">

          @if (isAdmin())
            <div class="card">
               <div class="card-body">
                <div class="row">
                    <div class="col-lg-2">
                        <label>HUD
                            <select name="hud_id" class="form-control form-control-line searchable" onchange="searchFun()">
                              <option value="" >-- Select HUD -- </option>
                                @foreach($huds as $hud)

                            <option value="{{$hud->id}}" {{SELECT($hud->id,request('hud_id'))}}>{{$hud->name}}</option>
                            @endforeach
                            </select>
                        </label>
                     </div>
                      <div class="col-lg-1 mt-4">
                        <button type="button" class="btn btn-info d-lg-block resetSearch" onClick="resetSearch()"> <i class="fas fa-refresh"></i>&nbsp;Reset</button>
                     </div>
                  </div>
               </div>
            </div>
               @endif
            <!-- Table Html -->
            <div class="card">
               <div class="card-body">
                  <div class="table-responsive m-t-40">
                     <div id="myTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row m-b-40">

                           <div class="col-sm-12 col-md-6">
                              <div class="dataTables_length" id="myTable_length">
                                 <label>Show </label>
                                    <select name="pageLength" id="pageLength" aria-controls="myTable" on-change="searchFun()">
                                      @foreach(getPageLenthArr() as $pageLenght)
                            <option value="{{$pageLenght}}" {{SELECT($pageLenght,request('pageLength'))}}>{{$pageLenght}}</option>
                            @endforeach   
                                    </select>
                              </div>
                           </div>

                           <div class="col-sm-12 col-md-6">
                              <div  class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="myTable" id="keyword" value="{{request('keyword')}}"></label></div>
                           </div>
                           <input type="hidden" name="sortfield" id="sortfield" value="{{request('sortfield')}}"/>
                           <input type="hidden" name="sorttype" id="sorttype" value="{{request('sorttype')}}"/>
                        </div>

                        <div class="row">
                           <div class="col-sm-12">
                              <table class="table table-hover">
                                 <thead>
                                    <tr>
                                       
                                       <th>Is Urban</th>
                                       <th><a class="sort" data-column="name"><i class="fa fa-sort" aria-hidden="true"></i>&nbsp;Name</a></th>

                                       <th>HUD</th>
                                       
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>

                                  @if(!empty($results) && $results->count())
                                  @foreach($results as $result)
                                    <tr>

                                      <td>
                                        @if(isset($result->is_urban) && $result->is_urban == 1)
                                        <span>Yes</span>
                                        @else
                                          <span>No</span>
                                        @endif
                                      </td>
                                       <td><a href="{{url('/phc?block_id=').$result->id}}" style="color:#000000!important;" data-toggle="tooltip" data-placement="top" title="View PHC's of {{$result->name ?? ''}}"> {{$result->name ?? ''}}</a></td>
                                      <td>{{$result->hud->name ?? ''}}</td>
                                      
                                       <td>
                                        @if(isset($result->status) && $result->status == 1)
                                        <span class="text-success">Active</span>
                                        @else
                                          <span class="text-danger">In-Active</span>
                                        @endif
                                      </td>
                                      <td>
                                       <a class="waves-effect waves-dark" href="{{route('blocks.show',$result->id)}}" data-toggle="tooltip" data-original-title="View Block"><i class="fa fa-eye"></i></a>
                                    &nbsp;&nbsp;&nbsp;
                                        <a class="waves-effect waves-dark" href="{{route('blocks.edit',$result->id)}}" data-toggle="tooltip" data-original-title="Edit Block"><i class="fa fa-edit"></i></a>

                                        </td>
                                    </tr>
                                  @endforeach
                                  @else
                                  <tr>
                                    <td collspan="6">No Records Found..</td>
                                  </tr>
                                  @endif
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        @include('admin.common.table-footer')
                     </div>
                  </div>
               </div>
            </div>
            <!-- Table Html -->
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    setPageUrl('/blocks?');
  });
</script>
@endsection
