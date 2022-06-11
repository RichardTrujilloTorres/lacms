<template>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-icon card-header-rose">
                            <div class="card-icon">
                                <i class="material-icons">perm_identity</i>
                            </div>
                            <h4 class="card-title">Edit Profile
                            </h4>
                        </div>
                        <div class="card-body" v-if="user">
                            <form @submit.prevent="onShowConfirmation">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Name</label>
                                            <input v-model="user.name" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email</label>
                                            <input disabled v-model="user.email" type="email" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label v-show="isEmailVerified" class="bmd-label-floating">Email verified at: {{ user.formattedEmailVerifiedAt }}</label>
                                            <label v-show="!isEmailVerified" class="bmd-label-floating">Email not verified yet.</label>
                                        </div>
                                    </div>
                                </div>
<!--                                <div class="row">-->
<!--                                    <div class="col-md-12">-->
<!--                                        <div class="form-group">-->
<!--                                            <label>About Me</label>-->
<!--                                            <div class="form-group">-->
<!--                                                <label class="bmd-label-floating"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</label>-->
<!--                                                <textarea class="form-control" rows="5"></textarea>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
                                <button type="submit" class="btn btn-rose pull-right">Update Profile</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
<!--                <div class="col-md-4">-->
<!--                    <div class="card card-profile">-->
<!--                        <div class="card-avatar">-->
<!--                            <a href="#pablo">-->
<!--                                <img class="img" src="/assets/img/faces/marc.jpg" />-->
<!--                            </a>-->
<!--                        </div>-->
<!--                        <div class="card-body">-->
<!--                            <h6 class="card-category text-gray">CEO / Co-Founder</h6>-->
<!--                            <h4 class="card-title">Alec Thompson</h4>-->
<!--                            <p class="card-description">-->
<!--                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...-->
<!--                            </p>-->
<!--                            <a href="#pablo" class="btn btn-rose btn-round">Follow</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </div>

</template>

<script>
export default {
    props: {
        usersUrl: {
            type: String,
            required: true,
        },
    },
    data: () => ({
        user: null,
    }),
    computed: {
        isEmailVerified() {
            return Boolean(this.user.email_verified_at)
        },
    },
    methods: {
        getUser(id) {
            window.axios.get(`${this.usersUrl}/${id}`)
            .then(res => {
                this.user = res.data.data.user
            })
            .catch(err => {
                console.log(err)
            })
        },
        onShowConfirmation() {
            this.$toasted.show(`Are you sure you want to update this user details?`, {
                icon: 'warning',
                action: [
                    {
                        text: 'Yes',
                        onClick: (e, toastObject) => {
                            toastObject.goAway(0)
                            this.onUpdate()
                        },
                    },
                    {
                        text: 'No',
                        onClick: (e, toastObject) => {
                            toastObject.goAway(0)
                        },
                    },
                ],
            })
        },
        onUpdate() {
            window.axios.put(`${this.usersUrl}/${this.$route.params.id}`, {
                name: this.user.name,
            })
                .then(res => {
                    this.$toasted.success(`User updated!`, {duration: 3000})
                    this.getUser(this.$route.params.id)
                })
                .catch(err => {
                    console.log(err)
                    this.$toasted.error(`Could not update the specified user.`, {duration: 3000})
                })
        },
    },
    mounted() {
        this.getUser(this.$route.params.id)
    },
}
</script>
