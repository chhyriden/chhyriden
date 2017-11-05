@extends('layouts.manage')

@section('content')

<div class="columns">
    <div class="column">
        <span class="subtitle m-r-10">All Roles</span>
        <span><a class="button is-small" href=" {{route('roles.create')}} ">Add New</a></span>
    </div>
</div>

<div class="columns is-multiline">

    @foreach($roles as $role)
    <div class="column is-one-quarter">
        <div class="box">
            <article class="media">
                <div class="media-content">
                    <div class="content">
                        <h3 class="title is-5"> {{$role->display_name}} </h3>
                        <p class="subtitle is-6"><em> {{$role->name}}</em></p>
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

@endsection