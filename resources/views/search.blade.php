@extends('layouts.app')
@section('content')
<section class="header section-padding">
<div class="background">&nbsp;</div>
<div class="container">
<div class="header-text">
<h1>Member Details</h1>


</div>
</div>
</section>

<div class="container">
<section class="section-padding">
<div class="jumbotron text-center">
<!-- <h4>Enter Member Details</h4> -->

{{ Form::open(['url'=> '/memberdetails', 'class' => 'form', 'enctype' => 'multipart/form-data']) }}
@if (isset($details))
<p> The Search results for your query <b> {{ $query }} </b> are :</p>

<table class="table">
<thead>
<tr>
<th>{{ Form::label('#', '#:') }}</th>
<th>{{ Form::label('name', 'Name:') }}</th>
<th>{{ Form::label('phone', 'Phone:') }}</th>
<th>{{ Form::label('email', 'Email:') }}</th>
<th>{{ Form::label('occupation', 'Occupation:') }}</th>
<th>{{ Form::label('age', 'Age:') }}</th>
<th>{{ Form::label('sex', 'Sex:') }}</th>
</tr>
</thead>
<tbody>
@foreach($details as $members)
<tr>
<td>{{ $members->id }}</td>
<td>{{ $members->name }}</td>
<td>{{ $members->phone }}</td>
<td>{{ $members->email }}</td> 
<td>{{ $members->occupation }}</td>
<td>{{ $members->age }}</td>
<td>{{ $members->sex }}</td>

</tr>
@endforeach
</tbody>
</table>
@endif
</div>
<a href="{{ action('MemberController@index') }}" class="btn btn-primary">Back</a>

</section>
</div>
 @stop
