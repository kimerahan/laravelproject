@extends('layouts.app')

@section('content')

<div class="container">
<section class="section-padding">
<div class="jumbotron text-center">
<div class="panel panel-default">
<div class="panel-heading">
<h3><span class="grey">Task </span> {{ $task->id }}
</h3>
</div>
<table class="table">
<thead>
<tr>
<th>{{ Form::label('name', '#:') }}</th>
<th>{{ Form::label('phone', 'Title:') }}</th>
<th>{{ Form::label('email', 'Body:') }}</th>
<th>{{ Form::label('occupation', 'Image:') }}</th>
<th>{{ Form::label('done', 'Finish:') }}</th>
</tr>
</thead>
<tbody>
<tr>
<td>{{ $task->id }} </td>
<td>{{ $task->title }}</td>
<td>{{ $task->body}}</td>
<td><img src='{{ asset('uploads'.'/'.$task->image) }}' height =100px width = 100px /></td>
<td>{{ $task->done ? 'Yes' : 'No'}}</td>
<td>
<a href="{{ action('TaskController@edit',
$task->id) }}" class="btn">Edit</a>
<a href="{{ action('TaskController@delete',
$task->id) }}" class="btn">Delete</a>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</section>
</div>

@stop

