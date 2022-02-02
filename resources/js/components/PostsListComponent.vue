<template>
    <div class="container-fluid w-75">
        <div class="row g-3">
            <div  v-for="post in posts" :key="post.id" class="col-4">
                <div class="card">
                    <img class="w-100 card-img-top" :src=" '/storage/' + post.image" :alt="post.title">
                        <div class="card-body">
                            <h5 class="card-title">{{post.title}} </h5>
                        </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
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
