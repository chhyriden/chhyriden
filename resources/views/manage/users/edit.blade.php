@extends('layouts.manage')

@section('content')

    <div class="column">
        <div class="flex-container">
            <div class="card">
                <div class="card-content">      
                    <h1 class="title is-6 tag">Edit User<h1>
                    <form method="POST" action="{{ route('users.update', $user->id) }}" role="form">
                    {{method_field('PUT')}}
                    {{csrf_field()}}
                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <p class="control has-icons-left">
                                        <input required value="{{$user->name}}" name='name' class="input {{ $errors->has('name') ? ' is-danger' : '' }}" type="" placeholder="Full Name" value="{{old('name')}}">
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
                                        <input required name='email' value="{{$user->email}}" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" type="email" placeholder="address@email.com" value="{{old('email')}}">
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
                                    <p class="control has-icons-left" v-if="password_options == 'manual'">
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
                                </div>

                                <div class="field">
                                    <div class="field">
                                        <b-radio v-model="password_options" name="password_options" native-value="keep" value="keep">Do not change password</b-radio>
                                    </div>
                                    <div class="field">
                                        <b-radio v-model="password_options" name="password_options" native-value="auto" value="auto">Auto-Genarate new password</b-radio>
                                    </div>
                                    <div class="field">
                                        <b-radio v-model="password_options" name="password_options" native-value="manual" value="manual" class="m-b-5">Manually give new password</b-radio>
                                    </div>
                                </div>

                            </div>

                            <div class="column">
                                @foreach($roles as $role)
                                    <div class="field">
                                        <b-checkbox v-model="rolesSelected" native-value="{{$role->id}}">{{$role->display_name}}</b-checkbox>
                                    </div>
                                @endforeach
                            </div>
                            <input type="hidden" name="roles" :value="rolesSelected">
                        </div>


                        <div class="columns is-mobile">
                            <div class="column m-t-5">
                                <button type="submit" class="button is-info">Save Changes</button>
                                <a href=" {{route('users.index')}} " class="button is-outlined">Cancle</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div> {{--  Close Card  --}}
        </div>
    </div>
    
@endsection


@section('scripts')
    <script>
        var app = new Vue({
            el: '#manage',
            data: {
                password_options: 'keep',
                rolesSelected: {!! $user->roles->pluck('id') !!}
            }
        });
    </script>
@endsection