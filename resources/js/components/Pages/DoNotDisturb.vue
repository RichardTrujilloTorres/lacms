<template>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header card-header-icon card-header-rose">
                            <div class="card-icon">
                                <i class="material-icons">do_not_disturb</i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Settings</h4>
                            Turn on/off the do not disturb mode.
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form @submit.prevent="onSubmit" v-show="doNotDisturb.loaded">
                                <div class="form-group">
                                    <div class="togglebutton">
                                        <label>
                                            <input v-model="doNotDisturb.enabled" type="checkbox" checked="">
                                            <span class="toggle"></span>
                                            {{ enabledStatus }}
                                        </label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    props: {
        actionUrl: {
            type: String,
            required: true,
        },
    },
    data: () => ({
        doNotDisturb: {
            enabled: false,
            loaded: false,
        },
    }),
    methods: {
        onSubmit() {
            window.axios.put(`${this.actionUrl}`, {
                status: this.doNotDisturb.enabled,
            })
            .then(res => {
                console.log(res.data)
                this.$toasted.show(`Status updated.`, {duration: 3000})
            })
            .catch(err => {
                console.log(err)
            })
        },
        getStatus() {
            window.axios.get(`${this.actionUrl}`)
                .then(res => {
                    console.log(res)
                    this.doNotDisturb.enabled = res.data.data.status === 'on'
                    this.doNotDisturb.loaded = true
                })
                .catch(err => {
                    console.log(err)
                })
        },
    },
    computed: {
        enabledStatus() {
            return this.enabled ? `Enabled` : 'Disabled'
        },
    },
    mounted() {
        this.getStatus()
    },
}
</script>
