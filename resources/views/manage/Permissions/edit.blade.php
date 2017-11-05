@extends('layouts.manage')

@section('content')

    <div class="column">
        <div class="flex-container">
            <div class="card">
                <div class="card-content">
                    <div class="columns">
                        <div class="column">
                            <h3 class="title is-6 tag">Edit Permission</h3>
                        </div>
                    </div>

                    <form action="{{route('permissions.update', $permission->id)}}" method="POST" role="form">
                        {{method_field('PUT')}}
                        {{csrf_field()}}

                        <div class="field">
                            <p class="control has-icons-left">
                                <input required value="{{$permission->display_name}}" name='display_name' class="input {{ $errors->has('name') ? ' is-danger' : '' }}" type="" placeholder="Permission Name" value="{{old('name')}}">
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
                                <input disabled required value="{{$permission->name}}" name='name' class="input {{ $errors->has('name') ? ' is-danger' : '' }}" type="" placeholder="Full Name" value="{{old('name')}}">
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
                                <input required value="{{$permission->description}}" name='description' class="input {{ $errors->has('description') ? ' is-danger' : '' }}" placeholder="Description" value="{{old('description')}}">
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

                        <button type="submit" class="button is-primary">Save Changes</button>
                        <a class="button" href=" {{route('permissions.index')}} ">Cancle</a>
                    </form>
                        
                </div>
            </div> {{--  Close Card  --}}
        </div>
    </div>
    
@endsection