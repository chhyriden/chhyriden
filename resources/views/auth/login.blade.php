@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{--  Start  --}}
        <div class="columns">
            <div class="column is-one-third is-offset-one-third m-t-75">
                <div class="card">
                    <div class="card-content">
                        <h1 class="subtitle has-text-centered">Login To Dasboard<h1>
                    <form method="POST" action="{{ route('login') }}" role="form">

                        {{ csrf_field() }}

                        <div class="field">
                            <p class="control has-icons-left">
                                <input name='email' class="input {{ $errors->has('email') ? ' is-danger' : '' }}" type="email" placeholder="email@address.com" value=" {{old('email')}}" required autofocus>
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
                                <input required name='password' class="input {{ $errors->has('password') ? ' is-danger' : '' }}" type="password" placeholder="************">                
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

                        <div class="columns is-mobile m-t-25">
                            <div class="column">
                                <b-checkbox>Remember Me</b-checkbox>
                            </div>
                            <div class="column">
                                <button type="submit" class="button is-primary is-outlined is-pulled-right">Login</button>
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
                                            <a class="dropdown-item" href="{{ route('password.request') }}">
                                                <i class="fa fa-lock fa-fw" aria-hidden="true"></i>&nbsp; Lost your password?
                                            </a>
                                            <a class="dropdown-item is-active" href=" {{route('register')}} ">
                                                <i class="fa fa-user-plus fa-fw" aria-hidden="true"></i>&nbsp; Create New Account
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
        {{--  End  --}}
    </div>
</div>
@endsection

@section('scripts')

<script>
    var app = new Vue({
        el: '#auth',
        data: {

        },
    })
</script>
    
@endsection