@extends('layouts.app')

@section('content')
<h1>Tasks</h1>
<hr>
@include('common.errors')
<h2>Add a new Task</h2>
<form action="/task" method="POST">
    {{ csrf_field() }}
    <div class="row">
        <div class="form-group col-md-6">
            <label for="task-name">Task</label>
            <input type="text" name="name" id="task-name" class="form-control" placeholder="Some task you have to do...">
        </div>
        <div class="form-group col-md-6">
            <label for="category">Category</label>
            <select class="form-select" name="category" id="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group mt-2">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-outline-primary">Add Task</button>
        </div>
    </div>
</form>
<div class="panel panel-default mt-4">
    <div class="panel-heading">
        <h2>Current Tasks</h2>
    </div>
    <div class="panel-body">
        <table class="table table-striped task-table">
            <thead class="table-light">
                <th>Task</th>
                <th>Category</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @if (count($tasks) > 0)
                    @foreach ($tasks as $task)
                    <tr class="align-middle">
                        <td>
                            <div>{{ $task->name }}</div>
                        </td>
                        <td>
                            <div>{{ $task->category->name }}</div>
                        </td>
                        <td>
                            <form action="/task/{{ $task->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-outline-danger">Delete Task</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection