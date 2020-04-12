@extends('layouts.master')


@section('content')
    <h2>All Articles</h2>
    <a href="create">create</a>
    <table class="table">
        <thead>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>Operation</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sessions as $session)
            <tr>
                <td>{{ $session->id }}</td>
                <td>{{ $session->title }}</td>
                <td>
                    {{--<form action="/admin/articles/{{$article->id}}" method="post">--}}
                        {{--@csrf--}}
                        {{--@method('delete')--}}
                        {{--<button class="btn btn-danger">delete</button>--}}
                    {{--</form>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
