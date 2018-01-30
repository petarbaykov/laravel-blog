<?php $isAuth = true; ?>
@extends('layouts.app')

@section('content')
<div class="container">
                    <form class="form-horizontal  form-signin" method="POST" action="{{ route('register') }}">
                        <h2 class="form-signin-heading">Регистрация</h2>
                        {{ csrf_field() }}

                        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

                            <div class="">
                                <input id="name" type="text" placeholder="Име" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
               
                            <div class="">
                                <input id="email" placeholder="Email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                        
                            <div class="">
                                <input id="password" placeholder="Парола" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="">
                        
                            <div class="">
                                <input placeholder="Потвърди парола" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        
                            <div class="">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Регистрация
                                </button>
                            </div>
                        
                    </form>
</div>
@endsection
