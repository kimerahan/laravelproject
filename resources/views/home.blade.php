@extends('layouts.app')

@section('content')

<section class="header section-padding">
<div class="background">&nbsp;</div>
<div class="container">
<div class="header-text">

<h2><div class="panel-heading">Dashboard</div></h2>
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
Welcome {{ Auth::user()->name }} 
<br />
</div>
</div>
</section>
<div class="container">
<section class="section-padding">
<div class="jumbotron text-center">
<div class="panel panel-default">

@if ($tasks->isEmpty())
<p> Currently, there is no task!</p>
@else
<table class="table">
<thead>
<tr>
<th>#</th>
<th>Title</th>
<th>Body</th>
<th>Image</th>
<!-- <th>Audio</th> -->
<th>Finish</th>
<<!-- th>Control</th> -->
</tr>
</thead>
<tbody>
@foreach($tasks as $task)
<tr>
<td>{{ $task->id }} </td>
<td>
<a href="{{ action('TaskController@show', $task->id) }}">
{{ $task->title }}</a>
 </td>
<!-- <td>{{ $task->title }}</td> -->
<td>{{ $task->body}}</td>
<td><img src='{{ asset('uploads'.'/'.$task->image) }}' height =100px width = 100px /></td>
<td>{{ $task->done ? 'Yes' : 'No'}}</td>


</tr>
@endforeach
</tbody>
</table>
@endif
</div>
</div>
</section>
<a href="{{ action('TaskController@create') }}" class="btn btn-primary">Create Devotional</a>
</div>

 @stop

<!-- <td></td> -->
<!-- <a href="{{ action('TaskController@edit',
$task->id) }}" class="btn">Edit</a>
<a href="{{ action('TaskController@delete',
$task->id) }}" class="btn">Delete</a>

                  -->