@extends('layout')

@section('title', 'Edit project')

@section('content')
    <h1 class="title">Edit project</h1>
    <form class="form" method="POST" action="/projects/{{ $project->id }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div class="field">
            <label class="label" for="title">Title</label>

            <div class="control">
                <input type="text" class="input" name="title" placeholder="title" value="{{ $project->title }}">
            </div>
        </div>

        <div class="field">

            <label class="label" for="description">Description</label>

            <div class="control">
            <textarea class="textarea" name="description"> {{ $project->description }}</textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update project</button>
            </div>
        </div>
    </form>

    @include('errors')
    
    <form class="form" method="POST" action="/projects/{{ $project->id }}">
    @method('DELETE')
    @csrf
        <div class="field">
            <div class="control">
                <button type="submit" class="button">Delete project</button>
            </div>
        </div>
    </form>

@endsection