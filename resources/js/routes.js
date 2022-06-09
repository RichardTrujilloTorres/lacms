import Dashboard from "./components/Pages/Dashboard";
import Posts from "./components/Pages/Posts";
import PageNotFound from "./components/Pages/PageNotFound";
import User from "./components/Pages/User";
import DoNotDisturb from "./components/Pages/DoNotDisturb";


const routes = [
    { path: '/', component: Dashboard },
    { path: '/posts', component: Posts },
    { path: '/users/:id', component: User },
    {
        path: '/settings/do-not-disturb',
        component: DoNotDisturb,
        props: {
            actionUrl: `${process.env.MIX_APP_URL}/api/settings/do-not-disturb`,
        },
    },
    // { path: '/', component: Dashboard },
    {
        path: '*',
        // name: '404',
        component: PageNotFound,
    },
]

export default routes
