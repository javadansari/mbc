@extends('layouts.master')

@php
    use Illuminate\Support\Facades\DB;
    $projects = (DB::table('projects')->get());
    $items = (DB::table('items')->get()->where('projectID',$thisProject));

@endphp


@section('content')

    <div class="container">
        <div class="row">

            <form action="lines" method="post" class="col-sm-12 col-md-12">
                @csrf

                <div class="form-row align-items-center m-1">
                    <div class="col-md-2 text-center jj-text">
                        <p6 class="h6 ">انتخاب پروژه</p6>
                    </div>
                    <div class="col-md-3">
                        <select id="inputState" name="project" class="form-control">
                            @foreach($projects as $project)
                                <option
                                        value={{$project->id}} > {{$project->name}}</option>
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
            <p> {{$item->line}}  ,  {{$item->status}} ,  {{$item->site}} ,  {{$item->status}} </p>
        @endforeach
    </div>

@endsection
