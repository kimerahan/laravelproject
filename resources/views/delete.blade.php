
@extends('layouts.app')
@section('content')
<section class="header section-padding">
<div class="background">&nbsp;</div>
<div class="container">
<div class="header-text">
<h1>Delete</h1>
<p>
Delete tasks page
</p>
</div>
</div>
</section>

<div class="container">
<section class="section-padding">
<div class="jumbotron text-center">


<h3><span class="grey">Delete Task </span> {{ $task->id }}
</h3>

<table class="table">
<thead>
<tr>
<th>#</th>
<th>Title</th>
<th>Body</th>
<th>Finish</th>
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

</td>
</tr>
</tbody>
</table>

<!-- <h1>Do you want to delete Task {{ $task->id }}? </h1> -->

{{ Form::open(['url'=> '/delete', 'class'=>'form']) }}
<!-- {{ Form::hidden('id', $task->id)}}
 -->
<div class="form-group">
{{ Form::submit('Delete Task', ['class' => 'btn btn-primary']) }}
<a href="{{ action('TaskController@home') }}"
class="btn btn-danger"> No </a>
</div>

{{ Form::close() }} 
</div>
</section>
</div>
 
@endsection
