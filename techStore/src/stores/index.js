  import { defineStore } from "pinia";
  import { useRoute, useRouter } from 'vue-router'
  import Axios from 'axios'
import axios from "axios";
  // Cors a fixer avant de pouvoir changer de urlApi
  var urlApi = "poyo.axxonte.xyz"
  axios.defaults.headers.post["Access-Control-Allow-Origin"] = "*"
  export const useDefaultStore = defineStore({
    id: "default",

    state: () => ({
      urlLogin :"http://"+urlApi+"/api/login",
      urlApiProducts : "http://"+urlApi+"/api/produits",
      urlApiCategories : "http://"+urlApi+"/api/categories",
      urlApiAvis : "http://"+urlApi+"/api/avis",
      products:[],
      productDepart:[],
      avis:[],
      avisDepart:[],
      categories: [],
      categoriesDepart:[],
      user:[],
      panier:[],
      headers:('Access-Control-Allow-Origin')
      }),
    getters: {
    },
    actions: {
      login(username,password){
        Axios.post(this.urlLogin, {username: username,password: password})
          .then((response) => {
            console.log(response);
          }, (error) => {
            console.log(error);
          });
      },
      loadData() { 
        Axios.get(this.urlApiProducts)
        .then(response => response.data)
        .then((donneesProduct) => {
          this.productDepart = donneesProduct['hydra:member']
          // gestes est une copie de gestesDepart
          this.products = [...this.productDepart]
        }),

        Axios.get(this.urlApiCategories)
        .then(response => response.data)
        .then((donneesCategorie) => {
          this.categoriesDepart = donneesCategorie['hydra:member']
          // gestes est une copie de gestesDepart
          this.categories = [...this.categoriesDepart]
        }),
        
        Axios.get(this.urlApiAvis)
        .then(response => response.data)
        .then((donneesAvis) => {
          this.avisDepart = donneesAvis['hydra:member']
          // tags est une copie de gestesDepart
          this.avis = [...this.avisDepart]
        })
      },
      setTous()
      {
        this.products = this.productDepart
      },
      getProductById(id){
        for (let i = 0; i < this.products.length; i++) {
          if(this.products[i].id == id){
            return this.products[i]
          }
          
        }
      },
      
      filtre(id) {
        for (let i = 0; i < this.categories.length; i++) {
          if(this.categories[i].id == id){
            this.products = this.categories[i].produits
          }
          
        }
        
      }
    }
  })