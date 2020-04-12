@extends('layouts.master')


@section('content')





    <div  class="container"  >
        <div class="row">

            <div class="col-sm-12 col-md-6 mt-2" >
                <label for="project">Project list:</label>
                <select class="form-control" name="project">
                    {{--@foreach($projects as $project)--}}
                    {{--<option>{{ $project->project }}</option>--}}
                    {{--@endforeach--}}
                </select>
            </div>

            <div class="col-sm-12 col-md-6 mt-2">
                <label for="project">Date list:</label>
                <select class="form-control" name="project">
                    {{--@foreach($projects as $project)--}}
                    {{--<option>{{ $project->project }}</option>--}}
                    {{--@endforeach--}}
                </select>
            </div>

            <div class="col-sm-12 col-md-12">
                <div style="width: 100%"  >
                    {!! $revChart->container() !!}
                    {!! $revChart->script() !!}

                </div>

            </div>
            <div class="col-sm-12 col-md-12" >
                <div style="width: 100%" >
                    {!! $stressRevChart->container() !!}
                    {!! $stressRevChart->script() !!}

                </div>

            </div>

        </div>
    </div>




@endsection