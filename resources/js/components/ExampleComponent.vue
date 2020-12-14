<template>
    <div>
        <div class="card col-mb-12 single-post bg-3" style="max-width: 1000px">
            <div class="card-body">
                <div class="form-group">
                    <label for="comment" class="form-text">Comment</label>
                    <input type="text" class="form-control" id="comment" placeholder="comment" v-model="newComment">
                </div>
                <button @click="createComment" class="button">Add Comment</button>
            </div>
        </div>

        <div class="card col-mb-12 single-post bg-3" style="max-width: 1000px">
            <div class="card-body">
                <div v-for="comment in comments">
                    <h1 class="card-title post-text">{{ comment.name }}</h1>
                    <h2 class="card-text post-text">{{ comment.comment }}</h2>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                comments: [],
                newComment: '',
            }
        },
        props: ['id', 'profileid'],
        mounted() {
            axios.get('/api/comments/' + this.id)
            .then(response => {
                this.comments = response.data;
            })
            .catch(response => {
                console.log(response);
            })
        },
        methods: {
            createComment() {
                axios.post('/api/comments/', {comment: this.newComment, id: this.id, profileId: this.profileid})
                .then(response => {
                    this.comments.push(response.data);
                    this.newCooment = '';
                })
                .catch(response => {
                    console.log(response);
                })
            }
        }
    };
</script>