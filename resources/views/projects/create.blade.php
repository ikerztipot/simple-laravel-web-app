@extends('layout')

@section('title','Create project')

@section('content')
    <h1>Create a new project</h1>
    <form method="POST" action="/projects" >
        {{ csrf_field() }}

        <div>
        <input type="text" name="title" class="input {{ $errors->has('title') ? 'is-danger' : ''}}" value="{{ old('title') }}" required>
        </div>
        <div>
            <input name="description" class="input {{ $errors->has('description') ? 'is-danger' : ''}}" value="{{ old('description') }}" required>
        </div>
        <div>
            <button class="button" type="submit">Create Project</button>
        </div>
    </form>

    @include('errors')

@endsection
