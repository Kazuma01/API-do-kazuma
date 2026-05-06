

<!-- https://pt.vuejs.org/tutorial/#step-7 -->

<template>
    <form @submit.prevent="NewItList">
        <input v-model="Newitem" required placeholder="ADD um novo texto"> <br>
        <button>Add novo item</button>
    </form>
    <ul>
        <li v-for="item in updatefortext" :key="item.id">
            <input type="checkbox" v-model="item.done">
            <span :class="{ done: item.done }">{{ item.text }}</span>
            <button @click="RemverItemList(item)">X</button>
        </li>
    </ul>
    <button @click="hideAllText = !hideAllText">
        {{ hideAllText ? "Text Not all" : "Text All" }}
    </button>
</template>

<script>

let id = 0;


export default{
    data(){
        return{ 
            Newitem: " ",
            hideAllText: false,
            itemsList: []
        }
    },
    computed:{
        updatefortext(){
            return this.hideAllText 
            ? this.itemsList.filter((t) => !t.done)
            : this.itemsList
        }
    }
    ,
    methods:{
        NewItList(){if(this.Newitem !== " "){
            this.itemsList.push({id: id++,text: this.Newitem, done: false})
        }    
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