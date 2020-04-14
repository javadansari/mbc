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
                    <div class="col-auto">
                        <label for="inputState">Date :</label>
                        <select id="inputState" name="date" class="form-control">
                            @foreach($dates as $date)
                                <option @if($thisDate == $date->value) selected
                                        @endif value={{$date->value}} > {{$date->date}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-auto">
                        <label for="inputState">Project :</label>
                        <select id="inputState" name="project" class="form-control">
                            @foreach($projects as $project)
                                <option @if($thisProject == $project->id) selected
                                        @endif value={{$project->id}} > {{$project->project}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto mt-4">
                        <button class="btn btn-info ">Check</button>
                    </div>
                </div>

            </form>

            <div class="col-sm-12 col-md-12 m-5 ">
                <h3 class="h3 jj-text text-center"> {{end($allCharts[4][0])}} داده ها تا تاریخ </h3>

            </div>
            <div class="col-sm-12 col-md-3">
                <div style="width: 100%">
                    {!! $allCharts[2]->container() !!}
                    {!! $allCharts[2]->script() !!}

                </div>
                <div class="p m-1 ">
                    <p class="p jj-text text-center">  {{end($allCharts[4][3])}} کل خطوط با شرایط استرس </p>
                    <p class="p jj-text text-center"> {{end($allCharts[4][4])}} کل خطوط استرس شده </p>
                </div>

            </div>
            <div class="col-sm-12 col-md-3">
                <div style="width: 100%">
                    {!! $allCharts[3]->container() !!}
                    {!! $allCharts[3]->script() !!}
                </div>
                <div class="p m-1 ">
                    <p class="p jj-text text-center">  {{end($allCharts[4][1])}} کل خطوط طراحی </p>
                    <p class="p jj-text text-center"> {{end($allCharts[4][2])}} کل خطوط طراحی شده </p>
                </div>

            </div>

            <div class="col-sm-12 col-md-3">
                <div style="width: 100%">
                    {!! $allCharts[6]->container() !!}
                    {!! $allCharts[6]->script() !!}
                </div>
                <div class="p m-1 ">
                    <p class="p jj-text text-center">  {{end($allCharts[4][1])}} کل خطوط طراحی </p>
                    <p class="p jj-text text-center"> {{end($allCharts[4][5])}} کل خطوط ساپورت شده </p>
                </div>

            </div>
            <div class="col-sm-12 col-md-3">
                <div style="width: 100%">
                    {!! $allCharts[5]->container() !!}
                    {!! $allCharts[5]->script() !!}

                </div>
                <div class="p m-1 ">
                    <p class="p jj-text text-center">  {{end($allCharts[4][1])}} کل خطوط طراحی </p>
                    <p class="p jj-text text-center"> {{end($allCharts[4][6])}} کل خطوط آزاد شده </p>
                </div>
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