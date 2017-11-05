@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="columns">
                <div class="column is-one-third is-offset-one-third m-t-75">
                    <div class="card">
                        <div class="card-content">
                            @if(session('status'))
                                <div class="notification is-primary">
                                    {{session('status')}}
                                </div>
                            @endif
                            <h1 class="subtitle has-text-centered">Enter New Password<h1>
                        <form method="POST" action="{{ route('password.request') }}" role="form">

                            {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="field">
                                <p class="control has-icons-left">
                                    <input required name='email' class="input {{ $errors->has('email') ? ' is-danger' : '' }}" type="email" placeholder="email@address.com" value="{{ $email or old('email') }}">
                                    <span class="icon is-small">
                                    @if($errors->has('email'))
                                        <i class="fa fa-warning" style="color:#ff3860"></i>
                                    @else
                                    <i class="fa fa-envelope"></i>
                                    @endif
                                    </span>
                                    <p class="help is-danger">{{$errors->first('email')}}</p>
                                </p>
                            </div>

                            <div class="field">
                                <p class="control has-icons-left">
                                    <input required name='password' class="input {{ $errors->has('password') ? ' is-danger' : '' }}" type="password" placeholder="Password">                
                                    <span class="icon is-small">
                                    @if($errors->has('password'))
                                        <i class="fa fa-warning" style="color:#ff3860"></i>
                                    @else
                                    <i class="fa fa-lock"></i>
                                    </span>
                                    @endif
                                    </span>
                                    <p class="help is-danger">{{$errors->first('password')}}</p>
                                </p>
                            </div>

                            <div class="field">
                                <p class="control has-icons-left">
                                    <input required name='password_confirmation' class="input {{ $errors->has('password_confirmation') ? ' is-danger' : '' }}" type="password" placeholder="Confirm Password">                
                                    <span class="icon is-small">
                                    @if($errors->has('password_confirmation'))
                                        <i class="fa fa-warning" style="color:#ff3860"></i>
                                    @else
                                    <i class="fa fa-lock"></i>
                                    </span>
                                    @endif
                                    </span>
                                    <p class="help is-danger">{{$errors->first('password_confirmation')}}</p>
                                </p>
                            </div>

                            <div class="columns is-mobile m-t-25">
                                <div class="column">
                                    <button type="submit" class="button is-primary is-outlined is-pulled-right">Reset Password</button>
                                </div>
                            </div>
                        </form>

                            <div class="columns is-mobile">
                                <nav class="navbar">
                                    <div class="dropdown is-hoverable">
                                        <div class="navbar-item has-dropdown is-hoverable button is-outlined">
                                            <a class="navbar-link" href="#">
                                            More Options
                                            </a>
                                        </div>
                                        <div class="dropdown-menu">
                                            <div class="dropdown-content">
                                                <a class="dropdown-item" href="{{ route('login') }}">
                                                    <i class="fa fa-address-card-o fa-fw" aria-hidden="true"></i>&nbsp; Already have an Account?
                                                </a>
                                                <a class="dropdown-item is-active" href=" # ">
                                                    <i class="fa fa-question-circle fa-fw" aria-hidden="true"></i>&nbsp; Ask Questions
                                                </a>
                                                <hr class="m-t-5 m-b-5">
                                                <a class="dropdown-item" href="{{route('dashboard')}}">
                                                    &nbsp; ← Back to {{config('app.name')}}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
