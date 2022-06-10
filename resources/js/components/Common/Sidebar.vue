<template>
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="/assets/img/lighthouse-1.jpg">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo">
            <a class="simple-text logo-normal" href="">
                 {{ appName }}
            </a>
        </div>
        <div class="sidebar-wrapper">

<!--            <div class="user">-->
<!--                <div class="photo">-->
<!--                    <img src="/assets/img/faces/avatar.jpg" />-->
<!--                </div>-->
<!--                <div class="user-info">-->
<!--                    <a data-toggle="collapse" href="#collapseExample" class="username">-->
<!--              <span>-->
<!--                Tania Andrew-->
<!--                <b class="caret"></b>-->
<!--              </span>-->
<!--                    </a>-->
<!--                    <div class="collapse" id="collapseExample">-->
<!--                        <ul class="nav">-->
<!--                            <li class="nav-item">-->
<!--                                <a class="nav-link" href="#">-->
<!--                                    <span class="sidebar-mini"> MP </span>-->
<!--                                    <span class="sidebar-normal"> My Profile </span>-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li class="nav-item">-->
<!--                                <a class="nav-link" href="#">-->
<!--                                    <span class="sidebar-mini"> EP </span>-->
<!--                                    <span class="sidebar-normal"> Edit Profile </span>-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li class="nav-item">-->
<!--                                <a class="nav-link" href="#">-->
<!--                                    <span class="sidebar-mini"> S </span>-->
<!--                                    <span class="sidebar-normal"> Settings </span>-->
<!--                                </a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

            <ul class="nav">
                <li class="nav-item active ">
                    <router-link class="nav-link" to="/">
                        <i class="material-icons">dashboard</i>
                        <p> Dashboard </p>
                    </router-link>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
                        <i class="material-icons">person</i>
                        <p> Users
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="pagesExamples">
                        <ul class="nav">
                            <li class="nav-item ">
                                <router-link class="nav-link" to="/users/list">
                                    <i class="material-icons">list</i>
                                    <p> List </p>
                                </router-link>
                            </li>
<!--                            <li class="nav-item ">-->
<!--                                <a class="nav-link" href="../examples/pages/user.html">-->
<!--                                    <span class="sidebar-mini"> UP </span>-->
<!--                                    <span class="sidebar-normal"> User Profile </span>-->
<!--                                </a>-->
<!--                            </li>-->
                        </ul>
                    </div>
                </li>


                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#settings">
                        <i class="material-icons">settings</i>
                        <p> Settings
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="settings">
                        <ul class="nav">
                            <li class="nav-item ">
                                <router-link to="/settings/sync" class="nav-link">
                                    <i class="material-icons">sync</i>
                                    <p> Sync </p>
                                </router-link>
                            </li>
                            <li class="nav-item ">
                                <router-link to="/settings/do-not-disturb" class="nav-link">
                                    <i class="material-icons">do_not_disturb</i>
                                    <p> Do Not Disturb</p>
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
        <div class="sidebar-background"></div>
    </div>
</template>

<script>
export default {
    props: {
    },
    computed: {
        appName() {
            return window.appName
        }
    },
    mounted() {
    },
}
</script>
