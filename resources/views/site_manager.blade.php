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
        <div class="col px-0">
            <h4>Site Manager</h4>
        </div>
        <div class="col px-0 text-center">
           
        </div>
        <div class="col px-0 text-end">
            <a class="btn btn-success btn-green-bg rounded-0 border-0" href="{{route('site.manager.add')}}">
                Add Site Manager
            </a>
        </div>
    </div>
    <div class="row py-3">
            @include('notification')
    </div>
    <div class="row">
        <div class="col-md-12 card card-body border-0 rounded-0 shadow">
            <h5 class="card-title py-3">Master Site Managers List</h5>
            <div class="table-responsive py-4">
                <table class="table table-bordered table-striped table-hover" id="minerTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Names</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Reg Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                   <tbody>
                   
                        @foreach($managers as $manager)
                        <tr>
                            <td>{{$loop->iteration++}}</td>
                            <td>{{$manager->name}}</td>
                            <td>{{$manager->email}}</td>
                            <td>{{$manager->phone_number}}</td>
                            <td>{{$manager->created_at}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-green-bg rounded-0 border-0 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                      Action
                                    </button>
                                    <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="{{route('miner.edit', $manager->id)}}">Edit</a></li>
                                      <form action="{{route('site.manager.delete', $manager->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <li><button class="dropdown-item" type="submit">Remove</button></li>
                                      </form>
                                    </ul>
                                  </div>
                            </td>
                        </tr>
                        @endforeach
                   </tbody>
                </table>
            </div>
           
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
    
