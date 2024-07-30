@extends('admin.layouts.layout')
@section('title', 'View User')
@section('content')
<div class="page-wrapper">
   <div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">User</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('users.index')}}">User</a></li>
                    <li class="breadcrumb-item active">View User</li>
                </ol>
            </div>
        </div>
    </div>
      <div class="row">
         <div class="col-lg-12 card">
            <div class="card-body">
         <div class="row">
             <div class="col-md-3 col-xs-6 b-r">
               <strong>UserName</strong>
               <br>
               {{$result->username}}
            </div>
            <div class="col-md-3 col-xs-6 b-r">
               <strong>UserType</strong>
               <br>
               {{findUserType($result->user_type_id)}}
            </div>
            <div class="col-md-3 col-xs-6 b-r">
               <strong>Name</strong>
               <br>
               {{$result->name}}
            </div>
            <div class="col-md-3 col-xs-6 b-r">
               <strong>Email</strong>
               <br>
               {{$result->email}}
            </div>
            <div class="col-md-3 col-xs-6 b-r">
               <strong>Contact Number</strong>
               <br>
               {{$result->contact_number}}
            </div>
            <div class="col-md-3 col-xs-6 b-r">
               <strong>Section</strong>
               <br>
               {{$result->tag->name ?? '--'}}
            </div>
         </div>
         <hr>
         <div class="row">
            <div class="col-md-3 col-xs-6 b-r">
               <strong>Designation</strong>
               <br>
               {{$result->designation}}
            </div>
            <div class="col-md-3 col-xs-6 b-r">
               <strong>Status</strong>
               <br>
               {{findStatus($result->status)}}
            </div>
            <div class="col-md-3 col-xs-6 b-r">
               <strong>Created At</strong>
               <br>
              {{dateOf($result->created_at) ?? ''}}
            </div>
         </div>
         <hr>
      </div>
         </div>
      </div>
   </div>
</div>
@endsection
