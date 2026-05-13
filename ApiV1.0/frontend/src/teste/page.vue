<template>
   <Filho :Mgn = "MenNew"/>
   <Home/>
</template>

<script>
import Filho from './filho.vue';
import Home from './Home.vue';





export default{
    components:{
        Filho,
        Home
    },
    data(){
        return{
            MenNew:"ola mundo",
        }
    }
}
</script>