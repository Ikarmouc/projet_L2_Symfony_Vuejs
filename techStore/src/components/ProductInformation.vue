<template>

    <div class="card text-center">
      <h1 class="card-title">{{ produit.nom }}</h1>
      <img
        class="card-img-top img"
        src="https://via.placeholder.com/150"
      />
      <p class="card-text">{{ produit.description }}</p>
      <p>{{ produit.prix }}</p>
      <p>{{ produit.categorie }}</p>
      <p class="btn btn-primary" @click="ajouterPanier(produit)" >
      Ajouter au panier
    </p>
    </div>

    <Avis :product="produit"/>
</template>

<script setup>
import { ref, computed,} from "vue";
import { useRoute, useRouter } from 'vue-router'
import { productStore } from '@/stores/counter'
import { Panier} from '@/stores/counter'
import Avis from "./Avis.vue";

const route = useRoute()
const router = useRouter()

const store = productStore()
store.setCurrentProduct(route.params.id)
const produit = store.getCurrentProduct;



const panierStore = Panier()
function ajouterPanier(product)
{
  panierStore.addProduct(product)
}



</script>
