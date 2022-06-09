import Dashboard from "./components/Pages/Dashboard";
import Posts from "./components/Pages/Posts";
import PageNotFound from "./components/Pages/PageNotFound";


const routes = [
    { path: '/', component: Dashboard },
    { path: 'posts', component: Posts },
    // { path: '/', component: Dashboard },
    {
        path: '*',
        // name: '404',
        component: PageNotFound,
    },
]

export default routes
