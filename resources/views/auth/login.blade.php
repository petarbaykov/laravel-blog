<?php $isAuth = true; ?>
@extends('layouts.app')

@section('content')
<div class="container">
                

                    <form class="form-horizontal form-signin" method="POST" action="{{ route('login') }}">
                        <h2 class="form-signin-heading">Login</h2>
                        {{ csrf_field() }}
                         @if ($errors->has('email') || $errors->has('password'))
                            <div class="alert alert-danger">
                                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        @endif
                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">


                            <div class="">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                               
                            </div>
                        </div>

                        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">


                            <div class="">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                
                            </div>
                        </div>

                        
                            <div class="">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                       

                       
                            <div class="">
                                <button type="submit" class="btn btn-lg btn-block btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                       
                    </form>
            

</div>
@endsection
