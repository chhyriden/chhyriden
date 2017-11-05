@extends('layouts.manage')

@section('content')

    <div class="column">
        <div class="flex-container">
            <div class="card">
                <div class="card-content">
                        <div class="columns">
                            <div class="column">
                                <h3 class="title is-6 tag">All Roles</h3>
                            </div>
                            <div class="column is-2">
                                <a class="button is-primary is-pulled-right" href=" {{route('roles.create')}} ">Add Roles</a>
                            </div>
                        </div>
                            
                            <div class="columns is-multiline">

                                @foreach($roles as $role)
                                    <div class="column is-one-quarter">
                                        <div class="box">
                                            <article class="media">
                                                <div class="media-content">
                                                    <div class="content">
                                                        <h3 class="title"> {{$role->display_name}} </h3>
                                                        <h4 class="subtitle"><em> {{$role->name}}</em></h4>
                                                        <p class="m-b-5">
                                                            {{$role->description}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </article>

                                            <div class="columns is-mobile">
                                                <div class="column is-one-half">
                                                    <a href=" {{route('roles.show', $role->id)}}" class="button is-primary is-fullwidth">Details</a>
                                                </div>
                                                <div class="column is-one-half">
                                                    <a href=" {{route('roles.edit', $role->id)}}" class="button is-light is-fullwidth">Edit</a>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            
                        </div>

                </div>
            </div> {{--  Close Card  --}}
        </div>
    </div>
    
@endsection