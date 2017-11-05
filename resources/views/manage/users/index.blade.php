@extends('layouts.manage')

@section('content')

    <div class="column">
        <div class="flex-container">
            <div class="card">
                <div class="card-content">
                        <div class="columns">
                            <div class="column">
                                <h3 class="title is-6 tag">All Users</h3>
                            </div>
                            <div class="column is-2">
                                <a class="button is-primary is-pulled-right" href=" {{route('users.create')}} ">Add User</a>
                            </div>
                        </div>        
                            
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
                        {{$users->links()}}
                </div>
            </div> {{--  Close Card  --}}
        </div>
    </div>
    
@endsection