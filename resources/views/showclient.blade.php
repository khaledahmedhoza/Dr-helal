@extends('layouts.app')

@section('header')
    <div class="container">
    <img class="navbar-brand" src="/images/default.jpg"  style="width:90px; height:90px; border-radius:35%;">
        <div class="page-header clearfix">
        <h1>

            <!--     --> {{$client->name}}
            <a class="btn btn-success pull-right" href="{{ url('/addtashkhes') }}/?id={{$client->id}}"><i class="glyphicon glyphicon-plus"></i> add tashkees</a>
        </h1>

        </div>
    </div>
@endsection

@section('content')
<div class="container">
	 <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                     
                    <table class="table table-condensed table-striped">

                    <thead>
                        <tr>
                            <th><code>NAME</code></th>
                            <th><code>updated at</code></th>
                            <th><code>created at</code></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($hist as $history)
                            <tr>
                                <td>{{$history->tashkhes}}</td>
                                <td>{{$history->updated_at}}</td>
                                <td>{{$history->created_at}}</td>
                                <td class="text-right">

                                    
                                    <a class="btn btn-xs btn-info" href="{{ url('/edittashkhes') }}/?tashid={{$history->id}}"><i class="glyphicon glyphicon-edit"></i> Edit</a>

                                    
                                    
                                    <form action="{{ url('/deltashkhes') }}/?tashid={{$history->id}}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">

                                        <input type="hidden" name="_method" value="DELETE">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>

                                    </form>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

                </div>
            
            <div class="row">
                <div class="col-md-12">

                    <form class="form-horizontal" role="form" method="POST" action="">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">tashkhes</label>

                            <div class="col-md-6">
                                <textarea id="tash" rows="4" cols="50"  class="form-control" name="tash" value=""></textarea>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Add new tashkhes
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>


            </div>
        
        </div>

    </div>
</div>
@endsection
