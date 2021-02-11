@extends('layouts.app')

@section('content')
<h1>Categories with Tasks</h1>
<hr>
@include('common.errors')
<div class="panel panel-default mt-4">
    @if (count($categories) > 0)
        <ul>        
            @foreach ($categories as $category)
            <li>{{$category->name}}</li>
            @if (count($category->tasks) > 0)
                <ol>
                    @foreach ($category->tasks as $task)
                    <li>{{$task->name}}</li>
                    @endforeach
                </ol>
            @endif
            @endforeach
        </ul>
    @endif
</div>
@endsection