<template>
    
                <div v-for="categorie in store.category" :key="categorie.id">
                  <router-link @click="store.setSelectedCategory(categorie.id)" class="btn btn-primary" :to="{ name: 'ProductByCat',params:{ slug: categorie.slug }}">{{categorie.nomCategorie}}</router-link>
                </div>
</template>

<script setup>

import { ref ,computed } from 'vue'
import { CategoryStore } from '@/stores/counter'
const props = defineProps({
  category: Array,
})

const store = CategoryStore()


</script>
