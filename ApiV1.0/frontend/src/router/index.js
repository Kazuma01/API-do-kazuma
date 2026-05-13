import { createRouter, createWebHistory } from 'vue-router';
import Home from "../pages/Home.vue";
import VisualizarUsuarios from "../pages/VisualizarUsuarios.vue";

const routes = [
  {
    path: '/',
    component: Home
  },
  {
    path: '/verusuarios',
    component: VisualizarUsuarios
  },
];


const router = createRouter({
  history: createWebHistory(),
  routes,
});

// app.use(router);
export default router;
