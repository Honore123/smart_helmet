@extends('layouts.app')

@push('styles')
    <style>
        .btn-green-bg {
            background-color: #38a3a5;
        }
        .progress-bar-vertical {
            width: 40px;
            height: 80%;
            margin-right: 20px;
            float: left;
            display: -webkit-box;  
            display: -ms-flexbox;  
            display: -webkit-flex; 
            display: flex;         
            align-items: flex-end;
            -webkit-align-items: flex-end; 
        }

        .progress-bar-vertical .progress-bar {
            width: 100%;
            height: 0;
            -webkit-transition: height 0.6s ease;
            -o-transition: height 0.6s ease;
            transition: height 0.6s ease;
        }
    </style>
@endpush

@section('content')
<div class="container" style="height: 90vh">
    <div class="row py-4 justify-content-between">
        <div class="col px-0">
            <h4>Monitor Site's data</h4>
        </div>
        <div class="col px-0 text-center">
            @if($notify->status == 0)
            <a href="{{route('notify.send',1)}}" class="btn btn-danger rounded-0 border-0">
                Send Alert
            </a>
            @else
            <a href="{{route('notify.stop',1)}}" class="btn btn-success rounded-0 border-0">
                Stop Alert
            </a>
            @endif
        </div>
        <div class="col px-0 text-end">
           
        </div>
    </div>
    <div class="row py-3">
        @include('notification')
    </div>
    <div class="row" style="height: 50vh">
        <div class="col-md-12 card card-body border-0 rounded-0 shadow">
            <h5 class="card-title pb-4">Master Site Statistics</h5>
            <div class="row justify-content-center" style="height: 70vh">
                <div class="col d-flex justify-content-center">
                    <div class="progress progress-bar-vertical">
                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="height: {{$siteData->station_temperature}}%;">
                          <span class="sr-only" id="stationTemperature">{{$siteData->station_temperature}} &#8451;</span>
                        </div>
                    </div>
                    <div>
                        <h4><span class="badge bg-primary" id="stationTemperatureBadge">{{$siteData->station_temperature}} &#8451;</span></h4>
                        <h6 class="text-primary">Temperature</h6>
                    </div> 
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="progress progress-bar-vertical">
                        <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="height: {{$siteData->carbon_doixide}}%;">
                          <span class="sr-only" id="carbonDioxide">{{$siteData->carbon_doixide}} PPM</span>
                        </div>
                    </div>
                    <div>
                        <h4><span class="badge bg-secondary" id="carbonDioxideBadge">{{$siteData->carbon_doixide}} PPM</span></h4>
                        <h6 class="text-secondary">Carbon Dioxide</h6>
                    </div> 
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="progress progress-bar-vertical">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="height: {{$siteData->station_humidity}}%;">
                          <span class="sr-only" id="stationHumidity">{{$siteData->station_humidity}}%</span>
                        </div>
                    </div>
                    <div>
                        <h4><span class="badge bg-success" id="stationHumidityBadge">{{$siteData->station_humidity}}%</span></h4>
                        <h6 class="text-success">Humidity</h6>
                    </div> 
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="progress progress-bar-vertical">
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="height: {{$siteData->carbon_monoxide}}%;">
                          <span class="sr-only" id="carbonMonoxide">{{$siteData->carbon_monoxide}}PPM</span>
                        </div>
                    </div>
                    <div>
                        <h4><span class="badge bg-danger" id="carbonMonoxideBadge">{{$siteData->carbon_monoxide}} PPM</span></h4>
                        <h6 class="text-danger">Carbon Monoxide</h6>
                    </div> 
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
@push('scripts')
   <script>
    setInterval(() => {
        var url = "{{url('site/ajax/data/')}}";
        $.get(url, function(response){
            //temperature
            $('#stationTemperature').text(response.station_temperature + ' ' + html('&#8451;'));
            $('#stationTemperature').parent().attr('style','height:'+response.station_temperature+'%');
            $('#stationTemperatureBadge').text(response.station_temperature + ' ' + html('&#8451;'));

            //carbon dioxide
            $('#carbonDioxide').text(response.carbon_doixide + ' %');
            $('#carbonDioxide').parent().attr('style','height:'+response.carbon_doixide+'%');
            $('#carbonDioxideBadge').text(response.carbon_doixide + ' PPM');

            //station humidity
            $('#stationHumidity').text(response.station_humidity + ' %');
            $('#stationHumidity').parent().attr('style','height:'+response.station_humidity+'%');
            $('#stationHumidityBadge').text(response.station_humidity + ' %');

            //carbon monoxide
            $('#carbonMonoxide').text(response.carbon_monoxide + ' %');
            $('#carbonMonoxide').parent().attr('style','height:'+response.carbon_monoxide+'%');
            $('#carbonMonoxideBadge').text(response.carbon_monoxide + ' PPM');
        })
    }, 2000);
   </script>
@endpush
    
