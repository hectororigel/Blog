@extends('layout')
@section('content')
    <h1 class="title">Edit Project</h1>
    <form method="post" action="/projects/{{$project->id}}" style="margin-bottom: 1em">
        @method('patch')
        @csrf
        <div class="field">
            <label class="label" for="title">Title</label>
            <div class="control">
                <input type="text" class="input" name="title" placeholder="Title" value="{{$project->title}}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="description">Description</label>
            <div class="control">
                <textarea name="description" class="textarea" required>{{$project->description}}</textarea>
            </div>

            @include('errors')

        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update Project</button>
            </div>
        </div>
    </form>

    <form method="post" action="/projects/{{$project->id}}">
        @method('delete')
        @csrf

        <div clas="field">
            <div class="control">
                 <button type="submit" class="button is-link">Delete Project</button>
            </div>
            </div>

    </form>
    @endsection
