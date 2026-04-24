<template>
    <div>
        <H1>{{ mensagem }}</H1>
        <button @click="Update">Button</button><br>
        <input type="text" v-model="Texto" placeholder="Digita aqui"/><br>
        <p>{{ Texto }}</p>
    </div>
</template>

<script>
export default{
    data(){
        return{
            mensagem:"text",
            Texto: ""
        }
    },
    methods:{
        Update(){
            this.mensagem = "New text"
        }
    }
}
</script>