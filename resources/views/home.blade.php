@extends('layouts.app')

@section('header')
    <div class="container">
        <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-user"></i> Clients
            <a class="btn btn-success pull-right" href="/addpatient"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

        </div>
    </div>
@endsection


@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
           <table class="table table-condensed table-striped">

                    <thead>
                        <tr>
                            <th><code>NAME</code></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->name }}</td>
                    
                                <td class="text-right">

                                    <a class="btn btn-xs btn-primary" href="{{ url('/getpatient/') }}/?id={{$client->id}}"><i class="glyphicon glyphicon-eye-open"></i> View</a>

                                    <a class="btn btn-xs btn-info" href="{{ url('/editpatient/') }}/?id={{$client->id}}"><i class="glyphicon glyphicon-edit"></i> Edit</a>

                                    
                                    
                                    <form action="{{ url('/delpatient/') }}/?id={{$client->id}}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">

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
    </div>
</div>

@endsection
