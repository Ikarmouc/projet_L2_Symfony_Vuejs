<template>
    <p>Soon...</p>
<!--
  <ul class="avis">
        <li class="card text-center"  v-for="avis in listAvisProduct" :key="product.id">
        <h1 class="card-title">{{avis.dateAvis}}</h1>
        <img class="card-img-top img"  src="https://via.placeholder.com/150">
        <p class="card-text">{{product.description}}</p>
        <p>{{product.prix}}</p>
        <p>{{product.categorie}}</p>
         <router-link class="btn btn-primary" :to="{ name: 'ProductInformations', params: { id: product.id } }" >
      Details 
    </router-link>
    </li>
    </ul> 
    -->
</template>

<style scoped>
.avis{
    display: flex;
    justify-content: center;
    flex-direction: row;
  flex-wrap: wrap;
  row-gap: 20%;
  font-size:1vw;
}

</style>
<script setup>
import { productStore,AvisStore} from '@/stores/counter'
import { useRoute, useRouter } from 'vue-router'
import { ref, computed,} from "vue";
const product = productStore()
const avis = AvisStore()
const route = useRoute()

/*

const props = defineProps(
    {
        product : Object
    }
)
let listAvisProduct = getAvisProduct()
function getAvisProduct(){
    let listAvis = []
    for (let i = 0; i < avis.Avis.length; i++) {
        if (avis.Avis[i].productId === props.product.id) {
            listAvis.push(avis.Avis[i])
        }
        console.log(listAvis)
    }
    return listAvis;
    console.log("C'est le bon : ")
    console.log(props.product)

    let listAvis = avis.avis[1]
    
    console.log(listAvis)
    for (let i = 0; i < avis.Avis.length; i++) {
        console.log()
        
    }
}
*/



</script>