@extends('layouts.manage')

@section('content')

    <div class="column">
        <div class="flex-container">
            <div class="card">
                <div class="card-content">
                    <div class="content">
                        <div class="columns">
                            <div class="column">
                                <h3>User Detials</h3>
                            </div>
                        </div>

                            <div class="field">
                                Username: {{ $user->name }} <br>
                                Email: {{ $user->email }}
                            </div>   
                            
                            <div class="field">
                            <span class="tag is-6">User Roles</span>
                            </div>
                            
                            <div class="content">
                                <ul>
                                    {{ $user->roles->count() == 0 ? 'This user has not been assigned any role yet.' : '' }}
                                    @foreach($user->roles as $role)
                                       <li> {{ $role->display_name }} - <em> ({{$role->description}}) </em></li> 
                                    @endforeach
                                </ul>
                            </div>
                            
                            <a class="button is-primary is-outlined" href="{{route('users.edit', $user->id)}}">Edit User</a>
                            <a class="button is-info" href="{{route('users.index')}}">Cancle</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection