<template>
<header>
    <nav class="navbar navbar-dark bg-primary">
  <!-- Navbar content -->
  
  <div>
  <router-link :to="{ name: 'homepage'}" class="btn btn-danger" @click.prevent="resetCat()">Accueil</router-link>
  </div>
    
  <router-link :to="{ name: 'panier'}" class="btn btn-info">Panier : ({{store.panier.length}}) elements</router-link>

    <div v-if="store.user== []" >
      Se déconnecter
    </div>
    <div v-else class="btn btn-primary">
       <button @click="changeVisible()"> Se Connecter </button>
       </div>
    <div v-if="visible">
          <Login/>
    </div>
</nav>
<nav class="navbar navbar-dark bg-primary" style="display:flex; justify-content:center">
        <Categories/>
</nav>
  </header>
</template>
<script setup>
import Categories from '@/components/Categories.vue'
import { RouterLink, RouterView} from 'vue-router'
import { useRoute, useRouter } from 'vue-router'
import { useDefaultStore } from '../stores';
import Login from './Login.vue';
import { ref } from 'vue';
const store = useDefaultStore()

  const visible = ref(false);

  function changeVisible() {
    visible.value = !visible.value;
  }

function resetCat(){
  store.setTous()
}
</script>