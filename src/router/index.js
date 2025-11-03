import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [{
    path:'/',
    name:'home',
    component: () => import('@/views/tarefaView.vue')
  },{
    path:'/categorias',
    name:'categorias',
    component: () => import('@/views/categoriaView.vue')
  }],
})

export default router
