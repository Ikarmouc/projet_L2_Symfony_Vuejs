import { createRouter, createWebHashHistory } from 'vue-router'
import HomeView from '../components/Home.vue'
import ProductListVue from '../components/ProductList.vue'
import ProductInformation from '@/components/ProductInformation.vue'
import ProductCat from '@/components/ProductListByCat.vue'
import Panier from '@/components/Panier.vue'

const routes = [
    {
      path: '/',
      name : 'homepage',
      component : ProductListVue
    },
    {
      path:"/produit/:id",
      name:'ProductInformations',
      component:ProductInformation,
    },
    {
      path:"/categorie/:slug",
      name:'ProductByCat',
      component:ProductCat,
    },
    {
      path:"/panier",
      name:'Panier',
      component:Panier,
    },
]

const router = createRouter({
    history: createWebHashHistory(),
    routes,
  })

export default router