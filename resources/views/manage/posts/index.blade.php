@extends('layouts.manage')

@section('content')
<div class="columns">
    <div class="column">
        <span class="subtitle m-r-10">All Posts</span>
        <span><a class="button is-small" href=" {{route('posts.create')}} ">Add New</a></span>
    </div>
</div>
<div class="columns">
    <div class="column">
        
    </div>
</div>
@endsection