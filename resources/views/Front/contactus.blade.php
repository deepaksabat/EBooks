@extends('layouts.master') @section('content')
<style >
    .changelabelcolor
    {
        color: white;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            @if(session()->has('message'))
            <div class="alert alert-success">
            {{ session()->get('message') }}
            </div>
            @endif
        <div class="text-center">
        <h3>FEEDBACK</h3>
        </div> 
            {{ Form::open(array('route' => 'news.contactstore','class' => 'form-horizontal','files'=>true)) }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {{ Form::label('Name',null,array('class' => ' col-md-2 control-label changelabelcolor')) }}
                        <div class="col-md-10">
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        @if ($errors->has('name'))
                        <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span> @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {{ Form::label('Email',null,array('class' => ' col-md-2 control-label changelabelcolor')) }}
                        <div class="col-md-10">
                            {{ Form::text('email', null, array('class' => 'form-control')) }} @if ($errors->has('email'))
                        <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span> @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                        {{ Form::label('Message',null,array('class' => ' col-md-2 control-label changelabelcolor')) }}
                        <div class="col-md-10">
                            {{ Form::textarea('message', null, array('class' => 'form-control')) }} @if ($errors->has('message'))
                        <span class="help-block">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span> @endif
                            </div>
                    </div>
                 {{ Form::token() }} {{ Form::submit(null, array('class' => 'btn btn-default center-block')) }} {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
