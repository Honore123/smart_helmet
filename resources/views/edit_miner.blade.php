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
            <h4>Edit Miner</h4>
        </div>
    </div>
    <div class="row py-3">
            @include('notification')
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 card p-4 border-0 rounded-3 shadow">
            <form action="{{route('miner.update',$miner->id)}}" method="POST" >
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Firstname</label>
                    <input type="text" class="form-control" id="firstname" name="firstname"  value="{{explode(' ', $miner->name)[0]}}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname"  value="{{explode(' ', $miner->name)[1]}}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email"  value="{{$miner->email}}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" id="phone_number" name="phone_number" value="{{$miner->phone_number}}">
                  </div>
                  <div class="mt-4">
                    <button type="submit" class="w-100 btn btn-secondary btn-green-bg border-0 rounded-0 mb-3">Update</button>
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
    
