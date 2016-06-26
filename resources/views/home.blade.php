@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @foreach($clients as $client)
                    {{ $client->name }}
                    <a href="{{ url('/getpatient/') }}/?id={{$client->id}}"><button>view</button></a>
                    <a href="{{ url('/editpatient/') }}/?id={{$client->id}}"><button>edit</button></a>
                    <a><form action="{{ url('/delpatient/') }}/?id={{$client->id}}" method="POST">{{ csrf_field() }}<input name="_method" type="hidden" value="delete"><button>delete</button></form></a>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
