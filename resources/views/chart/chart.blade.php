@extends('layouts.master')

@php
    use Illuminate\Support\Facades\DB;
    $projects = (DB::table('projects')->get());
    $dates= (DB::table('date')->get());

@endphp

@section('content')
    <div class="container">
        <div class="row">
            <form action="chart" method="post" >
                @csrf
                <div class="form-row align-items-center m-1">
                    <div class="col-auto">
                        <label for="inputState">Date :</label>
                        <select id="inputState" name="date" class="form-control">
                            @foreach($dates as $date)
                                <option @if($thisDate == $date->value) selected @endif value={{$date->value}} > {{$date->date}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-auto">
                        <label for="inputState">Project :</label>
                        <select id="inputState" name="project" class="form-control">
                            @foreach($projects as $project)
                                <option @if($thisProject == $project->id) selected @endif value={{$project->id}} > {{$project->project}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto mt-4">
                        <button class="btn btn-info ">Check</button>
                    </div>
                </div>

            </form>


            <div class="col-sm-12 col-md-12">
                <div style="width: 100%">
                    {!! $revChart->container() !!}
                    {!! $revChart->script() !!}

                </div>

            </div>
            <div class="col-sm-12 col-md-12">
                <div style="width: 100%">
                    {!! $stressRevChart->container() !!}
                    {!! $stressRevChart->script() !!}

                </div>

            </div>

        </div>
    </div>

@endsection