

<!-- https://pt.vuejs.org/tutorial/#step-7 -->

<template>
    <div>
        <form @submit.prevent="Newtext">
            <input type="text" v-model="Text" required placeholder="Digite aqui">
            <button>Salva</button>
        </form>
        <ul>
            <li v-for="simples in completo" :key="simples.id">
                <input type="checkbox" v-model="simples.dote">
                <span :class="{dote: simples.dote}">{{ simples.text }}</span>
                <button @click="Removeritem(simples)">Remover</button>
            </li>
        </ul>
    </div>
</template>

<script>
let id = 0;
export default{
    data(){
        return{
            Text: "",
            completo: [
                {id: id++,text: "primiro texto"}
            ]
        }
    },methods: {
        Newtext(){
            this.completo.push({id: id++, text: this.Text}),
            this.Text = "";
        },
        Removeritem(simples){
            this.completo = this.completo.filter((t) => t != simples)
        }
    }
}
</script>