import { createRouter, createWebHistory } from 'vue-router';
import IndexRecommenedPage from './components/recommened/pages/IndexRecommenedPage.vue';
import NotFound from './components/notfound/NotFound.vue'

const route_list = [
    {path: '/', component: IndexRecommenedPage},
    {path: '/:notFound(.*)', component: NotFound}
]

let router = createRouter({
    history: createWebHistory(),
    routes: route_list
});

router.beforeEach(function(to, from, next) {
    if (to.meta.needAuth) {
        console.log('has Need auth')
        next("/")
    } else {
        console.log('No need auth')
        next()
    }
})

export default router;