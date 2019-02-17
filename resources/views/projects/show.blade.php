@extends('layout')

@section('content')

<h1 class="title">
    {{ $project->title }}
</h1>

<p>Description: {{ $project->description }}</p>

<p>
<a href="/projects/{{$project->id}}/edit">Edit</a>
</p>
<br>
@if ($project->tasks->count())
    <div class="box">
        <h2 class="title">Tasks</h2>
        @foreach($project->tasks as $task)
            <form method="POST" action="/tasks/{{$task->id}}">
                @method('PATCH')
                @csrf
                <label class="checkbox {{ $task->completed ? "is-completed" : ""}}" for="completed">
                    <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? "checked" : ""}}>
                    {{ $task->description }}
                </label>
            </form>
        @endforeach
    </div>
@endif

<div class="box">
    <h2 class="title">Create a task</h2>
    <form class="form" method="POST" action="/projects/{{ $project->id }}/tasks">
        @csrf
        <label class="label" for="description">Description: </label>
        <input class="input" type="text" name="description" required>
        <button class="button">Add</button>
    </form>
</div>

@include('errors')

@endsection