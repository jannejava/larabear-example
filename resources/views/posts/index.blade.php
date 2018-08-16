@extends('layout')

@section('content')

<h1>Posts</h1>
<ul>
    @foreach($notes as $note)
        <div>
            <h2><a href="/posts/{{ $note->id }}">{{ $note->title }}</a></h2>
            <date>{{ $note->created_at }}</date>
            <p>{{ $note->subtitle }}</p>

        </div>
    @endforeach
</ul>

@endsection
