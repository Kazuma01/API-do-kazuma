<template>
    <div>
        <form @submit.prevent="Dadoslist">
            <input type="text" v-model="Name" required placeholder="Digite seu nome">
            <input type="number" v-model="Idade" required placeholder="Digite sua idade">
            <button type="submit">Enviar</button>
        </form> <br>
        <p>{{ resposta }}</p>
    </div>
</template>
<script>
export default{
    data(){
        return{
            Name: "",
            Idade: "",
            resposta: ""
        }
    },
    methods:{
        async Dadoslist(){
            const data = {
                name: this.Name,
                idade: this.Idade
            }
            this.Name = "";
            this.Idade = "";
            
            try {
                const response = await fetch("http://localhost:8000/api/pessoas", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(data)
                });
                const result = await response.json();
                this.resposta = result.message;
            } catch (error) {
                console.error("Erro ao enviar os dados:", error);
                this.resposta = "Ocorreu um erro ao enviar os dados.";
            }
        }
    }
}
</script>