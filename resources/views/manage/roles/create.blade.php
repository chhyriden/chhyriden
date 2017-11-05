@extends('layouts.manage')

@section('content')

    <div class="column">
        <div class="flex-container">
            <div class="card">
                <div class="card-content">
                    <div class="columns">
                        <div class="column">
                            <h3 class="title is-6 tag">Create New Role</h3>
                        </div>
                    </div>

                    <form action="{{route('roles.store')}}" method="POST" role="form">
                        {{csrf_field()}}

                        <div class="field">
                            <p class="control has-icons-left">
                                <input required name='display_name' class="input {{ $errors->has('name') ? ' is-danger' : '' }}" type="" placeholder="Name" value="{{old('name')}}">
                                <span class="icon is-small">
                                @if($errors->has('display_name'))
                                    <i class="fa fa-warning" style="color:#ff3860"></i>
                                @else
                                <i class="fa fa-file-text-o"></i>
                                @endif
                                </span>
                                <p class="help is-danger">{{$errors->first('display_name')}}</p>
                            </p>
                        </div>

                        <div class="field">
                            <p class="control has-icons-left">
                                <input required name='name' class="input {{ $errors->has('name') ? ' is-danger' : '' }}" type="" placeholder="Slug" value="{{old('name')}}">
                                <span class="icon is-small">
                                @if($errors->has('name'))
                                    <i class="fa fa-warning" style="color:#ff3860"></i>
                                @else
                                <i class="fa fa-link"></i>
                                @endif
                                </span>
                                <p class="help is-danger">{{$errors->first('name')}}</p>
                            </p>
                        </div>

                        <div class="field">
                            <p class="control has-icons-left">
                                <input required name='description' class="input {{ $errors->has('description') ? ' is-danger' : '' }}" type="" placeholder="Description" value="{{old('description')}}">
                                <span class="icon is-small">
                                @if($errors->has('description'))
                                    <i class="fa fa-warning" style="color:#ff3860"></i>
                                @else
                                <i class="fa fa-pencil"></i>
                                @endif
                                </span>
                                <p class="help is-danger">{{$errors->first('description')}}</p>
                            </p>
                        </div>

                        <input type="hidden" name="permissionsSelected" :value="rolePermissions">

                        <div class="field">
                            <h3 class="tag title is-6">Permissions</h3>
                        </div>

                        <div class="field">
                                @foreach($permissions as $permission)
                                    <div class="field">
                                        <b-checkbox v-model="rolePermissions" native-value="{{$permission->id}}">{{$permission->display_name}} - ({{$permission->description}})</b-checkbox>
                                    </div>
                                @endforeach
                        </div>

                        <div class="field">
                            <button type="submit" class="button is-primary">Save Changes</button>
                            <a class="button" href=" {{route('roles.index')}} ">Cancle</a>
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
                rolePermissions: [],
            },
        });
    </script>
    
@endsection