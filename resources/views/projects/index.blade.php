@extends('layout')

@section('content')
<h1 class="title">Projects</h1>
<ul class="content">
    
    @foreach ($projects as $project)
    <li>
        <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
    </li>
    @endforeach
</ul>
<a class="button is-link" href="/projects/create">Add project</a>

@if(session('message'))
<div class="flash-message">{{ session('message') }}</div>
@endif

@endsection
