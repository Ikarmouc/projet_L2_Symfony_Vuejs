<template>
<div class="product" v-if="product != null">
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
            <div>

            
            <button v-if="store.user.length == 0">
                Connectez vous pour donner votre avis sur le produit
            </button>
            <button v-else @click="changeVisible()" >
                Ajoutez un avis au produit
            </button>
                <AddAvis v-if="estVisible == true && avisExistant" :username=store.user :id=product.id></AddAvis>
            <!--
                <button @click="changeVisibleEdit()">

            </button>-->
            <button @click.prevent="addToShoppingCard(product)">
            Ajouter au panier
        </button>
            </div>
            
        </li>
        </ul>
        
        
        
        
</template>


<script setup>
import { computed } from '@vue/reactivity';
import {useDefaultStore} from '@/stores/index.js'
import { useRoute } from 'vue-router';
import AddAvis from './AddAvis.vue';
import { ref } from 'vue';
const estVisible = ref('false')
const estVisibleEdit = ref('false')
const avisExistant = ref('false')
const route = useRoute()
const store = useDefaultStore()
const props = defineProps(
    {product: Object}
)
const product = computed(() => {
    return store.products.length === 0 ? null : store.getProductById(route.params.id)
})

function changeVisible(){
                estVisible.value = !estVisible.value;

}
/*
function changeVisibleEdit(){

    //console.log(store.products)
    const found = store.products.find(element => product.id = route.params.id)

    store.checkAvisExistant(found)
    /*console.log(found)
    if(store.checkAvisExistant(found))
    {
        
        console.log("Existe !")
    }else{
        console.log("Existe pas !")
}
}*/

function addToShoppingCard(product){
    store.addProductToShoppingCard(product)
} 
</script>


<style>
</style>