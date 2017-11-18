@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="columns">
            <div class="column is-one-third is-offset-one-third m-t-75">
                <div class="card">
                    <div class="card-content">
                        <h1 class="subtitle has-text-centered">Create New Account<h1>
                    <form method="POST" action="{{ route('register') }}" role="form">

                        {{ csrf_field() }}

                        <div class="field">
                            <p class="control has-icons-left">
                                <span class="icon is-small">
                                @if($errors->has('name'))
                                    <i class="fa fa-warning" style="color:#ff3860"></i>
                                @else
                                <i class="fa fa-user"></i>
                                @endif
                                </span>
                                <input required name='name' class="input {{ $errors->has('name') ? ' is-danger' : '' }}" type="" placeholder="Full Name" value="{{old('name')}}">
                                <p class="help is-danger">{{$errors->first('name')}}</p>
                            </p>
                        </div>

                        <div class="field">
                            <p class="control has-icons-left">
                                <span class="icon is-small">
                                @if($errors->has('email'))
                                    <i class="fa fa-warning" style="color:#ff3860"></i>
                                @else
                                <i class="fa fa-envelope"></i>
                                @endif
                                </span>
                                <input required name='email' class="input {{ $errors->has('email') ? ' is-danger' : '' }}" type="email" placeholder="email@address.com" value="{{old('email')}}">

                                <p class="help is-danger">{{$errors->first('email')}}</p>
                            </p>
                        </div>

                        <div class="field">
                            <p class="control has-icons-left">
                                <span class="icon is-small">
                                @if($errors->has('password'))
                                    <i class="fa fa-warning" style="color:#ff3860"></i>
                                @else
                                <i class="fa fa-lock"></i>
                                </span>
                                @endif
                                </span>
                                <input required name='password' class="input {{ $errors->has('password') ? ' is-danger' : '' }}" type="password" placeholder="Password">                

                                <p class="help is-danger">{{$errors->first('password')}}</p>
                            </p>
                        </div>

                        <div class="field">
                            <p class="control has-icons-left">
                                <span class="icon is-small">
                                @if($errors->has('password'))
                                    <i class="fa fa-warning" style="color:#ff3860"></i>
                                @else
                                <i class="fa fa-lock"></i>
                                </span>
                                @endif
                                </span>
                                <input required name='password_confirmation' class="input {{ $errors->has('password') ? ' is-danger' : '' }}" type="password" placeholder="Confirm Password">                

                                <p class="help is-danger">{{$errors->first('password')}}</p>
                            </p>
                        </div>

                        <div class="columns is-mobile m-t-25">
                            <div class="column">
                                <button type="submit" class="button is-primary is-outlined is-pulled-right">Register</button>
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
@endsection
