<template>
<div class="product">
    <h1 class="card-title">{{product.nom}}</h1>
        <img class="imgProduct" :src="'/public/img/'+product.img">
        <p class="card-text" >{{product.description}}</p>
        <p>Prix : {{product.prix}} €</p>
</div>

<ul class="avis">
        <li v-for="avis in product.avis" :key="avis.id">
            <p>note : {{avis.note}}/5</p>
            <p>utilisateur : {{avis.username}}</p>
            <p>Commentaire : {{avis.comments}}</p>
        </li>
        <li>
            <button v-if="store.user.length == 0">
                Connectez vous pour donner votre avis sur le produit
            </button>
            <button v-else>
                Ajoutez un avis au produit
            </button>
        </li>
        </ul>
        
        
</template>


<script setup>
import { computed } from '@vue/reactivity';
import {useDefaultStore} from '@/stores/index.js'
import { useRoute } from 'vue-router';

const route = useRoute()
const store = useDefaultStore()
const props = defineProps(
    {product: Object}
)
const product = computed(() => {
    return store.products.length === 0 ? null : store.getProductById(route.params.id)
})
</script>

<style>
</style>