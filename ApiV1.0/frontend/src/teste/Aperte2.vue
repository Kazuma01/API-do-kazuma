<template>
    <div>
        <p>Todo Id: {{ todoid }}</p><br>
        <button @click="todoid++" :disabled="!todoData">fetch next todo</button><br>
        <p v-if="!todoData">login.....</p>
        <pre v-else>{{"Nome: " + todoData.name }} - {{"Idade: " + todoData.idade }} - {{"ID: " + todoData.id }}</pre>
    </div>
</template>
<script>
export default{
    data(){
        return{
            todoid: 1,
            todoData: null,
        }
    },
    methods:{
        async fetchData(){

            this.todoData = null;

            try {

                const res = await fetch(
                    `http://localhost:8000/api/pessoas/${this.todoid}`
                )

                if (!res.ok) {
                    throw new Error("Network response was not ok");
                }

                this.todoData = await res.json()
            } catch (error) {
                console.error("Erro ao buscar os dados:", error);
                this.todoid = 1;
            }
    }
},
    mounted(){
        this.fetchData()
    },
    watch:{
        todoid(){
            this.fetchData()
        }
    }
}
</script>