<template>
    <div>
        <common_sidebar></common_sidebar>

        <div class="main-panel">
            <common_navbar></common_navbar>
            <router-view></router-view>
            <common_footer></common_footer>
        </div>

    </div>
</template>

<script>
import VueRouter from "vue-router";
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
