@extends('layouts.app')

@push('styles')
    <style>
        .pagination > li.active > a, .pagination > li.active > span{
            background-color:#57cc99;
            border-color: #57cc99;
        }
        #minerTable_length{
            margin-bottom: 1em !important;
        }
        #dataTables_filter{
            margin-bottom: 1em !important;
        }
        #minerTable_info{
            margin-top: 1em !important;
        }
        #minerTable_paginate{
            margin-top: 1em !important;
        }
        .btn-green-bg {
            background-color: #38a3a5;
        }
    </style>
@endpush

@section('content')
<div class="container">
    <div class="row py-4 justify-content-between">
        <div class="col px-0 text-center">
            <h4>Change Password</h4>
        </div>
    </div>
    <div class="row py-3">
        @include('notification')
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 card p-4 border-0 rounded-3 shadow">
            <form action="{{route('user.update', auth()->user()->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="password" >
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="password_confirmation">
                  </div>
                  <div class="mt-4">
                    <button type="submit" class="w-100 btn btn-secondary btn-green-bg border-0 rounded-0 mb-3">Confirm</button>
                  </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $('#minerTable').DataTable();
        })
    </script>
@endpush
    
