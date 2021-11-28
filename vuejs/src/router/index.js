import { createRouter, createWebHistory, } from 'vue-router'

const routes = [
    {
        path: '/',
        name: 'DataGuru.index',
        component: () => import("../views/DataGuru/Index.vue")
    },

    {
        path: '/create',
        name: 'DataGuru.create',
        component: () => import("../views/DataGuru/Create.vue")
    },

    {
        path: '/edit/:id',
        name: 'DataGuru.edit',
        component: () => import("../views/DataGuru/Edit.vue")
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;