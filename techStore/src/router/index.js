import { createRouter, createWebHashHistory } from 'vue-router'
import HomeView from '../components/Home.vue'
import ProductsVue from '../components/Products.vue'
import ProduitDetailsVue from '../components/ProduitDetails.vue'
import AddAvis from '../components/AddAvis.vue'
import Panier from '../components/Panier.vue'
const routes = [
    {
      path: '/',
      name : 'homepage',
      component : ProductsVue
    },
    {
      path:'/product/:id',
      name: 'ProduitDetailsVue',
      component: ProduitDetailsVue,
    },
    
    
    {
      path:"/panier",
      name:'panier',
      component:Panier,
    },
    
]

const router = createRouter({
    history: createWebHashHistory(),
    routes,
  })

export default router