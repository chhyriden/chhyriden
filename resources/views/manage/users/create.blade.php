@extends('layouts.manage')

@section('content')   
<h1 class="subtitle">Create New Account<h1>
    <form method="POST" action="{{ route('users.store') }}" role="form">

        {{csrf_field()}}

        <div class="field">
            <p class="control has-icons-left">
                <input required name='name' class="input {{ $errors->has('name') ? ' is-danger' : '' }}" type="" placeholder="Full Name" value="{{old('name')}}">
                <span class="icon is-small">
                    @if($errors->has('name'))
                    <i class="fa fa-warning" style="color:#ff3860"></i>
                    @else
                    <i class="fa fa-user"></i>
                    @endif
                </span>
                <p class="help is-danger">{{$errors->first('name')}}</p>
            </p>
        </div>

        <div class="field">
            <p class="control has-icons-left">
                <input required name='email' class="input {{ $errors->has('email') ? ' is-danger' : '' }}" type="email" placeholder="address@email.com" value="{{old('email')}}">
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

        <div class="field" v-cloak>
            <p class="control has-icons-left" v-if="!auto_password">
                <input required name='password' class="input {{ $errors->has('password') ? ' is-danger' : '' }}" type="password" placeholder="ឲ្យលេខសំងាត់ទៅអ្នកប្រើប្រាស់ដោយផ្ទាល់">                
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
        <b-checkbox class="m-t-10" name="auto_generate" v-model="auto_password">ប្រើលេខសំងាត់ស្វ័យប្រវ័ត្ត</b-checkbox>
    </div>

    <div class="columns is-mobile">
        <div class="column m-t-5">
            <button type="submit" class="button is-info">Create</button>
            <a href=" {{route('users.index')}} " class="button is-outlined">Cancle</a>
        </div>
    </div>
</form>

@endsection


@section('scripts')
<script>
    var app = new Vue({
        el: '#manage',
        data: {
            auto_password: true
        }
    })
</script>
@endsection