<template>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header card-header-icon card-header-rose">
                            <div class="card-icon">
                                <i class="material-icons">sync</i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Settings</h4>
                            Sync all resources.
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form @submit.prevent="onSync" v-show="!sync.upToDate && sync.loaded">
                                <div class="form-group">
                                    Sync is not up to date.
                                </div>

                                <button type="submit" class="btn btn-primary">Sync Now!</button>
                            </form>

                            <h5 v-show="sync.upToDate && sync.loaded">Sync up to date.</h5>
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
        sync: {
            upToDate: false,
            loaded: false,
        },
    }),
    methods: {
        onSync() {
            window.axios.post(`${this.actionUrl}`)
            .then(res => {
                console.log(res.data)
                this.resolveUpToDate(res.data.data.lastUpdatedAt)
                this.$toasted.success(`Sync performed.`, {duration: 3000})
            })
            .catch(err => {
                this.$toasted.error(`Unexpected error while attempting to sync resources.`, {duration: 3000})
                console.log(err)
            })
        },
        getStatus() {
            window.axios.get(`${this.actionUrl}`)
                .then(res => {
                    console.log(res)
                    this.resolveUpToDate(res.data.data.lastUpdatedAt)
                    this.sync.loaded = true
                })
                .catch(err => {
                    console.log(err)
                })
        },
        isToday(date) {
            const today = new Date()
            const formattedToday = `${String(today.getDate()).padStart(2, '0')}-${String(today.getMonth() + 1).padStart(2, '0')}-${today.getFullYear()}`

            return date === formattedToday
        },
        resolveUpToDate(date) {
            this.sync.upToDate = this.isToday(date)
        },
    },
    computed: {
    },
    mounted() {
        this.getStatus()
    },
}
</script>
