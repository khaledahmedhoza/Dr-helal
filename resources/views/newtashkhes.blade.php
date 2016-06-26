@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New tashkhes</div>
                <a href="{{ url('/getpatient/') }}/?id={{$id}}"><button>cancel</button></a>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/addtashkhes') }}/?patientid={{$id}}">
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
@endsection
