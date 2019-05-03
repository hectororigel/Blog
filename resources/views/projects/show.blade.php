@extends('layout')
@section('content')
    <h1 class="title"> {{$project->title}}</h1>

    <div class="content">
        {{$project->description}}
        <p>
            <a href="/projects/{{$project->id}}/edit">Edit</a>
        </p>
    </div>

   @if($project->tasks->count())
    <div class="box">
        @foreach($project->tasks as $task)
            <div>
                <form method="post" action="/completed-tasks/{{$task->id}}">
                    @if($task->completed)
                        @method('delete')
                        @endif
                    @csrf
                    <label class="checkbox {{$task->completed ? 'is-complete' : ''}}" for="completed">
                        <input type="checkbox" name="completed" onChange="this.form.submit()" {{$task->completed ? '
                        checked':''}}>
                        {{$task->description}}
                    </label>
                </form>
            </div>
            @endforeach
   </div>
@endif


    <form method="post" action="/projects/{{$project->id}}/tasks" class="box">
    @csrf
        <div>
            <label class="label" for="description">New Task</label>


            <div class="control">
                <input type="text" class="input" name="description" placeholder="New Task" required>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add Task</button>
            </div>
        </div>

        @include ('errors')
    </form>

    @endsection