<template>

<button @click.prevent="changeCat(props.id)">
    {{props.nom}}
</button>
</template>


<script setup>
import router from '../router';
import { useDefaultStore } from '../stores';


const props = defineProps(
    {
        "nom":String,
        'id':Number
    }
)
const store = useDefaultStore()
function changeCat(id){
    store.filtre(id)
    router.push('/')
}
</script>


<style>
</style>
