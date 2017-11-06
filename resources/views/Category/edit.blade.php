@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
    @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
        @elseif( Session::has( 'warning' ))
                 <div class="alert alert-danger">
                    {{ Session::get( 'warning' ) }}
                    </div>
                    @endif
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Category</div>
                <div class="panel-body">
                    {!! Form::model($category, array('route' => array('category.update', $category->id), 'method' => 'PUT', 'files'=>true,'class' => 'form-horizontal')) !!}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {{ Form::label('Name',null,array('class' => ' control-label col-md-2')) }}
                        <div class="col-md-10"> 
                         {{ Form::text('name', null, array('class' => 'form-control')) }} @if ($errors->has('name'))
                        <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span> @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('seo_url') ? ' has-error' : '' }}">
                        {{ Form::label('Seo Url',null,array('class' => ' control-label col-md-2')) }}
                        <div class="col-md-10"> 
                         {{ Form::text('seo_url', null, array('class' => 'form-control')) }} @if ($errors->has('seo_url'))
                        <span class="help-block">
                                <strong>{{ $errors->first('seo_url') }}</strong>
                            </span> @endif
                            </div>
                    </div>
                    {{ Form::token() }}
                     <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-primary" href="{{ route('category.index') }}"> Back</a>
                    </div>
                     {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
