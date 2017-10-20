@extends('layouts.app')

@section('content')
<section class="header section-padding">
<div class="background">&nbsp;</div>
<div class="container">
    <div class="header-text">
        <h1>Edit</h1>
        <p>
        Edit tasks page
        </p>
    </div>
</div>
</section>
<div class="container">
    <section class="section-padding">
        <div class="jumbotron text-center">
            <h1>Edit Task {{ $task->id }}</h1>
                {{ Form::open(['url'=> '/edit', 'class'=>'form']) }}
                <input type="hidden" name="_method" value="POST" /> 
                {{ Form::hidden('id', $task->id)}}
            <div class="form-group">
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', $task->title, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('body', 'Body:') }}
                {{ Form::textarea('body', $task->body, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('done', 'Done:') }}
                {{ Form::checkbox('done', 1, $task->done) }}
            </div>
            <div>
           <div>
           <img src='{{ asset('uploads'.'/'.$task->image) }}' height =100px width = 100px />
            {{ Form::label('image', 'Upload Image:') }}
            {{ Form::file('image', ['class' => 'field']) }}
            </div>

            <div>
            {{ Form::label('featured_mp3', 'Upload Audio:') }}
            {{ Form::file('sermon', ['class' => 'field']) }}
            </div>
           
            </div>
            <div class="form-group">
                {{ Form::submit('Save Task', ['class' => 'btn btn-primary']) }}
            </div>
            {{ Form::close() }}

        </div>
    </section>
</div>
@stop

