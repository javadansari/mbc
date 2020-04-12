@extends('layouts.master')

@section('sidebar')

@show
@php

//dd(getenv());
//dd(getenv("username"));
@endphp
@section('content')

    <script type="text/javascript">
        function Copy(Url)
        {
            //var Url = document.createElement("textarea");
        //    urlCopied.innerHTML = window.location.href;
          //  urlCopied.innerHTML = Url;
          //  window.open(Url);
            //Copied = Url.createTextRange();
            Copied.execCommand(Url);

        }

        function readSingleFile(e) {
            var file = e.target.files[0];
            if (!file) {
                return;
            }
            var reader = new FileReader();
            reader.onload = function(e) {
                var contents = e.target.result;
                displayContents(contents);
            };
            reader.readAsText(file);
        }

        function displayContents(contents) {
            var element = document.getElementById('file-content');
            element.textContent = contents;
        }

        document.getElementById('file-input')
            .addEventListener('change', readSingleFile, false);

    </script>

    <h2>All Catalogue</h2>
    <a href="\catalogue\create">Request</a>
    <table class="table">
        <thead>
        <tr>
            <th>id</th>
            <th>project</th>
            <th>type</th>
            <th>size1</th>
            <th>size2</th>
            <th>name</th>
            <th>status</th>
            <th>comment</th>
            <th>link</th>
        </tr>
        </thead>
        <tbody>
        @foreach($catalogues as $catalogue)
            <tr>
                <td>{{ $catalogue->id }}</td>
                <td>{{ $catalogue->project }}</td>
                <td>{{ $catalogue->type }}</td>
                <td>{{ $catalogue->size1 }}</td>
                <td>{{ $catalogue->size2 }}</td>
                <td>{{ $catalogue->name }}</td>
                <td>{{ $catalogue->status }}</td>
                <td>{{ $catalogue->comment }}</td>
                @php  $link =  $catalogue->link; @endphp
                @if ($link != null)
                    <td><a href={{ $catalogue->link }}  target="_explorer.exe" onclick="Copy('{{$link}}')">link</a></td>
                @endif

                <td>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection


