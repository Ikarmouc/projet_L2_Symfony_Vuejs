import { defineStore } from "pinia";
import { useRoute, useRouter } from 'vue-router'

export const productStore = defineStore({
  id: "products",
  state: () => ({
    products:[
      {
        id: 1,
        nom: "Pc gamer",
        prix: 199999,
        description: "Exemple de pc fixe gamer",
        imageName: "pc-gamer-fixe",
        img: "../../symfony/public/img/  pc01-6266b9cc92f79133553340.jfif",
        categorie: "pc-fixe",
        qtePanier : 0
      },
    
      {
        id: 2,
        nom: "Pc gamer portable",
        prix: 199999,
        description: "Exemple de pc portable gamer",
        imageName: "Pc gamer portable",
        img: "../../symfony/public/img/  pc01-6266b9cc92f79133553340.jfif",
        categorie: "pc-portable",
        qtePanier : 0
      },
    
      {
        id: 3,
        nom: "Clavier ergonomique",
        prix: 69.99,
        description: "Exemple de clavier",
        imageName: "clavier",
        img: "../../symfony/public/img/  pc01-6266b9cc92f79133553340.jfif",
        categorie: "clavier",
        qtePanier : 0

      },
    
      {
        id: 4 ,
        nom: "Souris",
        prix: 59.99,
        description: "Exemple de souris",
        imageName: "souris",
        img: "../../symfony/public/img/  pc01-6266b9cc92f79133553340.jfif",
        categorie: "souris",
        qtePanier : 0

      },
    ],
    currentProduct :[],
    estVide: false
  }),
  getters: {
    getCurrentProduct: (state) => state.currentProduct,
  },
  actions: {
    setCurrentProduct(id) {
      for(let i = 0; i< this.products.length;i++)
      {
        if (this.products[i].id == id) {
            this.currentProduct = this.products[i];
        }
      }
    },
    getProductsByCatId(slug){
      var productsByCat = []
      for(let i = 0; i< this.products.length;i++)
      {
        if (this.products[i].categorie == slug) {
            productsByCat.push(this.products[i]);
        }
        if (productsByCat.length == 0) {
        
          this.estVide = true
        }else{
          this.estVide = false
        }
      }
      
      return productsByCat
    },
  },
});

export const CategoryStore = defineStore({
  id: "category",
  state: () => ({
    category:[
      {
        "id": 1,
        "nomCategorie": "Ordinateurs portables",
        "slug": "pc-portable"
    },
    {
        "id": 2,
        "nomCategorie": "Ordinateurs fixes",
        "slug": "pc-fixe"
    },
    {
        "id": 3,
        "nomCategorie": "Claviers",
        "slug": "clavier"
    },
    {
        "id": 4,
        "nomCategorie": "Souris",
        "slug":"souris"
    },
    {
        "id": 5,
        "nomCategorie": "Tapis de souris",
        "slug":"tapis-de-souris"
    },
    {
        "id": 6,
        "nomCategorie": "Cartes graphiques",
        "slug":"carte-graphique"
    },
    {
        "id": 7,
        "nomCategorie": "Processeurs",
        "slug":"processeurs"
    },
    {
        "id": 8,
        "nomCategorie": "Disques durs",
        "slug":"disque-dur"
    },
    {
        "id": 9,
        "nomCategorie": "Barettes de Memoire vive",
        slug:"barettes-de-memoire-vive"
    }
    ],
    currentCategory :[]
  }),
  getters: {
    getCurrentCategory: (state) => state.currentCategory,
  },
  actions: {
    setSelectedCategory(id) {
      for(let i = 0; i< this.category.length;i++)
      {
        if (this.category[i].id == id) {
            this.currentCategory = this.category[i];
        }
      }

    },
  },
});


export const Panier = defineStore({
  id: "panier",
  state: () => ({
    panier :[

    ],
    total:0
  }),
  getters: {
    getPanier: (state) => state.panier,
  },
  actions: {
    addProduct(product){
        this.panier.push(product)
        this.total+=product.prix
    },
    deleteProduct(index){
      this.panier.splice(index,1)
    },
    sub(i){
      this.total-=i
    }
  },
});

export const AvisStore = defineStore({
  id: "avis",
  state: () => ({
    Avis:[
      {
        id:1,
        productId:1,
        utilisateur:"User 1",
        dateAvis:"19/05/2022",
        note:5,
        detailsAvis:"Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rutrum porttitor ipsum, non dapibus justo. Vivamus vulputate ipsum ligula, eget ultrices nulla varius id. Morbi consequat placerat tellus, vitae rutrum ligula tincidunt ut. Etiam vitae lacus lacus. Duis ut posuere tellus. Vestibulum ante ipsum primis in faucibus orci luctus et."
      },
      {
        id:1,
        productId:1,
        utilisateur:"User 2",
        dateAvis:"02/03/2022",
        note:1,
        detailsAvis:"Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rutrum porttitor ipsum, non dapibus justo. Vivamus vulputate ipsum ligula, eget ultrices nulla varius id. Morbi consequat placerat tellus, vitae rutrum ligula tincidunt ut. Etiam vitae lacus lacus. Duis ut posuere tellus. Vestibulum ante ipsum primis in faucibus orci luctus et."
      },
      {
        id:1,
        productId:1,
        utilisateur:"User 3",
        dateAvis:"20/02/2022",
        note:3,
        detailsAvis:"Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rutrum porttitor ipsum, non dapibus justo. Vivamus vulputate ipsum ligula, eget ultrices nulla varius id. Morbi consequat placerat tellus, vitae rutrum ligula tincidunt ut. Etiam vitae lacus lacus. Duis ut posuere tellus. Vestibulum ante ipsum primis in faucibus orci luctus et."
      },
      {
        id:1,
        productId:1,
        utilisateur:"User 4 ",
        dateAvis:"14/08/2022",
        note:2,
        detailsAvis:"Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rutrum porttitor ipsum, non dapibus justo. Vivamus vulputate ipsum ligula, eget ultrices nulla varius id. Morbi consequat placerat tellus, vitae rutrum ligula tincidunt ut. Etiam vitae lacus lacus. Duis ut posuere tellus. Vestibulum ante ipsum primis in faucibus orci luctus et."
      },
    ]
  }),
  getters: {
    getAvis: (state) => state.Avis,
  },
  actions: {
    addAvis(Avis){
        
    }
  },
});