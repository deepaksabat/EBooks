@extends('layouts.master') @section('content')
<style type="text/css">
.book{border:0;vertical-align:middle;box-shadow:5px 5px 5px #786D5F;}
.smim{background:#252525;}
.navbar-inverse .brand, .navbar-inverse .nav > li > a {color:#eef0f1; font-family: Verdana, Geneva, sans-serif}
.navbar-form > input[type=text]{ font-family: Verdana, Geneva, sans-serif;}
h1,h2,h3,h4,h5,h6{ font-family: Verdana, Geneva, sans-serif}
h1{font-size:200%;color:#0e3e55;}
h2{font-size:160%; color:#155b7d;}
h3{font-size:110%;line-height:20px;}
h4{font-size:100%;}
.brand{text-transform:uppercase;}
.bd{font-weight:bold;}
.bla{color:#1b1b1b;}
.glin iframe{max-width:100%;}
.dq{background:none;color:#08c;border:inherit;text-align:left;}
.dq:hover, .dq:focus {color: #005580;}
.dq[disabled]{background:none;}
.sko > a, .dpl {border: 1px solid rgba(0, 0, 0, 0.2);display: inline-block;font-size: 14px;line-height: 16px;margin: 0 8px 8px 0;padding: 6px 10px;}
.dq[disabled]:hover, .dq[disabled]:focus {color: #08c;}
.gry{text-transform:uppercase;line-height:30px;}
.fihid{position:absolute;right:0;top:0;opacity:0.0;}
.fidiv{position:relative;width:100px;height:30px;overflow:hidden;}
.sl{font-size:12px; color: #9da0a4; font-weight:bold;}
.nb{border:0;}
.roi{background:#FEFCFF;}
.mpj{text-align:center;padding-top:0.7%;padding-bottom:0.3%;}
.blo{background:#1b1b1b;color:#eef0f1;font-family: Verdana, Geneva, sans-serif}
.bin{border:25px solid #FEFCFF;}
.inner{border: 2px solid #59f700;}
.sco{background:#fefcff; border:1px solid #59f700;left:0px;top:50%;position:fixed;margin-top:-100px;}
.smn{border:8px solid #fefcff;display:block;}
a:hover,a:focus{text-decoration:inherit;}
@media only screen and (min-width:1024px){.eci{text-align:center;}}
@media screen and (max-width: 980px){.sco{display:none;}}
@media screen and (min-height: 600px){.amo{margin-top:15px;}}
</style>
</head>
<div class="container roi">
<div class="inner">
<div class="bin">
<div itemscope itemtype="http://schema.org/Book">
<div class="row-fluid"><div class="span12"><h1 itemprop="name">{{$book->name}}</h1></div>
</div>
<div class="row-fluid">
<div class="col-md-3">
<img width="220" height="280" class="img-polaroid" itemprop="image" src="{{ url('/') }}/book/{{$book->id}}/{{$book->image}}" alt="{{$book->name}}">
</div>
<div class="col-md-9">
<h4 class="gry">Book details:</h4>
<div class="row-fluid">
<div class="col-md-6">
<table class="table table-bordered">
<tr><td>Publisher:</td><td itemprop="publisher">{{$book->publisher}}</td></tr>
<tr><td>Category:</td><td>
<?php
	$getCatName = DB::table('categories')->where('id',$book->category_id)->first();
?>
<a title="{{$getCatName->name}} eBooks" href="{{ url('/') }}/category/{{$book->category_id}}">{{$getCatName->name}}</a>
</td></tr>
<tr><td>Author:</td><td><a title="{{$book->author}} eBooks" itemprop="author" >{{$book->author}}</a></td></tr>
<tr><td>Edition:</td><td itemprop="bookEdition">{{$book->edition}}</td></tr>
<tr><td>ISBN:</td><td itemprop="isbn">{{$book->isbn}}</td></tr>
</table>
</div>
<div class="col-md-6">
<table class="table table-bordered">
<tr><td>Pages:</td><td itemprop="numberOfPages">{{$book->pages}}</td></tr>
<tr><td>Published:</td><td itemprop="datePublished" content="{{date('d-m-Y', strtotime($book->published))}}">{{date('d-m-Y', strtotime($book->published))}}</td></tr>
<tr><td>Posted:</td><td itemprop="dateCreated" content="{{date('d-m-Y', strtotime($book->posted))}}">{{date('d-m-Y', strtotime($book->posted))}}</td></tr>
<tr><td>Language:</td><td itemprop="inLanguage">{{$book->language}}</td></tr>
<tr><td>Book format:</td><td itemprop="bookFormat">{{$book->book_format}}</td></tr>
<tr><td>Book size:</td><td>{{$book->book_size}}</td></tr>
</table>
</div>
</div>
</div>
</div>
</div>
<!--
</div>
</div> -->
<div class="row-fluid"><div class="span12"><h4 class="gry">Book Description:</h4></div></div>
<div class="row-fluid"><div class="span12">{{$book->description}}.</div></div>
<div class="row-fluid">
<div class="span3">
<div><h4 class="gry">Download Link:</h4></div>
<div>
<a href="{{url('/')}}/book/{{$book->id}}/downlode">
                <div class="btn btn-success">Direct Downlode Link</div>
            </a>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection