@extends('layouts.master') @section('content')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="msapplication-config" content="none" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
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
.inner{border: 2px solid #21ABD9;}
.sco{background:#fefcff; border:1px solid #21ABD9;left:0px;top:50%;position:fixed;margin-top:-100px;}
.smn{border:8px solid #fefcff;display:block;}
a:hover,a:focus{text-decoration:inherit;}
@media only screen and (min-width:1024px){.eci{text-align:center;}}
@media screen and (max-width: 980px){.sco{display:none;}}
@media screen and (min-height: 600px){.amo{margin-top:15px;}}
</style>
<div class="container roi">
<div class="inner">
<div class="bin"><div class="row-fluid"><div class="span12"><h1>IT eBooks Download Free</h1></div></div>
@foreach($book as $key)
<div class="row-fluid">
<div class="span12">
<div class="media">
<a title="Configuring Windows 8" class="pull-left" href="{{ route('bookdetails',$key->id) }}">
<img width="115" height="140" class="media-object img-polaroid" src="book/{{$key->id}}/{{$key->image}}" alt="{{$key->name}}"></a>
<div class="media-body">
<h3 class="media-heading hmin"><a title="{{$key->name}}" href="{{ route('bookdetails',$key->id) }}">{{$key->name}}</a></h3>
<div><span class="label label-primary">{{date('d-m-Y', strtotime($key->published))}}</span>&nbsp;
{{$key->description}}
</div>
</div></div>
</div></div>
<br>
@endforeach
<br>
</div>
<div class="text-center">
            {{$book->links()}}
</div>
</div>
</div>
@endsection