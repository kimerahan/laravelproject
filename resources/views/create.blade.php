@extends('layouts.app')
@section('content')

<div class="container">
<section class="section-padding">
<div class="jumbotron text-center">
<h4>Create Task Content</h4>

{{ Form::open(['url'=> '/create', 'class' => 'form', 'enctype' => 'multipart/form-data']) }}
<div>
{{ Form::label('title', 'Title:') }}
{{ Form::text('title', null, ['class'=>'form-control']) }}
</div>

<div>
{{ Form::label('body', 'Body:') }}
{{ Form::textarea('body', null, ['class'=>'form-control']) }}

</div>
<div>
{{ Form::label('image', 'Upload Image:') }}
{{ Form::file('image', ['class' => 'field']) }}
</div>

<div>
{{ Form::label('featured_mp3', 'Upload Audio:') }}
{{ Form::file('sermon', ['class' => 'field']) }}
</div>

<div class="form-group">
{{ Form::submit('Create Task', ['class'=>'btn btn-primary']) }}
</div>
{{ Form::close() }}

</div>
</section>
</div>
 @stop
