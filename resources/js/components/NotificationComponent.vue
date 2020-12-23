<template>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Notifications <span>{{ notifications.length }}</span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li v-for="notification in notifications">
                <a href="#" @click="MarkAsRead(notification)">
                    {{ notification.data.post.id }}
                    </a>
            </li>
            <li v-if="notifications.length == 0">
                No Notifications!
            </li>
        </ul>
    </li>
</template>

<script>
    export default {
        data: function() {
            return {
                notifications: '',
            }
        },
        mounted() {
            axios.post('/notification/get')
            .then(response => {
                this.notifications = response.data;
                console.log(this.notifications);
            });
        },
        methods: {
            MarkAsRead: function(notification) {
                var data = {
                    id: notification.id
                };
                axios.post('/notification/read', data)
                .then(response => {
                    window.location.href = "/posts/" + notification.data.post.id
                });
            }
        },
    }
</script>