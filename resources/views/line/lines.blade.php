@extends('layouts.master')

@php
    use Illuminate\Support\Facades\DB;
    $projects = (DB::table('projects')->get());


    $items = (DB::table('items')->get()
  //  ->Where('jobName','like','')
    ->where('projectID',$allItems[0]));

  //  ->where('projectID',$thisProject));
    foreach ($items as $item) {
    $jobs[] = $item->jobName;
    $statuses[] = $item->status;
    }
    $jobs = array_unique($jobs);
    $statuses = array_unique($statuses);
@endphp


@section('content')

    <div class="container">
        <div class="row">

            <form action="lines" method="post" class="col-sm-12 col-md-12">
                @csrf
                <div class="form-row align-items-center m-1">
                    <div class="col-md-1 text-center jj-text">
                        <p6 class="h6 ">انتخاب پروژه</p6>
                    </div>
                    <div class="col-md-2">
                        <select id="inputState" name="project" class="form-control">
                            @foreach($projects as $project)
                                <option value={{$project->id}} > {{$project->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2  flex-grow">
                        <button class="btn btn-info jj-text">نشان بده</button>
                    </div>
                    <div class="col-md-5 text-center jj-text">
                        <H1 class="h1 ">{{$projects->where('id',$allItems[0])->first()->name}} Project</H1>
                    </div>
                </div>
                <hr class="solid">

            </form>
            <form action="lines" method="post" class="col-sm-12 col-md-12">
                @csrf
                <div class="form-row align-items-center m-1">
                    <div class="col-md-1 text-center jj-text">
                        <p6 class="h6 ">انتخاب پروژه</p6>
                    </div>
                    <div class="col-md-2">
                        <select id="inputState" name="project" class="form-control">
                            @foreach($projects as $project)
                                <option value={{$project->id}} > {{$project->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-1 text-center jj-text">
                        <p6 class="h6 ">مرحله</p6>
                    </div>
                    <div class="col-md-2">
                        <select id="inputState" name="status" class="form-control">
                            <option value=all> تمامی دیتاها</option>
                            @foreach($statuses as $status)
                                <option value={{$status}} > {{$status}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-1 text-center jj-text">
                        <p6 class="h6 ">نام کار</p6>
                    </div>
                    <div class="col-md-2">
                        <select id="inputState" name="jobName" class="form-control">
                            <option value=''> تمامی دیتاها</option>
                            @foreach($jobs as $job)
                                <option value={{$job}}> {{$job}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2  flex-grow">
                        <button class="btn btn-info jj-text">نشان بده</button>
                    </div>
                </div>
                <hr class="solid">

            </form>
        </div>
    </div>

    <div>
        @foreach($items as $item)
            {{--<p> {{$item->line}}  ,{{$item->projectID}}  ,  {{$item->status}} ,  {{$item->site}} ,  {{$item->status}} </p>--}}
            <p>  {{$item->jobName}} </p>
        @endforeach
    </div>

@endsection
