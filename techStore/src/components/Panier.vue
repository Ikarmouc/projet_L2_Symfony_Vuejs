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
            <tr v-for="(product, index) in store.panier" :key="index" >
              <td>{{ product.nom }}</td>
              <td></td>
              <td >{{ product.prix }} €</td>
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
              {{store.panierTotalPrice}} € 
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
import { useDefaultStore } from '../stores';


const store = useDefaultStore()

function deleteProduct(index){
    store.deleteProductToShoppingCard(index)
}
</script>


<style>
</style>