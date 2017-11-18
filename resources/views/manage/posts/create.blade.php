@extends('layouts.manage')

@section('content')
<form action=" {{route('posts.store')}} " method="post" accept-charset="utf-8">
    {{ csrf_field() }}
    <div class="columns">
        <div class="column">
            <div class="columns">
                <div class="column">
                    <span class="subtitle m-r-10">Add New Post</span>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    
                    <div class="field">
                        <div class="control">
                            <input name="post_title" class="input" type="text" placeholder="Enter title here" v-model="title">
                        </div>
                    </div>

                    <div class="field">
                      <div class="control">
                        <slug-widget url="{{url('/')}}" subdirectory="blog" :title=title @slug-changed="updateSlug"></slug-widget>
                      </div>
                    </div>

                    <div class="field">
                      <div class="control">
                        <textarea rows="17" class="textarea" placeholder="Write your content here..."></textarea>
                      </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="column is-3">
            <div class="card">
              <header class="card-header">
                <p class="card-header-title">
                  Publish
              </p>
              <a href="#" class="card-header-icon" aria-label="more options">
                  <span class="icon">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                </span>
            </a>
        </header>
        <div class="card-content">
            <div class="content">
                <span><i class="fa fa-user" aria-hidden="true"></i> &nbsp;</span>
                <span>Author: <b>{{Auth::user()->name}}</b></span><br>
                <span><i class="fa fa-calendar-o" aria-hidden="true"></i> &nbsp;</span>
                <span>Draft: <b>Saved</b></span>
                <br>
                <time class="subtitle is-7" datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
            </div>
      </div>
    <footer class="card-footer post-publish-btn">
        <button type="" class="button is-info">Publish</button>
        <button type="" class="button m-l-10">Save Draft</button>
    </footer>
</div>
</div>
</div>
</form>
@endsection

@section('scripts')
<script>
    new Vue({
        el: "#manage",
        data: {
            title: '',
            slug: ''
        },
        methods: {
            updateSlug(val) {
                this.slug = val;
            }
        }
    });

</script>    
@endsection