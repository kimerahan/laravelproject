@extends('layouts.app')
@section('content')

<div class="container">
<section class="section-padding">
<div class="jumbotron text-center">
<h4>Edit Member {{ $members->name }}</h4>

{{ Form::open(['url'=> '/editmember', 'class' => 'form', 'enctype' => 'multipart/form-data']) }}
<table class="table">
<thead>
<tr>
<th>{{ Form::label('name', 'Name:') }}</th>
<th>{{ Form::label('phone', 'Phone:') }}</th>
<th>{{ Form::label('email', 'Email:') }}</th>
<th>{{ Form::label('occupation', 'Occupation:') }}</th>
<th>{{ Form::label('age', 'Age:') }}</th>
<th>{{ Form::label('sex', 'Sex:') }}</th>
</tr>
</thead>
<tbody>

<tr>
<td>{{ Form::text('name', $members->name , ['class'=>'form-control']) }} </td>
<td> {{ Form::text('phone',  $members->phone , ['class'=>'form-control']) }}</td>
<td> {{ Form::text('email',  $members->email , ['class'=>'form-control']) }}</td> 
<td> {{ Form::text('occupation',  $members->occupation , ['class'=>'form-control']) }}</td>
<td>{{ Form::text('age',  $members->age , ['class'=>'form-control']) }} </td>
<td> {{ Form::text('sex',  $members->sex , ['class'=>'form-control']) }}</td>
<td> <div class="form-group">
{{ Form::submit('Save Member', ['class'=>'btn btn-primary']) }}
</div>
{{ Form::close() }}

</div></td>
</tr>

</tbody>
</table>

<!-- <div>
{{ Form::label('image', 'Upload Excel:') }}
{{ Form::file('image', ['class' => 'field']) }}
</div> -->



</section>
</div>
 @stop
