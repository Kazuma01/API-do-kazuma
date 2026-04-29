<template>
    <form @submit.prevent="NewItList">
        <input type="text" v-model="Newitem" placeholder="ADD um novo texto"> <br>
        <button>Add novo item</button>
    </form>
    <ul>
        <li v-for="item in itemsList" :key="item.id">
            {{ "(" + item.id + ") " + item.text }}
            <button @click="RemverItemList(item)">X</button>
        </li>
    </ul>
</template>

<script>
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