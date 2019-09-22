import VueRoute from 'vue-router'
import Vue from 'vue'
/////component
import test from './components/test'
import create from './components/post/create'
import index from './components/post/index'
import edit from './components/post/edit'
const routes=[
    {path:'/test',component: test},
    {path:'/post/create',component: create},
    {path:'/post/edit/:id',component: edit},
    {path:'/',component: index},

]
Vue.use(VueRoute);

const router =new VueRoute({
    routes,
    mode:'history'
});
export default router
