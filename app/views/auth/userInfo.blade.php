@extends('layouts.default')
@section('content')
<div class="row">

    {{--<div class="col-lg-4">
        <!--widget start-->
        <div class=" state-overview">
            <section class="panel">
                <div class="symbol red">
                    <i class="fa fa-tags"></i>
                </div>
                <div class="value">
                    <h1>{{count($total)}}</h1>
                    <p>Login</p>
                </div>
            </section>
        </div>
        <!--widget end-->
    </div>--}}
    <div class="col-lg-4">

        <!--widget start-->
        <div class="panel">
            <div class="panel-body">
                <div class="bio-chart">
                    <i class="fa fa-tag big-icon"></i>
                </div>
                <div class="value">
                    <h1>{{count($total)}}</h1>
                    <p>{{(count($total)>1) ? 'Logins' :'Login'}}</p>
                </div>
            </div>
        </div>
        <!--widget end-->
    </div>
    <div class="col-lg-4">

        <!--widget start-->
        <div class="panel">
            <div class="panel-body">
                <div class="bio-chart">
                    <i class="fa fa-user big-icon"></i>
                    {{--<div style="display:inline;width:101px;height:101px;"><canvas width="101" height="101px"></canvas><input class="knob" data-width="101" data-height="101" data-displayprevious="true" data-thickness=".2" value="63" data-fgcolor="#4CC5CD" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(76, 197, 205); padding: 0px; -webkit-appearance: none; background: none;"></div>--}}
                </div>
                <div class="bio-desk">
                    <h4 class="terques">{{$info->user->email}} </h4>
                    <p>Started : {{$info->user->created_at->toFormattedDateString()}}</p>
                    <p>Last Activity : {{$info->updated_at->diffForHumans()}}</p>

                </div>
            </div>
        </div>
        <!--widget end-->
    </div>
    <div class="col-lg-4">

        <!--widget start-->
        <div class="panel">
            <div class="panel-body">
                <div class="bio-chart">
                    <i class="fa fa-gear big-icon"></i>
                </div>
                <div class="bio-desk">
                    <h4 class="terques">Last Login Statistics</h4>
                    <p><b>IP : {{$info->ip}}</b></p>
                    <p><b>Browser : {{$info->browser}}</b></p>
                    <p><b>OS : {{$info->os}}</b></p>
                    <p><b>Device : {{$info->device}}</b></p>

                </div>
            </div>
        </div>
        <!--widget end-->
    </div>
</div>
@stop