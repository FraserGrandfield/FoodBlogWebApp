<template>
    <div class="card col-mb-12 single-post bg-3" style="max-width: 1000px">
        <div class="card-body">
            <div v-for="comment in comments">
                <h1 class="card-title post-text">{{ comment.name }}</h1>
                <h2 class="card-text post-text">{{ comment.comment }}</h2>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                comments: [],
            }
        },
        props: ['id'],
        mounted() {
            axios.get('/api/comments/' + this.id).then(response => {
                this.comments = response.data;
            })
            .catch(response => {
                console.log(response);
            })
        },
    };
</script>