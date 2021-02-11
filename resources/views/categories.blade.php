@extends('layouts.app')

@section('content')
<h1>Categories</h1>
<hr>
@include('common.errors')
<h2>Add a new Category</h2>
<form action="/category" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="task" class="col-sm-3 control-label">Categories</label>
        <div class="col-sm-6">
            <input type="text" name="name" id="category-name" class="form-control" placeholder="Some descriptive name for a cateogry...">
        </div>
    </div>
    <div class="form-group mt-2">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-outline-primary">Add Category</button>
        </div>
    </div>
</form>
<div class="panel panel-default mt-4">
    <div class="panel-body">
        <table class="table table-striped task-table">
            <thead class="table-light">
                <th>Category</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @if (count($categories) > 0)
                    @foreach ($categories as $category)
                    <tr class="align-middle">
                        <td>
                            <div>{{ $category->name }}</div>
                        </td>
                        <td>
                            <form action="/category/{{ $category->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-outline-danger">Delete Category</button>
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