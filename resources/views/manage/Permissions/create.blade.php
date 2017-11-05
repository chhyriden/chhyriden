@extends('layouts.manage')

@section('content')   
<h1 class="title is-6 tag">Create New Permission<h1>
    <form method="POST" action="{{ route('permissions.store') }}" role="form">
        {{csrf_field()}}
        <div class="field">
            <b-radio name="permission_type" value="basic" v-model="permissionType" native-value="basic">Basic Permission</b-radio>
            <b-radio name="permission_type" value="crud" v-model="permissionType" native-value="crud">CRUD Permission</b-radio>
        </div>
        <div class="field" v-if="permissionType == 'basic'">
            <p class="control has-icons-left">
                <input required name='display_name' class="input {{ $errors->has('display_name') ? ' is-danger' : '' }}" type="" placeholder="Permission Name" value="{{old('display_name')}}">
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

        <div class="field" v-if="permissionType == 'basic'">
            <p class="control has-icons-left">
                <input required name='name' class="input {{ $errors->has('name') ? ' is-danger' : '' }}" type="text" placeholder="Slug" value="{{old('name')}}">
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

        <div class="field" v-if="permissionType == 'basic'">
            <p class="control has-icons-left">
                <input required name='description' class="input {{ $errors->has('description') ? ' is-danger' : '' }}" type="text" placeholder="Description" value="{{old('description')}}">
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

        <div class="field" v-if="permissionType == 'crud'">
            <p class="control has-icons-left" v-cloak>
                <input required name='resource' v-model="resource" class="input {{ $errors->has('resource') ? ' is-danger' : '' }}" type="text" placeholder="Permission Name" value="{{old('resource')}}">
                <span class="icon is-small">
                    @if($errors->has('resource'))
                    <i class="fa fa-warning" style="color:#ff3860"></i>
                    @else
                    <i class="fa fa-file-text-o"></i>
                    @endif
                </span>
                <p class="help is-danger">{{$errors->first('resource')}}</p>
            </p>
            <div class="columns m-t-5">
                <div class="column is-2" v-cloak>
                    <div class="field">
                        <b-checkbox v-model="crudCheckBox" native-value="create">Create</b-checkbox>
                    </div>
                    <div class="field">
                        <b-checkbox v-model="crudCheckBox" native-value="read">Read</b-checkbox>
                    </div>
                    <div class="field">
                        <b-checkbox v-model="crudCheckBox" native-value="update">Update</b-checkbox>
                    </div>
                    <div class="field">
                        <b-checkbox v-model="crudCheckBox" native-value="delete">Delete</b-checkbox>
                    </div>

                    <input type="hidden" name="crud_selected" :value="crudCheckBox">
                </div>

                <div class="column" v-cloak>
                    <table class="table is-bordered is-striped is-narrow is-fullwidth">
                        <thead>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                        </thead>
                        <tbody v-if="resource.length > 3 && resource.length < 15">
                            <tr v-for="item in crudCheckBox">
                                <td v-text="crudName(item)"></td>
                                <td v-text="crudSlug(item)"></td>
                                <td v-text="crudDescription(item)"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="columns is-mobile">
            <div class="column m-t-5">
                <button type="submit" class="button is-info">Create</button>
                <a href=" {{route('permissions.index')}} " class="button is-outlined">Cancle</a>
            </div>
        </div>
    </form>

    @endsection


    @section('scripts')
    <script>
        var app = new Vue({
            el: '#manage',
            data: {
                permissionType: 'basic',
                resource: '',
                crudCheckBox: ['create', 'read', 'update', 'delete'],
            },
            methods: {
                crudName: function (item) {
                    return item.substr(0, 1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0, 1).toUpperCase() + app.resource.substr(1);
                },
                crudSlug: function (item) {
                    return item.toLowerCase() + "-" + app.resource.toLowerCase();
                },
                crudDescription: function (item) {
                    return "Allow User to " + item.toUpperCase() + " " + app.resource.substr(0, 1).toUpperCase() + app.resource.substr(1);
                }
            }
        })
    </script>
    @endsection