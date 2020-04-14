@extends('layouts.master')

@php
    use Illuminate\Support\Facades\DB;
    $projects = (DB::table('projects')->get());
    $dates= (DB::table('date')->get());

@endphp

@section('content')
    <div class="container">
        <div class="row">

            <form action="chart" method="post" class="col-sm-12 col-md-12">
                @csrf

                <div class="form-row align-items-center m-1">
                    <div class="col-md-2 text-center jj-text">
                        <p6 class="h6 ">انتخاب بازه زمانی</p6>
                    </div>
                    <div class="col-md-3">
                        <select id="inputState" name="date" class="form-control">
                            @foreach($dates as $date)
                                <option @if($thisDate == $date->value) selected @endif
                                value={{$date->value}} > {{$date->date}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-2 text-center jj-text">
                        <p6 class="h6 ">انتخاب پروژه</p6>
                    </div>
                    <div class="col-md-3">
                        <select id="inputState" name="project" class="form-control">
                            @foreach($projects as $project)
                                <option @if($thisProject == $project->id) selected
                                        {{$projectName = $project->project}} @endif
                                        value={{$project->id}} > {{$project->project}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2  flex-grow">
                        <button class="btn btn-info jj-text">نشان بده</button>
                    </div>
                </div>
                <hr class="solid">

            </form>
            <div class="col-sm-12 col-md-12 m-5 ">

                <h1 class="h1 jj-text text-center"> پروژه {{$projectName}}  </h1>
                <h3 class="h3 jj-text text-center"> {{end($allCharts[4][0])}} داده ها تا تاریخ </h3>

            </div>
            <div class="col-sm-12 col-md-3">
                <div style="width: 100%">
                    {!! $allCharts[2]->container() !!}
                    {!! $allCharts[2]->script() !!}

                </div>
                <div class="p m-1 ">
                    <p class="p jj-text text-center">  {{end($allCharts[4][3])}} کل خطوط با شرایط استرس </p>
                    <hr class="solid">
                    <p class="p jj-text text-center"> {{end($allCharts[4][4])}} کل خطوط استرس شده </p>
                    <hr class="solid">
                </div>

            </div>
            <div class="col-sm-12 col-md-3">
                <div style="width: 100%">
                    {!! $allCharts[3]->container() !!}
                    {!! $allCharts[3]->script() !!}
                </div>
                <div class="p m-1 ">
                    <p class="p jj-text text-center">  {{end($allCharts[4][1])}} کل خطوط طراحی </p>
                    <hr class="solid">
                    <p class="p jj-text text-center"> {{end($allCharts[4][2])}}  خطوط طراحی شده </p>
                    <hr class="solid">
                </div>

            </div>

            <div class="col-sm-12 col-md-3">
                <div style="width: 100%">
                    {!! $allCharts[6]->container() !!}
                    {!! $allCharts[6]->script() !!}
                </div>
                <div class="p m-1 ">
                    <p class="p jj-text text-center">  {{end($allCharts[4][1])}} کل خطوط طراحی </p>
                    <hr class="solid">
                    <p class="p jj-text text-center"> {{end($allCharts[4][5])}} کل خطوط ساپورت شده </p>
                    <hr class="solid">
                </div>

            </div>
            <div class="col-sm-12 col-md-3">
                <div style="width: 100%">
                    {!! $allCharts[5]->container() !!}
                    {!! $allCharts[5]->script() !!}

                </div>
                <div class="p m-1 ">
                    <p class="p jj-text text-center">  {{end($allCharts[4][1])}} کل خطوط طراحی </p>
                    <hr class="solid">
                    <p class="p jj-text text-center"> {{end($allCharts[4][6])}} کل خطوط آزاد شده </p>
                    <hr class="solid">
                </div>
            </div>
            <div class="col-md-12">
                <hr class="solid">
            </div>
            <div class="col-sm-12 col-md-12">
                <div style="width: 100%">
                    {!! $allCharts[0]->container() !!}
                    {!! $allCharts[0]->script() !!}

                </div>

            </div>
            <div class="col-sm-12 col-md-12">
                <div style="width: 100%">
                    {!! $allCharts[1]->container() !!}
                    {!! $allCharts[1]->script() !!}

                </div>

            </div>

        </div>
    </div>

@endsection