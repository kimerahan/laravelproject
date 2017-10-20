@extends('layouts.app')
@section('content')
<section class="header section-padding">
<div class="background">&nbsp;</div>
<div class="container">
<div class="header-text">
<h1>Create Member </h1>

</div>
</div>
</section>

<div class="container">
<section class="section-padding">
<div class="jumbotron text-center">
<h4>Enter Member Details</h4>

{{ Form::open(['url'=> '/createmember', 'class' => 'form', 'enctype' => 'multipart/form-data']) }}
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
<td>{{ Form::text('name', null, ['class'=>'form-control']) }} </td>
<td> {{ Form::text('phone', null, ['class'=>'form-control']) }}</td>
<td> {{ Form::text('email', null, ['class'=>'form-control']) }}</td> 
<td> {{ Form::text('occupation', null, ['class'=>'form-control']) }}</td>
<td>
{{ Form::text('age', null, ['class'=>'form-control']) }} </td>
<td> {{ Form::text('sex', null, ['class'=>'form-control']) }}</td>
<td> <div class="form-group">
{{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
</td>
</tr>

</tbody>
</table>


{{ Form::close() }}

<h3>OR </h3>

<div class="container">
        
 
        @if ( Session::has('success') )
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{ Session::get('success') }}</strong>
    </div>
    @endif
 
    @if ( Session::has('error') )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{ Session::get('error') }}</strong>
    </div>
    @endif
 
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      <div>
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
</div>
@endif
 
<!-- <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    Choose your xls/csv File : <input type="file" name="file" class="form-control">
 
    <input type="submit" class="btn btn-primary btn-lg" style="margin-top: 2%">
</form> -->
<br>
{{ Form::open(['url'=> '/import', 'class' => 'form', 'enctype' => 'multipart/form-data']) }}
{{ Form::label('file', 'Upload Excel xls/csv:') }}
{{ Form::file('file', ['class' => 'field']) }}
{{ Form::submit('Submit File', ['class'=>'btn btn-primary']) }}
{{ Form::close() }}
 
</div>


<!-- {{ Form::open(['url'=> '/import', 'class' => 'form', 'enctype' => 'multipart/form-data']) }}
{{ Form::label('file', 'Upload Excel xls/csv:') }}
{{ Form::file('file', ['class' => 'field']) }}
{{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
{{ Form::close() }}
<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    Choose your xls/csv File : <input type="file" name="file" class="form-control">
 
    <input type="submit" class="btn btn-primary btn-lg" style="margin-top: 3%">
</form>
 -->
</section>
</div>


 @stop
