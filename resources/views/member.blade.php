@extends('layouts.app')

@section('content')

<div class="container">
<section class="section-padding">
<div class="jumbotron text-center">
<div class="panel panel-default">
<div class="panel-heading">
<h3><span class="grey">Mr/Mrs </span> {{ $members->name }}
</h3>
</div>
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

<td>
<a href="{{ action('MemberController@edit',
$members->id) }}" class="btn">Edit</a> 

</td>
</tr>
</tbody>
</table>
</div>
</div>
</section>
</div>

@stop

