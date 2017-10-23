@extends('layouts.app')
@section('content')

<div class="container">
<section class="section-padding">
<div class="jumbotron text-center">
<h4>Delete Member {{ $members->name }}</h4>

<!-- {{ Form::open(['url'=> '/editmember', 'class' => 'form', 'enctype' => 'multipart/form-data']) }} -->
{{ Form::open(['url'=> '/deletemember', 'class'=>'form']) }}
 <input type="hidden" name="_method" value="POST" /> 
 {{ Form::hidden('id', $members->id)}}
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
<td>{{ $members->name }}</td>
<td>{{ $members->phone }}</td>
<td>{{ $members->email }}</td> 
<td>{{ $members->occupation }}</td>
<td>{{ $members->age }}</td>
<td>{{ $members->sex }}</td>
<td> <div class="form-group">
{{ Form::submit('Delete Member', ['class' => 'btn btn-primary']) }}
<a href="{{ action('MemberController@index') }}"
class="btn btn-danger"> No </a>
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
