<template>
    <div class="card">
        <div class="card-header card-header-icon card-header-rose">
            <h4 class="card-title">
                {{ notification.title }}
            </h4>
        </div>

        <div class="card-body">
            {{ notification.body }}

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form @submit.prevent="onMarkAsRead">
                                <div class="form-group">
                                </div>

                                <button v-show="!Boolean(notification.viewed)" type="submit" class="btn btn-primary">Mark as read</button>
                                <h5 v-show="Boolean(notification.viewed)">Notification read.</h5>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {emitter} from "../../app";

export default {
    props: {
        notification: {
            type: Object,
            required: true,
        },
    },
    data: () => ({
    }),
    methods: {
        onMarkAsRead() {
            emitter.emit('notification.mark-as-read')
        },
    },
    computed: {
    },
    mounted() {
    },
}
</script>
