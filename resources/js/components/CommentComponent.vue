<template>
    <div>
        <div v-if="loggedin">
            <div class="card col-lg-12 single-post bg-3">
                <div class="card-body">
                    <div class="form-group">
                        <label for="comment" class="form-text">Comment</label>
                        <input type="text" class="form-control input" id="comment" placeholder="comment" v-model="newComment">
                        <div v-if="!!error" class="error-div">{{ error.comment[0] }}</div>
                    </div>
                    <button @click="createComment" class="button">Add Comment</button>
                </div>
            </div>
        </div>
        <div class="card col-lg-12 single-post bg-3">
            <div class="card-body">
                <h1 class="card-title post-text">Comments</h1>
                <div v-for="(comment, index) in comments" :key="index">
                    <hr class="solid">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="row d-flex align-items-center">
                                <img v-bind:src="comment.image" class="comment-profile-image" style="margin-right: 4px" alt="Profile picture">
                                <h1 class="post-text">{{ comment.name }}</h1>
                            </div>
                            <div class="row">
                                <div class="col">
                                <h2 class="card-text comment-text">{{ comment.comment }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div v-if="loggedin && comment.profile_id == profileid">
                                <div class="d-flex flex-row-reverse">
                                    <form method="GET" v-bind:action="commenturl + comment.id">
                                        <button class="button">Edit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> 
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
                commenturl: '/comments/',
                error: '',
            }
        },
        props: ['id', 'profileid', 'loggedin'],
        mounted() {
            //Getting all of the comments when the component is mounted
            axios.get('/api/comments/' + this.id)
            .then(response => {
                this.comments = response.data;
            })
            .catch(response => {
                console.log(response);
            })
        },
        methods: {
            //Method to create a comment and add it to the database.
            createComment: function() {
                axios.post('/api/comments/', {comment: this.newComment, id: this.id, profileId: this.profileid})
                .then(response => {
                    this.comments.push(response.data);
                    this.newComment = '';
                    this.error = '';
                    
                })
                .catch(error => {
                    this.error = error.response.data.errors;
                })
            }
        },
    };
</script>