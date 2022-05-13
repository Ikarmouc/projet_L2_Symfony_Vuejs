<template>
 <ul class="products">
        <li v-if="store.products.lenght == 0" ></li>
        <li class="card text-center" v-else  v-for="product in store.products" :key="product">
          <Product class="card-body products" :product=product></Product>
        </li>
    </ul>
</template>

<script setup>
import {useDefaultStore} from '@/stores/index.js'
import Product from './Product.vue';

const store = useDefaultStore()


</script>

<style>



</style>