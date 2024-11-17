@extends('layouts.app')

@section('content')
    <h1 class="mb-4 text-center text-info">New Task</h1>
    
    @if($errors->any())
        <div class="alert alert-danger animated fadeIn" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/tasks">
        @csrf
        <div class="form-group mb-3">
            <label for="description" class="text-secondary">Task Description</label>
            <input class="form-control shadow-sm" name="description" value="{{ old('description') }}" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-info btn-block hover:bg-info text-white shadow-lg" style="transition: background-color 0.3s, box-shadow 0.3s;">Create Task</button>
        </div>
    </form>
@endsection
