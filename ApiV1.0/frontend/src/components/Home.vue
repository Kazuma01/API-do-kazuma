<template>
    <div>
        <form @submit.prevent="Dadoslist">
            <input type="text" v-model="Name" required placeholder="Digite seu nome">
            <input type="text" v-model="Idade" required placeholder="Digite sua idade">
            <button type="submit">Enviar</button>
        </form> <br>

    </div>
</template>
<script>
export default{
    data(){
        return{
            Name: "",
            Idade: ""
        }
    },
    methods:{
        Dadoslist(){
            const data = {
                name: this.Name,
                idade: this.Idade
            }
            this.Name = "";
            this.Idade = "";
                console.log(data);

        }
    }
}
</script>