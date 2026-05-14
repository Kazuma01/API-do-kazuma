import { createRouter, createWebHistory } from 'vue-router';
import Home from "../pages/Home.vue";
import VisualizarUsuarios from "../pages/VisualizarUsuarios.vue";
import CriarUsuario from '../pages/CriarUsuario.vue';

const routes = [
  {
    path: '/',
    component: Home
  },
  {
    path: '/verusuarios',
    component: VisualizarUsuarios
  },
  {
    path: '/criarusuario',
    component: CriarUsuario
  }
];


const router = createRouter({
  history: createWebHistory(),
  routes,
});

// app.use(router);
export default router;
