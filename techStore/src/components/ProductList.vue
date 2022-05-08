<template>
    
    <ul class="products">
        <li class="card text-center"  v-for="product in store.products" :key="product.id">
        <h1 class="card-title">{{product.nom}}</h1>
        <img class="card-img-top img"  src="https://via.placeholder.com/150">
        <p class="card-text">{{product.description}}</p>
        <p>{{product.prix}}</p>
        <p>{{product.categorie}}</p>
         <router-link class="btn btn-primary" :to="{ name: 'ProductInformations', params: { id: product.id } }" >
      Details 
    </router-link>
    </li>
    </ul>

    
    
</template>

<style>


</style>
<script setup>

import { ref ,computed } from 'vue'
import { productStore } from '@/stores/counter'

const props = defineProps({
  products: Array,
})

const store = productStore()


</script>
