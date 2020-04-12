@extends('layouts.master')


@section('content')


    <div  class="container"  >
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <div style="width: 100%" >
                    {!! $revChart->container() !!}
                    {!! $revChart->script() !!}

                </div>

            </div>
            <div class="col-sm-6 col-md-6">
                <div style="width: 100%">
                    {!! $stressRevChart->container() !!}
                    {!! $stressRevChart->script() !!}

                </div>

            </div>

        </div>
    </div>




@endsection