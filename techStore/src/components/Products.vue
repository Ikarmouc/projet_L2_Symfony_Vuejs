<template>
  <ProductList :products="store.products"></ProductList>

  <p></p>
</template>

<script setup>
import { ref, computed } from "vue";
import ProductList from "./ProductList.vue";
import { productStore } from '@/stores/counter'

const store = productStore();


</script>
