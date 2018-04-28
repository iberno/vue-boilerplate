import Vue from 'vue'
import VueRouter from 'vue-router'
import { routes as routes } from '../app/index'

Vue.use(VueRouter)

const router = new VueRouter({
    routes: routes
})

//

export default router