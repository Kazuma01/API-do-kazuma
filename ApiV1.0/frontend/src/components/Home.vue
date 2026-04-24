<script>
export default{
    data(){
        return{
            text: "KazuArch",
            Text_com_red: "text_red",
            contar: 0,
            texto: ""
        }
    },
    methods:{
        Update(){
            this.contar++,
            this.text = "Arch Linux",
            this.Text_com_red = "text_blue"
        },
    }
}

</script>

<template>
    <div>
        <h1 :class="Text_com_red">{{ text }}</h1>
        <button @click="Update">mudou? {{ contar }}</button><br>
        <input v-model="texto" placeholder="Digite aqui">
        <p>{{ texto}}</p>
    </div>
</template>

<style>
.text_red{
    color: blue;
}
.text_blue{
    color: red;
}
</style>