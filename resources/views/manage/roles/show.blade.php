@extends('layouts.manage')

@section('content')

    <div class="column">
        <div class="flex-container">
            <div class="card">
                <div class="card-content">
                        <div class="columns">
                            <div class="column">
                                <h3 class="title is-6 tag">Role</h3>
                            </div>
                        </div>

                        <div class="field">
                            Name: {{$role->display_name}} <br>
                            Slug: {{$role->name}} <br>
                            Description: {{$role->description}} <br><br>
                        </div>

                            <div class="field">
                                @if(count($role->permissions) > 0)
                                
                                    <div class="field">
                                        <h3 class="title is-6 tag">Allowed Permissions </h3>
                                    </div>
                                    <div class="field content">
                                        <ul>
                                            @foreach($role->permissions as $rp)
                                                <li> {{$rp->display_name}} - <em>({{$rp->description}})</em> </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @else
                                    <span class="tag is-warning">You don't have any permission yet. For more detials, please contact your administrator.</span>
                                @endif
                            
                            </div>

                        <div class="field m-t-25">
                            <a class="button is-primary" href=" {{route('roles.edit', $role->id)}} ">Edit Role</a>
                            <a class="button" href=" {{route('roles.index')}} ">Cancle</a>
                        </div>

                </div>
            </div> {{--  Close Card  --}}
        </div>
    </div>
    
@endsection