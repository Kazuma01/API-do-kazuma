<template>
    <div>
        <p>Todo Id{{ todoid }}</p><br>
        <button @click="todoid++" :disabled="!todoData">fetch next todo</button><br>
        <p v-if="!todoData">login.....</p>
        <pre v-else>{{ todoData }}</pre>
    </div>
</template>
<script>
export default{
    data(){
        return{
            todoid: 1,
            todoData: null
        }
    },
    methods:{
        async fetchData(){
            this.todoData = null;
            const res = await this.fetchData(`https://jsonplaceholder.typicode.com/todos/${this.todoId}`)
            this.todoData = await res.json()
        }
    },
    mounted(){
        this.fetchData()
    },
    watch:{
        todoData(){
            this.fetchData()
        }
    }
}
</script>