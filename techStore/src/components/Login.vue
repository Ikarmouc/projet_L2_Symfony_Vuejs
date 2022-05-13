<template>
<form action="action_page.php" method="post">

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" v-model="username" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" v-model="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" @click.prevent="login(username,password)" name="send">Login</button>
  </div>
</form>
</template>

<script setup>
import { useDefaultStore } from '../stores';


const store = useDefaultStore()
const props = defineProps(
    {
        username:String,
        password:String
    }
)
function login(username,password){
    store.login(username,password)
}


</script>