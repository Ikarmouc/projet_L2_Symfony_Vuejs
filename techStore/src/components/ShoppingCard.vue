<script>
const Panier = {
       data() {
            return {
                panier: [
                    
                ],
                input: {article: '', quantite: 0, prix: 0},
                tva: 20,
                poubelle: []
            }
        },
        computed: {
            total() {
                let total = 0
                this.panier.forEach(el => {
                    total += el.prix * el.quantite
                })
                return total.toFixed(2)
            },
            totalTTC() {
                let totalTTC = this.total*(1+this.tva/100)
                return totalTTC.toFixed(2)
            }
        },
        methods: {
            ajouter() {
                if(this.input.article!="" && this.input.quantite>0 && this.input.prix>=0) {
                    this.panier.push(this.input)
                    this.panier.sort(ordonner)
                    this.input = { article: '', quantite: 0, prix: 0 }
                }
            },
            eliminer(index) {
                this.poubelle.splice(index, 1);
            },
            modifier(index) {
                this.input = this.panier[index]
                this.panier.splice(index, 1)
                this.$refs.modif.focus()
            },
            supprimer(index) {
                this.poubelle.push(this.panier[index]);
                this.poubelle.sort(ordonner)
                this.panier.splice(index, 1)
            },
            retablir(index) {
                this.panier.push(this.poubelle[index]);
                this.panier.sort(ordonner)
                this.poubelle.splice(index, 1)
            }

        }
    }

    const ordonner = function (a, b) {
        return (a.article.toUpperCase() > b.article.toUpperCase())
    }
</script>