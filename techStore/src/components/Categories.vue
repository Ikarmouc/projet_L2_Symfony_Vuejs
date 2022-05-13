<template>
    <div v-for="categorie in store.categories" :key="categorie.id">
        <Categorie :nom=categorie.nomCategorie :id=categorie.id></Categorie>
</div>
</template>

<script setup>

import { ref ,computed } from 'vue'
import { useDefaultStore } from '@/stores';
import Categorie from './Categorie.vue';
const store = useDefaultStore()


</script>
