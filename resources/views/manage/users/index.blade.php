@extends('layouts.manage')

@section('content')
<div class="columns">
    <div class="column">
        <span class="subtitle m-r-10">All Users</span>
        <span><a class="button is-small" href=" {{route('users.create')}} ">Add New</a></span>
    </div>
</div>
<div class="columns">
    <div class="column">
        <table class="table is-bordered is-striped is-narrow is-fullwidth">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date Created</th>
                    <th>Actions</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td> {{$user->id}} </td>
                    <td> {{$user->name}} </td>
                    <td> {{$user->email}} </td>
                    <td> {{$user->created_at->format('d/m/Y')}} </td>
                    <td> 
                        <a class="button is-small is-outlined" href="{{route('users.show', $user->id)}}">View</a>
                        <a class="button is-small is-outlined" href="{{route('users.edit', $user->id)}}">Edit</a> 
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
{{$users->links()}}
@endsection