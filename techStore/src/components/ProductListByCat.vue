<template>
    

    <div v-if="store.estVide == true">
      <p> OOps c'est vide ici</p>
    </div>
    <ul v-else class="product">
        <li class="card text-center"  v-for="product in produitsCat" :key="product.id">
        <h1 class="card-title">{{product.nom}}</h1>
        <img class="card-img-top" height="150" width="150" src="https://via.placeholder.com/150">
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

import { productStore} from '@/stores/counter'
import { ref, computed,} from "vue";
import { useRoute, useRouter } from 'vue-router'


const route = useRoute()
const router = useRouter()

const store = productStore()
const produitsCat = ref(store.getProductsByCatId(route.params.slug))


</script>
