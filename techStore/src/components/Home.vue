<template>
   <ProductsVue/>
</template>

<script setup>
import { ref } from 'vue';
// si vous voulez utilisez pinia , il faut placer ces deux lignes dans le composant de votre choix.
/*import { useDefaultStore } from '../stores/counter'*/
import { useRouter } from 'vue-router'
import ProductsVue from './ProductList.vue';
const router = useRouter()

</script>
