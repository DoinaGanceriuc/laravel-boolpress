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
        <span class="btn" v-on:click="prev()" v-if="meta.current_page > 1">Precedente</span>
        <span class="btn mx-1" v-for="numberPage in meta.last_page" :key="numberPage" :class="meta.current_page === numberPage ? 'btn-primary text-white' : 'btn-outline-dark'">{{numberPage}}</span>
        <span class="btn" v-on:click="next()" v-if="meta.current_page != meta.last_page">Successivo</span>
    </div>
</div>



</template>

<script>
import PostsListComponent from "../components/PostsListComponent.vue"
    export default {
        components: {PostsListComponent},
        data() {
            return {
                posts: null,
                links: null,
                meta: null,
                loading: true,
                apiUrl: 'api/posts'
            }

        },
        methods: {
            getAllPosts(url) {
                axios.get(url).then(response => {
                console.log(response);
                this.posts = response.data.data;
                this.links = response.data.links;
                this.meta = response.data.meta;
                this.loading = false;
            })
            },
            prev() {
                //console.log('cliccato su precedente');
                this.getAllPosts(this.links.prev)

            },
            next() {
                //console.log('cliccato su successivo');
                this.getAllPosts(this.links.next)
            }

        },
        mounted() {
            this.getAllPosts(this.apiUrl);
            console.log('Component mounted.')
        }
    }
</script>

