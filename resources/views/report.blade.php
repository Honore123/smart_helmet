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
            <h4>Report</h4>
        </div>
       
    </div>
    <div class="row py-3">
            @include('notification')
    </div>
    <form class="row g-3 mb-4" method="GET" action="{{route('report.fetch')}}">
        @csrf
        <div class="col">
            <label for="staticEmail2" class="visually-hidden">Type</label>
            <select name="report_type" class="form-control h-100" id="reportType">
                <option value="">~~SELECT TYPE~~</option>
                <option value="site" {{isset($report) ? $report == 'site' ? 'selected' : '' : ''}}>Site data</option>
                @forelse($miners as $miner)
                <option value="{{$miner->id}}" {{isset($report) ? $report == $miner->id ? 'selected' : '' : ''}}>{{$miner->name}}'s data</option>
                @empty
                <option value="" disabled>No Miner</option>
                @endforelse
            </select>
        </div>
        <div class="col">
            <label for="staticEmail2" class="visually-hidden">Start</label>
            <input type="date"  class="form-control h-100" id="startDate" name="startDate" value="{{isset($start_date) ? $start_date : ''}}">
        </div>
        <div class="col">
            <label for="inputPassword2" class="visually-hidden">End</label>
            <input type="date" class="form-control h-100" id="endDate" name="endDate" value="{{isset($end_date) ? $end_date : ''}}">
        </div>
        <div class="col">
            <button type="submit" class="btn btn-success h-100">Confirm</button>
        </div>
    </form>
    @if(isset($datas))
    <div class="row">
        <div class="col-md-12 card card-body border-0 rounded-0 shadow">
            <h5 class="card-title py-3">Master Report List</h5>
            <div class="table-responsive py-4">
                <table class="table table-bordered table-striped table-hover" id="minerTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Dioxide</th>
                            <th>Monoxide</th>
                            <th>Temperature</th>
                            <th>Humidity</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    
                   <tbody>
                    @forelse($datas as $data)
                    <tr>
                        <td>{{$loop->iteration++}}</td>
                        <td>{{$data->carbon_doixide}}</td>
                        <td>{{$data->carbon_monoxide}}</td>
                        <td>
                            @if($report == 'site')
                            {{$data->station_temperature}}
                            @else
                            {{$data->helmet_temperature}}
                            @endif
                        </td>
                        <td>
                            @if($report == 'site')
                            {{$data->station_humidity}}
                            @else
                            {{$data->helmet_humidity}}
                            @endif
                        </td>
                        <td>{{$data->created_at}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8"> No data available</td>
                    </tr>
                    @endforelse
                   
                   </tbody>
                </table>
            </div>
           
        </div>
    </div>
    @endif
</div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $('#minerTable').DataTable();
        })
    </script>
@endpush
    
