@extends('layouts.app')

@section('content')

<!-- <div class="container col-md-12" style="background-color:yellow ; background-image:url(images/background1.jpg)">
    <img src="" style="opacity: 0.5">    
</div>
 -->

<div class="container" style="background-color: rgba( 0 , 0 , 0 , 0.0);">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="background-color: rgba( 0 , 0 , 0 , 0.0); " >
            <div class="panel panel-default" style="background-color: rgba( 0 , 0 , 0 , 0.2); border-width:0px" >
                <div class="panel-heading" style="background-color: rgba( 0 , 0 , 0 , 0.0); " >Login</div>
                <div class="panel-body" style="background-color: rgba( 0 , 0 , 0 , 0.0); ">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label" style="color:white">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" 

                                style="color:#123CAB" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label" style="color:white">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" 
                                style="color:#123CAB" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" style="color:white"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
