

<!-- https://pt.vuejs.org/tutorial/#step-7 -->

<template>
    <form @submit.prevent="NewItList">
        <input type="text" v-model="Newitem" placeholder="ADD um novo texto"> <br>
        <button>Add novo item</button>
    </form>
    <ul>
        <li v-for="item in itemsList" :key="item.id">
            <input type="checkbox" v-model="item.done">
            <span :class="done:item.done">{{ item.text }}</span>
            <button @click="RemverItemList(item)">X</button>
        </li>
    </ul>
    <button @click="hideAllText = !hideAllText">
        {{ hideAllText ? "Text all" : "Text Not All" }}
    </button>
</template>

<script>
import { Text } from 'vue';

let id = 1
export default{
    data(){
        return{ 
            Newitem: " ",
            itemsList: []
        }
    },
    methods:{
        NewItList(){
            this.itemsList.push({id: id++,text: this.Newitem})
            this.Newitem = ""
        },
        RemverItemList(item){
            this.itemsList = this.itemsList.filter((t) => t != item)
        }
    }
}
</script>

<style>
.done{
    text-decoration: line-through;
}
</style>