<template>

<div class="container-fluid">
    <h1 class="text-center">Blog</h1>
    <div class="loading text-center" v-if="loading">
            <p class="lead">
                Caricamento in corso...
            </p>
        </div>
    <posts-list-component :posts="posts"></posts-list-component>
    <div class="pages text-center pt-5" v-if="!loading">
        <span class="btn">Precedente</span>
        <span class="btn btn-primary text-white">{{meta.current_page}}</span>
        <span class="btn">Successivo</span>
    </div>
</div>



</template>

<script>

    export default {

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<script>
import PostsListComponent from "../components/PostsListComponent.vue"
    export default {
        components: {PostsListComponent},
        data() {
            return {
                posts: null,
                links: null,
                meta: null,
                loading: true
            }

        },
        mounted() {
            axios.get('api/posts').then(response => {
                console.log(response);
                this.posts = response.data.data;
                this.links = response.data.links;
                this.meta = response.data.meta;
                this.loading = false;
            })
            console.log('Component mounted.')
        }
    }
</script>

