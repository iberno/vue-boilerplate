import { Home } from '../components/index'

export default [
    {
        path: '/',
        component: Home,
        name: 'home',
        meta: {
          guest: true,
          needsAuth: false
        }
    }
]