@extends('layouts.master')

@php
    use Illuminate\Support\Facades\DB;
    $projects = (DB::table('projects')->get());
    $types = (DB::table('types')->get());
    $sizes = (DB::table('sizes')->get());

@endphp

@section('content')




    <div class="container">
        <div class="row">
            <form action="chart" method="post">
                @csrf
                <div class="form-row align-items-center m-1">
                    <div class="col-auto">
                        <label for="inputState">Project :</label>
                        <select id="inputState" name="date" class="form-control">
                            <option selected value="3"> سه روز</option>
                            <option value="5">پنج روز</option>
                            <option value="7">یک هفته</option>
                            <option value="14">دو هفته</option>
                            <option value="30">یک ماه</option>
                            <option value="90">سه ماه</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <label for="inputState">Date :</label>
                        <select id="inputState" name="project" class="form-control">
                            <option value="1" selected>غرب کارون</option>
                            <option value="2">رودشور</option>
                            <option value="5">خرم آباد</option>
                            <option value="6">زنجان</option>
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