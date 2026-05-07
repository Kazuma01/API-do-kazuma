import { createRouter, createWebHistory } from 'vue-router';
import Home from "../components/Home.vue";
import Aperte2 from "../components/Aperte2.vue";
import page from "../components/page.vue";

const routes = [
  {
    path: '/',
    component: Home
  },
  {
    path: '/Aperte2',
    component: Aperte2
  },
  {
    path: "/page",
    component: page
  }
];


const router = createRouter({
  history: createWebHistory(),
  routes,
});

// app.use(router);
export default router;
