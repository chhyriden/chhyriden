@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="columns">
            <div class="column is-one-third is-offset-one-third m-t-75">
                <div class="card">
                    <div class="card-content">
                        @if(session('status'))
                            <div class="notification is-primary">
                                {{session('status')}}
                            </div>
                        @endif
                        <h1 class="subtitle has-text-centered">Reset Password<h1>
                    <form method="POST" action="{{ route('password.email') }}" role="form">

                        {{ csrf_field() }}

                        <div class="field">
                            <p class="control has-icons-left">
                                <input required name='email' class="input {{ $errors->has('email') ? ' is-danger' : '' }}" type="email" placeholder="name@email.com" value="{{old('email')}}">
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

                        <div class="columns is-mobile m-t-25">
                            <div class="column">
                                <button type="submit" class="button is-primary is-outlined is-pulled-right">Get Reset link</button>
                            </div>
                        </div>
                    </form>
                        <div class="columns is-mobile">
                            <a class="dropdown-item" href="{{route('dashboard')}}">&nbsp; ← Back to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
