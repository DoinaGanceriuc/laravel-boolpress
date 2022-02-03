<template>

<div class="">
    <img class="w-100" :src=" '/storage/' + post.image" :alt="post.title">
        <div class="card-body">
            <h5 class="card-title">{{post.title}} </h5>
         </div>
</div>



</template>

<script>
export default {
    props: {
        post: Object
    },
    mounted() {
       // console.log("Component mounted.");
    },
};
</script>
