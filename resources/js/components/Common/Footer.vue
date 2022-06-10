<template>
    <footer class="footer">
        <div class="container-fluid">
            <nav class="float-left">
                <ul>
                    <li>
                        <router-link to="/">
                            {{ appName }}
                        </router-link>
                    </li>
                    <li>
                        <a href="">
                            About
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Licenses
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright float-right">
                &copy;
<!--                <script>-->
<!--                    document.write(new Date().getFullYear())-->
<!--                </script>, made with <i class="material-icons">favorite</i> by-->
                {{ currentYear }}
<!--                <a href="" target="_blank"></a> for a better web.-->
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    props: {
    },
    computed: {
        appName() {
            return window.appName
        },
        currentYear() {
            return new Date().getFullYear()
        },
    },
    mounted() {
    }
}
</script>
