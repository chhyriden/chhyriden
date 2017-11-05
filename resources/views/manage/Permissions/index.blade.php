@extends('layouts.manage')

@section('content')

<div class="columns">
    <div class="column">
        <span class="subtitle m-r-10">All Permissions</span>
        <span><a class="button is-small" href=" {{route('permissions.create')}} ">Add New</a></span>
    </div>
</div>

<table class="table is-bordered is-striped is-narrow is-fullwidth">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Description</th>
            <th>Craeted Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($permissions as $permission)
        <tr>
            <td> {{$permission->id}} </td>
            <td> {{$permission->display_name}} </td>
            <td> {{$permission->name}} </td>
            <td> {{$permission->description}} </td>
            <td> {{$permission->created_at->format('d/m/Y')}} </td>
            <td>
                <a class="button is-small is-outlined" href="{{route('permissions.show', $permission->id)}}">View</a>
                <a class="button is-small is-outlined" href="{{route('permissions.edit', $permission->id)}}">Edit</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
{{$permissions->links()}}

@endsection
