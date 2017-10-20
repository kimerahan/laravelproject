@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contact Us</div>

                <div class="panel-body">
                                                     
                   <p>Please contact us by sending a message using the form below:</p>
                    {{ Form::open(array('url' => 'contact')) }}
                    {{ Form::label('Subject') }}
                    {{ Form::text('subject','Enter your subject') }}
                    <br />
                    {{ Form::label('Message') }}
                    {{ Form::textarea('message','Enter your message') }}
                    <br />
                    {{ Form::submit() }}
                    {{ Form::close() }}

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
