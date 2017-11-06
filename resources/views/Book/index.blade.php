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
            <a href="books/create">
                <div class="btn btn-success">Add Book</div>
            </a>
            <h4 class="pull-right">Total : {{$books->total()}}</h4>
            <div class="clearfix"></div>
            <div class="panel panel-default">
                <div class="panel-heading">All Book</div>
                <div class="panel-body">
                    <table class="table striped">
                        <thead>
                            <tr>
                                <th>Sno</th>
                                <th>Book</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Posted</th>
                                <th>Edit Book</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $key => $val)
                            <tr>
                                <td>{{$key+=1}}</td>
                                <td><img src="book/{{$val->id}}/{{ $val->image }}" width="70"></td>
                                <td>{{$val->name}}</td>
                                <td>{{$val->description}}</td>
                                <td>{{$val->posted}}
                                <td>
                                    {{ link_to_route('books.edit', 'Edit', array($val->id), array('class' => 'btn btn-default btn-sm')) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
            {{$books->links()}}
        </div>
</div>
@endsection
