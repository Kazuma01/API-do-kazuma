import { createRouter, createWebHistory } from 'vue-router';
import Home from "../pages/Home.vue";
import VisualizarUsuarios from "../pages/VisualizarUsuarios.vue";
import CriarUsuario from '../pages/CriarUsuario.vue';
import DeletarUsuario from '../pages/DeletarUsuario.vue';
import EditarUsuario from '../pages/EditarUsuario.vue';

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
  },
  {
    path: '/deletarusuario',
    component: DeletarUsuario
  },
  {
    path: '/editarusuario',
    component: EditarUsuario
  }
];


const router = createRouter({
  history: createWebHistory(),
  routes,
});

// app.use(router);
export default router;
