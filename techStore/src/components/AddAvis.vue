<template>
<form method="post">

  <div class="container">
    <label for="uname"><b>Note</b></label>
    <input type="number" min="0" max="5" v-model="note" placeholder="Note" name="uname" required>

    <label for="psw"><b>Commentaire</b></label>
    <input type="text" v-model="commentaire" placeholder="Votre commentaire" required>

    <button type="submit" @click.prevent="addAvis(note,commentaire)" name="send">Ajoutez votre avis</button>
  </div>
</form>
</template>


<script setup>


import { defineProps } from "vue"
import { useDefaultStore } from "../stores";

const store = useDefaultStore()
const props = defineProps(
    {
        username:String,
        id:Number,

    }
)
function addAvis(note,commentaire)
{
    let data = {
  "produit": "/api/produits/"+props.id,
  "note": note,
  "comments": commentaire,
  "username": props.username
}
    console.log(data,props.id)
    store.addAvis(data)
}
</script>