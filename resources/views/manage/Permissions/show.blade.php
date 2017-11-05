@extends('layouts.manage')

@section('content')

    <div class="column">
        <div class="flex-container">
            <div class="card">
                <div class="card-content">
                        <div class="columns">
                            <div class="column">
                                <h3 class="title is-6 tag">All Permissions</h3>
                            </div>
                        </div>
                        <div class="field">
                            Permission Name: {{ $permission->display_name }} <br>
                            Slug: {{ $permission->name }} <br>
                            Description: {{ $permission->description }} <br> <br>

                            <a class="button is-primary" href=" {{route('permissions.edit', $permission->id)}} ">Edit</a>
                            <a class="button" href=" {{route('permissions.index')}} ">Cancle</a>

                        </div>
                </div>
            </div> {{--  Close Card  --}}
        </div>
    </div>
    
@endsection