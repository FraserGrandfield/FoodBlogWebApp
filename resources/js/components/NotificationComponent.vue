<template>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Notification dropdown" style="font-size: 15px">
            Notifications <span>{{ notifications.length }}</span>
        </a>
        <ul class="dropdown-menu notification-dropdown" aria-labelledby="navbarDropdown" style="text-align: center; width: 300px; padding: 0">
            <li v-for="(notification, index) in notifications" :key="index">
                <div v-if="index != 0">
                    <hr class="solid" style="margin: 0">
                </div>
                <a href="#" @click="MarkAsRead(notification)" class="notification-text" aria-label="New comment">
                    New comment on post {{ notification.data.post.title }}
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
            //Getting the users notifications when the component is mounted.
            axios.post('/notification/get')
            .then(response => {
                this.notifications = response.data;
                console.log(this.notifications);
            });
            
            var userId = $('meta[name="userId"]').attr('content');
            Echo.private('App.Models.User.' + userId).notification((notification) => {
                this.notifications.push(notification);
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