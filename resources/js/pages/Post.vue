<template>
    <div class="">
        <div class="error container text-center" v-if="error === true">
            <h2 class="error_message">
            Pagina non trovata
            </h2>
        </div>
        <div class="loading text-center" v-else-if="loading">
            <p>Caricamento in corso...</p>
        </div>
        <div class="post" v-else>
            <img class="cover_image img-fluid" :src=" '/storage/' + post.image" :alt="post.title">
            <div class="card-body">
                <h3>Titolo: {{ post.title }}</h3>
                <h5 class="card-title" v-if="post.category != null" >Categoria: {{post.category.name}} </h5>
                <h5 class="card-title" v-for="tag in post.tags" :key="tag.id">Tag: {{tag.name}} </h5>
            </div>
        </div>
    </div>
</template>

<script>

export default {

    data() {
        return {
            post: {},
            loading: true,
            error: false
        }

    },
    mounted() {
            axios.get('/api/posts/' + this.$route.params.id).then(response => {
                //console.log(response);
                this.post = response.data.data;
                this.loading = false;
            }).catch(error => {
                console.error(error);
                this.error = true
            })
            //console.log('Component mounted.')
    }
}

</script>

<style>
.cover_image {
    width: 100%;
    height: 350px;
    object-fit: cover;
}
</style>
