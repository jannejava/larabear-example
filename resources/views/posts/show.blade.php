@extends('layout') 

@section('content')

<h1>{{ $note->title }}</h1>
Tags: {{ $tags }}
<p>
    @markdown($note->textWithoutHeadline())
</p>

@endsection