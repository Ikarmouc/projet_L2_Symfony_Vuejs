<script setup>
import { RouterLink, RouterView} from 'vue-router'
import NavBar from './components/NavBar.vue';
import { useDefaultStore } from './stores/index'
import { onMounted } from 'vue'
import '@/assets/bootstrap.min.css'
import '@/assets/base.css'

const store = useDefaultStore()
onMounted(() => {
  store.loadData()
})

</script>


<template>
  <NavBar></NavBar>
  <RouterView />
  
</template>
