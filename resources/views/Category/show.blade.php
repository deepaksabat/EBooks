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
        <div class="col-md-12">
            <div class="clearfix"></div>
            <div class="panel panel-default">
                <div class="panel-heading">Category-{{$category->name}}</div>
                <div class="panel-body">
                    <table class="table striped">
                        <thead>
                            <tr>
                                
                                <th>Name</th>
                                <th>Seo Url</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                
                                <td>{{$category->name}}</td>
                                <td>{{$category->seo_url}}</td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
