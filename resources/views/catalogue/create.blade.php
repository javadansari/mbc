@extends('layouts.master')

@php
    use Illuminate\Support\Facades\DB;
    $projects = (DB::table('projects')->get());
    $types = (DB::table('types')->get());
    $sizes = (DB::table('sizes')->get());

@endphp

@section('content')
    <h2>Create Catalogue</h2>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/catalogue/create" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <label for="project">Project list:</label>
                <select class="form-control" name="project">
                    @foreach($projects as $project)
                        <option>{{ $project->project }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col">
                <label for="type">Type list:</label>
                <select class="form-control" name="type">
                    @foreach($types as $type)
                        <option>{{ $type->type }}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="size1">Size 1 list:</label>
                <select class="form-control" name="size1">
                    @foreach($sizes as $size)
                        <option>{{ $size->size }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="size2">Size 2 list:</label>
                <select class="form-control" name="size2">
                    @foreach($sizes as $size)
                        <option>{{ $size->size }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="link">Link :</label>
            <input type="text" name="link" class="form-control">
        </div>

        <div class="form-group">
            <label for="comment">Comment :</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment" ></textarea>
        </div>

        <input type="hidden" name="status" value="request"></input>

        <button class="btn btn-success form-control btn-lg mb-2 mt-1">Send</button>

    </form>
@endsection


