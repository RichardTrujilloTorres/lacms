import Dashboard from "./components/Pages/Dashboard";
import Posts from "./components/Pages/Posts";
import PageNotFound from "./components/Pages/PageNotFound";
import User from "./components/Pages/User";
import DoNotDisturb from "./components/Pages/DoNotDisturb";
import UserList from "./components/Pages/UserList";
import NotificationDetail from "./components/Pages/NotificationDetail";
import Sync from "./components/Pages/Sync";


const routes = [
    { path: '/', component: Dashboard },
    { path: '/posts', component: Posts },
    {
        path: '/users/list',
        component: UserList,
        props: {
            usersUrl: `${process.env.MIX_APP_URL}/api/users`,
        },
    },
    { path: '/users/:id', component: User },
    {
        path: '/settings/do-not-disturb',
        component: DoNotDisturb,
        props: {
            actionUrl: `${process.env.MIX_APP_URL}/api/settings/do-not-disturb`,
        },
    },
    {
        path: '/settings/sync',
        component: Sync,
        props: {
            actionUrl: `${process.env.MIX_APP_URL}/api/settings/sync`,
        },
    },
    {
        name: 'notificationDetail',
        path: '/notifications/:id',
        component: NotificationDetail,
        props: {
            notificationsUrl: `${process.env.MIX_APP_URL}/api/notifications`,
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
