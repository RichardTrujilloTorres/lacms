<template>
    <div>
        <common_sidebar></common_sidebar>

        <div class="main-panel">
            <common_navbar :notifications-url="notificationsUrl"></common_navbar>
            <router-view></router-view>
            <common_footer></common_footer>
        </div>

    </div>
</template>

<script>
    export default {
        props: {
            notificationsUrl: {
                type: String,
                required: true,
            },
        },
        mounted() {
        }
    }
</script>
