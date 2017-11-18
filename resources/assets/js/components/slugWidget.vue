<style scoped>
    .slug-container {
        margin-left: 5px;
        font-size: 14px;
    }
    .edit{
        margin-left: 5px;
        color: grey;
    }
</style>

<template>
    <div class="slug-container">
        <i class="fa fa-link"></i>
        <span>{{url}}/</span
        ><span>{{subdirectory}}/</span
        ><em><span class="slug-url">{{slug}}</span></em>
        <button href="#" class="button is-small edit" @click.prevent>Edit</button>
    </div>
</template>

<script>
    export default {
        props: {
            url: {
                type: String,
                required: true,
            },
            subdirectory: {
                type: String,
                required: true,
            },
            title: {
                type: String,
                required: true,
            }
        },
        data: function () {
           return {
               slug: this.convertTitle()
           }
        },
        methods: {
            convertTitle() {
                return slug(this.title);
            }
        },
        watch: {
            title: _.debounce(function() {
                this.slug = this.convertTitle();
            }, 500),
            slug: function(val) {
                this.$emit('slug-changed', val);
            }
        }
    }
</script>