<template>
    <div class="content">
        <div class="container-fluid" v-if="notification">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header card-header-icon card-header-rose">
                            <div class="card-icon">
                                <i class="material-icons">notifications</i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Notifications</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <notification_card :notification="notification"></notification_card>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import {emitter} from "../../app";

export default {
    props: {
        notificationsUrl: {
            type: String,
            required: true,
        },
    },
    data: () => ({
        notification: null,
    }),
    methods: {
        getNotification() {
            window.axios.get(`${this.notificationsUrl}/${this.$route.params.id}`)
                .then(res => {
                    this.notification = res.data.notification
                })
                .catch(err => {
                    this.$toasted.error(`Could not load notification.`, {duration: 3000})
                    console.log(err)
                })
        },
        onMarkAsRead() {
            window.axios.put(`${this.notificationsUrl}/${this.$route.params.id}`)
                .then(res => {
                    this.$toasted.success(`Marked notification as read.`, {duration: 3000})
                    this.notification = res.data.data.notification
                })
                .catch(err => {
                    this.$toasted.error(`An unexpected error occurred.`, {duration: 3000})
                    console.log(err)
                })
        },
    },
    computed: {
    },
    mounted() {
        emitter.on('notification.mark-as-read', this.onMarkAsRead)

        this.getNotification()
    },
    watch: {
        '$route.params.id': {
            handler: function (value) {
                this.getNotification()
            },
            immediate: true,
        },
    },
}
</script>
