import { createRouter, createWebHashHistory } from 'vue-router'
import HomeView from '../components/Home.vue'
import ProductsVue from '../components/Products.vue'
import ProduitDetailsVue from '../components/ProduitDetails.vue'

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
    }
    /*
    {
      path:"/produit/:id",
      name:'ProductInformations',
      component:ProductInformation,
    },
    {
      path:"/categorie/:slug",
      name:'ProductByCat',
      component:ProductCat,
    },*/
]

const router = createRouter({
    history: createWebHashHistory(),
    routes,
  })

export default router