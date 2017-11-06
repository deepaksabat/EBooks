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
            <a href="category/create">
                <div class="btn btn-success">Add Category</div>
            </a>
            <h4 class="pull-right">Total : {{$categories->total()}}</h4>
            <div class="clearfix"></div>
            <div class="panel panel-default">
                <div class="panel-heading">All Category</div>
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
                                <td>
                                    {{ link_to_route('category.edit', 'Edit', array($val->id), array('class' => 'btn btn-default btn-sm')) }}</td>
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
