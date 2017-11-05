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
                            <div class="column is-2">
                                <a class="button is-primary is-pulled-right" href=" {{route('permissions.create')}} ">Add Permission</a>
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
                </div>
            </div> {{--  Close Card  --}}
        </div>
    </div>
    
@endsection