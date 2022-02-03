<template>
    <div class="container-fluid w-75">
        <div class="row g-3">
            <div  v-for="post in posts" :key="post.id" class="col-4">
                <div class="card">
                    <router-link :to="'/posts/' + post.id"><img class="w-100 card-img-top" :src=" '/storage/' + post.image" :alt="post.title"></router-link>
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
    props: {
        posts: Array
    }
};
</script>
