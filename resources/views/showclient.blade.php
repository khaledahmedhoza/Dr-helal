@extends('layouts.app')

@section('content')
<div class="container">
	<h2>{{$client->name}}</h2>
   <a href="{{ url('/addtashkhes') }}/?id={{$client->id}}"><button>add new tashkhes</button></a>
 
     <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                     @foreach($hist as $history)
     				 <p> 	{{$history->tashkhes}}</p>
     				 updated at :{{$history->updated_at}}
     				 created at :{{$history->created_at}}
     				 <a href="{{ url('/edittashkhes') }}/?tashid={{$history->id}}"><button>edit</button></a>
                    <a><form action="{{ url('/deltashkhes') }}/?tashid={{$history->id}}" method="POST">{{ csrf_field() }}<input name="_method" type="hidden" value="delete"><button>delete</button></form></a>
     				 <hr>
      				 @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
