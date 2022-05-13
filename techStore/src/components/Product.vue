<template>
        <h1 class="card-title">{{product.nom}}</h1>
        <img class="card-img-top img" :src="'/public/img/'+product.img">
        <p class="card-text textDescription" >{{product.description}}</p>
        <p>Prix : {{product.prix}} €</p>
        <router-link class="btn btn-primary" :to="{ name: 'ProduitDetailsVue', params: { id: product.id } }" ></router-link>

        Details 
</template>


<script setup>
import {useDefaultStore} from '@/stores/index.js'
import { computed } from '@vue/reactivity';

const store = useDefaultStore()


const props = defineProps(
    {product: Object}
)


</script>

<style>
</style>