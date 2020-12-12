<template>
    <div class="card col-mb-12 single-post bg-3" style="max-width: 1000px">
        <div class="card-body">
            <h1 class="card-title post-text">{{ comment.comment }}</h1>
            <h2 class="card-text post-text">{{ comment.comment }}</h2>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['comment'],
        mounted() {

        }
    };
</script>