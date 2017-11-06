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
                <div class="panel-heading">Add Book</div>
                <div class="panel-body">
                    {{ Form::open(array('route' => 'books.store','files'=>true,'class' => 'form-horizontal')) }}
                    <div class="form-group{{ $errors->has('pdf') ? ' has-error' : '' }}">
                        {{ Form::label('Book',null,array('class' => ' control-label col-md-2')) }}
                        <div class="col-md-10"> 
                         {{ Form::file('pdf', null, array('class' => 'form-control','accept'=>'application/pdf,chm,djvu,epub')) }} @if ($errors->has('pdf'))
                        <span class="help-block">
                                <strong>{{ $errors->first('pdf') }}</strong>
                            </span> @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                        {{ Form::label('Select Category',null,array('class' => ' col-md-2 control-label')) }}
                        <div class="col-md-10">
                            {{ Form::select('category_id',$category,null, array('class' => 'form-control','placeholder'=>'select a category')) }}
                        @if ($errors->has('category_id'))
                        <span class="help-block">
                                <strong>{{ $errors->first('category_id') }}</strong>
                            </span> @endif
                            </div>                            
                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {{ Form::label('Name',null,array('class' => ' control-label col-md-2')) }}
                        <div class="col-md-10"> 
                         {{ Form::text('name', null, array('class' => 'form-control')) }} @if ($errors->has('name'))
                        <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span> @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        {{ Form::label('Description',null,array('class' => ' control-label col-md-2')) }}
                        <div class="col-md-10"> 
                         {{ Form::textarea('description', null, array('class' => 'form-control')) }} @if ($errors->has('description'))
                        <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span> @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        {{ Form::label('Image',null,array('class' => ' control-label col-md-2')) }}
                        <div class="col-md-10"> 
                         {{ Form::file('image', null, array('class' => 'form-control')) }} @if ($errors->has('image'))
                        <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span> @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('publisher') ? ' has-error' : '' }}">
                        {{ Form::label('Publisher',null,array('class' => ' control-label col-md-2')) }}
                        <div class="col-md-10"> 
                         {{ Form::text('publisher', null, array('class' => 'form-control')) }} @if ($errors->has('publisher'))
                        <span class="help-block">
                                <strong>{{ $errors->first('publisher') }}</strong>
                            </span> @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                        {{ Form::label('Author',null,array('class' => ' control-label col-md-2')) }}
                        <div class="col-md-10"> 
                         {{ Form::text('author', null, array('class' => 'form-control')) }} @if ($errors->has('author'))
                        <span class="help-block">
                                <strong>{{ $errors->first('author') }}</strong>
                            </span> @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('edition') ? ' has-error' : '' }}">
                        {{ Form::label('Edition',null,array('class' => ' control-label col-md-2')) }}
                        <div class="col-md-10"> 
                         {{ Form::text('edition', null, array('class' => 'form-control')) }} @if ($errors->has('edition'))
                        <span class="help-block">
                                <strong>{{ $errors->first('edition') }}</strong>
                            </span> @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('isbn') ? ' has-error' : '' }}">
                        {{ Form::label('ISBN',null,array('class' => ' control-label col-md-2')) }}
                        <div class="col-md-10"> 
                         {{ Form::text('isbn', null, array('class' => 'form-control')) }} @if ($errors->has('isbn'))
                        <span class="help-block">
                                <strong>{{ $errors->first('isbn') }}</strong>
                            </span> @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('pages') ? ' has-error' : '' }}">
                        {{ Form::label('Pages',null,array('class' => ' control-label col-md-2')) }}
                        <div class="col-md-10"> 
                         {{ Form::text('pages', null, array('class' => 'form-control')) }} @if ($errors->has('pages'))
                        <span class="help-block">
                                <strong>{{ $errors->first('pages') }}</strong>
                            </span> @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('published') ? ' has-error' : '' }}">
                        {{ Form::label('Published',null,array('class' => ' control-label col-md-2')) }}
                        <div class="col-md-10"> 
                         {{ Form::text('published', null, array('class' => 'form-control','class'=>'datepicker')) }} @if ($errors->has('published'))
                        <span class="help-block">
                                <strong>{{ $errors->first('published') }}</strong>
                            </span> @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('posted') ? ' has-error' : '' }}">
                        {{ Form::label('Posted',null,array('class' => ' control-label col-md-2')) }}
                        <div class="col-md-10"> 
                         {{ Form::text('posted', null, array('class' => 'form-control','class'=>'datepicker')) }} @if ($errors->has('posted'))
                        <span class="help-block">
                                <strong>{{ $errors->first('posted') }}</strong>
                            </span> @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('language') ? ' has-error' : '' }}">
                        {{ Form::label('Language',null,array('class' => ' control-label col-md-2')) }}
                        <div class="col-md-10"> 
                         {{ Form::text('language', null, array('class' => 'form-control')) }} @if ($errors->has('language'))
                        <span class="help-block">
                                <strong>{{ $errors->first('language') }}</strong>
                            </span> @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('book_format') ? ' has-error' : '' }}">
                        {{ Form::label('BookFormat',null,array('class' => ' control-label col-md-2')) }}
                        <div class="col-md-10"> 
                         {{ Form::text('book_format', null, array('class' => 'form-control')) }} @if ($errors->has('book_format'))
                        <span class="help-block">
                                <strong>{{ $errors->first('book_format') }}</strong>
                            </span> @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('book_size') ? ' has-error' : '' }}">
                        {{ Form::label('BookSize',null,array('class' => ' control-label col-md-2')) }}
                        <div class="col-md-10"> 
                         {{ Form::text('book_size', null, array('class' => 'form-control')) }} @if ($errors->has('book_size'))
                        <span class="help-block">
                                <strong>{{ $errors->first('book_size') }}</strong>
                            </span> @endif
                            </div>
                    </div>
                    {{ Form::token() }}
                     <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-primary" href="{{ route('books.index') }}"> Back</a>
                    </div>
                     {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
