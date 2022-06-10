<template>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon card-header-rose">
                            <div class="card-icon">
                                <i class="material-icons">person</i>
                            </div>
                            <h4 class="card-title ">Users</h4>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Verified
                                    </th>
                                    </thead>
                                    <tbody>
                                    <tr v-for="user in users">
                                        <td>
                                            {{ user.id }}
                                        </td>
                                        <td>
                                            {{ user.name }}
                                        </td>
                                        <td>
                                            {{ user.email }}
                                        </td>
                                        <td>
                                            {{ user.email_verified_at ? `Yes` : `No` }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a :class="previousDisabledClass" @click.prevent="onPreviousPage" class="page-link">Previous</a></li>
                            <li class="page-item" :class="currentPageClass(basePage)"><a class="page-link" @click.prevent="onGoToPage(basePage)"
                            >
                                {{ basePage }}
                            </a></li>
                            <li class="page-item" :class="currentPageClass(basePage + 1)"><a class="page-link" @click.prevent="onGoToPage(basePage + 1)"
                            >
                                {{ basePage + 1 }}
                            </a></li>
                            <li class="page-item" :class="currentPageClass(basePage + 2)"><a class="page-link" @click.prevent="onGoToPage(basePage + 2)"
                            >
                                {{ basePage + 2 }}
                            </a></li>
                            <li class="page-item"><a :class="nextDisabledClass" @click.prevent="onNextPage" class="page-link" href="">Next</a></li>
                        </ul>
                    </nav>
                </div>
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
        users: [],
        currentPage: 1,
        lastPage: 1,
        basePage: 1,
    }),
    methods: {
        getUsers(page = this.currentPage) {
            window.axios.get(`${this.usersUrl}?page=${page}`)
            .then(res => {
                console.log(res)
                this.users = res.data.data.users.data
                this.lastPage = res.data.data.users.last_page
                this.currentPage = res.data.data.users.current_page

                this.basePage = this.resolveBasePage(this.currentPage, this.basePage)

            })
            .catch(err => {
                console.log(err)
            })
        },
        onPreviousPage() {
            this.getUsers(Number(this.currentPage - 1))
        },
        onNextPage() {
            this.getUsers(Number(this.currentPage + 1))
        },
        onGoToPage(page) {
            this.getUsers(Number(page))
        },
        currentPageClass(page) {
            return Number(this.currentPage) === Number(page) ? `active` : ``
        },
        resolveBasePage(currentPage, basePage) {
            return (Number(currentPage - basePage)  === -3) ||
            (Number(currentPage - basePage)  === 3) ||
            (Number(currentPage < basePage)) ?
                currentPage:
                basePage
        },
    },
    computed: {
        previousDisabledClass() {
            return Number(this.basePage) === 1 ? `disabled` : ``
        },
        nextDisabledClass() {
            return Number(this.currentPage) === Number(this.lastPage) ? `disabled` : ``
        },
    },
    mounted() {
        this.getUsers()
    },
}
</script>
