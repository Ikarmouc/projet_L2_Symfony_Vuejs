import { createApp } from "vue";
import { createPinia } from "pinia";
import App from "./App.vue";
import router from "./router";
const app = createApp(App);


/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import specific icons */
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

//customElements.define('font-awesome-icon', FontAwesomeIcon)
app.component(faUserSecret)


app.use(createPinia());
app.use(router);
app.mount("#app");
