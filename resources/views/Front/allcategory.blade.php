@extends('layouts.master') @section('content')
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
            
            <div class="clearfix"></div>
            <div class="panel panel-default">
                <div class="panel-heading">All Category </div>
                <div class="panel-body">
                    <table class="table striped">
                        <thead>
                            <tr>
                                <th>Sno</th>
                                <th>Name</th>
                                <th>Seo Url</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $key => $val)
                            <tr>
                                <td>{{$key+=1}}</td>
                                <td>{{$val->name}}</td>
                                <td>{{$val->seo_url}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
            {{$categories->links()}}
        </div>
</div>
@endsection
