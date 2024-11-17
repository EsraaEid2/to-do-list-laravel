@extends('layouts.app')

@section('content')
    <h1 class="mb-4 text-center text-primary">Task List</h1>
    
    @foreach($tasks as $task)
        <div class="card mb-3 @if($task->isCompleted()) border-success bg-light @else border-warning @endif shadow-lg hover-shadow-lg" style="transition: transform 0.2s;">
            <div class="card-body">
                <p class="card-text text-dark">{{ $task->description }}</p>
                
                @if(!$task->isCompleted())
                    <form action="/tasks/{{ $task->id }}" method="POST" class="d-inline-block">
                        @method('PATCH')
                        @csrf
                        <button class="btn btn-success btn-sm" type="submit" style="transition: background-color 0.3s;">Complete</button>
                    </form>
                @else
                    <form action="/tasks/{{ $task->id }}" method="POST" class="d-inline-block">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm" type="submit" style="transition: background-color 0.3s;">Delete</button>
                    </form>
                @endif
            </div>
        </div>
    @endforeach

    <a href="/tasks/create" class="btn btn-primary btn-lg btn-block mt-4 hover:bg-primary text-white shadow-sm" style="transition: background-color 0.3s, box-shadow 0.3s;">New Task</a>
@endsection
