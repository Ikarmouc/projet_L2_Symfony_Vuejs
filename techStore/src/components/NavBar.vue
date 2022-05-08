<template>
<header>
    <nav class="navbar navbar-dark bg-primary">
  <!-- Navbar content -->
  
  <div>
  <router-link :to="{ name: 'homepage'}" class="btn btn-danger">Accueil</router-link>
  </div>
        <div class="btn btn-info">Parcourir</div>
        <router-link v-if="isLogged" class="btn btn-primary" :to="{ name: 'homepage'}" >
      Se déconnecter
    </router-link>
    <router-link v-else class="btn btn-primary" :to="{ name: 'homepage'}" >
      Se Connecter
    </router-link>
        <RouterLink to="/panier" class="btn btn-info">Panier {{panier.panier.length}}</RouterLink>
</nav>
<nav class="navbar navbar-dark bg-primary" style="display:flex; justify-content:center">
        <Categories/>

</nav>
  </header>
</template>
<script setup>
import Products from '@/components/ProductList.vue'
import { CategoryStore,Panier } from '@/stores/counter'
import Categories from '@/components/Categories.vue'
import { RouterLink, RouterView} from 'vue-router'

import { useRoute, useRouter } from 'vue-router'
import '@/assets/bootstrap.min.css'
import '@/assets/base.css'

const panier = Panier()
</script>