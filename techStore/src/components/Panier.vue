<template>
  <body>
    <div class="container panier">
      <div class="card text-center">
        <h3 class="card-header">Panier</h3>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="col-sm-4">Produit</th>
              <th class="col-sm-6">Categorie</th>
              <th class="col-sm-2">Prix</th>
              <th class="col-sm-2" colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>

            <tr v-if="store.panier.length === 0">
              <td>
                  
              </td>
              <td>
                  
              </td>
              <td>
                  
              </td>
               <td>
                  
              </td>
            </tr>
            <tr v-for="(item, index) in store.panier" :key="index" >
              <td>{{ item.nom }}</td>
              <td></td>
              <td >{{ item.prix }} €</td>
              <td>
                <button
                  class="btn btn-danger btn-block"
                  @click="deleteProduct(index)"
                >
                  <img class="icon" src="../../public/icons/trash-solid.svg">
                </button>
              </td>
              
            </tr>

             <td>
              Total
            </td>
            <td>
              {{store.total}} € 
            </td>
            <td>
                  
              </td>
              <td>
                  
              </td>
          </tbody>
          <tfoot>
            
           
          </tfoot>
        </table>
      </div>
    </div>
  </body>
</template>

<script setup>
import { productStore, Panier } from "@/stores/counter";
import { ref, computed } from "vue";
import { useRoute, useRouter } from "vue-router";

const store = Panier();
let total = 0;

function sub(n){
  total-=n;
}

function deleteProduct(index){
  console.log(index)
  store.sub(store.panier[index].prix)
  store.deleteProduct(index)
}
</script>

<style scoped>
.icon{
  width: 2vw;
  height: 2vw;
}

.panier{}

</style>
