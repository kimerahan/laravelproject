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
@if ($members->isEmpty())
<p> Currently, there is no member!</p>
@else
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
@foreach($members as $members)
<tr>
<td><a href="{{ action('MemberController@show', $members->id) }}">{{ $members->name }}</td>
<td>{{ $members->phone }}</td>
<td>{{ $members->email }}</td> 
<td>{{ $members->occupation }}</td>
<td>{{ $members->age }}</td>
<td>{{ $members->sex }}</td>
<!-- <td> <div class="form-group">
{{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
</div>
{{ Form::close() }}

</div></td> -->
</tr>
@endforeach
</tbody>
</table>
@endif
</div>

<a href="{{ action('MemberController@createmember') }}" class="btn btn-primary">Create Member</a>
<!-- <div>
{{ Form::label('image', 'Upload Excel:') }}
{{ Form::file('image', ['class' => 'field']) }}
</div> -->

</section>
</div>
 @stop
