@extends('layouts.app')

@section('content')
<h1>Tasks</h1>
<hr>
@include('common.errors')
<h2>Add a new Task</h2>
<form action="/task" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="task" class="col-sm-3 control-label">Task</label>
        <div class="col-sm-6">
            <input type="text" name="name" id="task-name" class="form-control" placeholder="Some task you have to do...">
        </div>
    </div>
    <div class="form-group mt-2">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-outline-primary">Add Task</button>
        </div>
    </div>
</form>
<hr>
<div class="panel panel-default mt-4">
    <div class="panel-heading">
        <h2>Current Tasks</h2>
    </div>
    <div class="panel-body">
        <table class="table table-striped task-table">
            <thead class="table-light">
                <th colspan="2">Task</th>
            </thead>
            <tbody>
                @if (count($tasks) > 0)
                    @foreach ($tasks as $task)
                    <tr class="align-middle">
                        <!-- Task Name -->
                        <td>
                            <div>{{ $task->name }}</div>
                        </td>
                    
                        <!-- Delete Button -->
                        <td>
                            <form action="/task/{{ $task->id }}" method="POST" class="d-flex justify-end">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-outline-danger ms-auto">Delete Task</button>
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