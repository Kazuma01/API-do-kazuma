<template>

  <div>
    <h1>{{ mensagem }}</h1>
    <button @click="buscar">Buscar API</button>
  </div>

</template>

<script>
export default{
  data(){
    return{
      mensagem:"Click no button"
    }
  },
  methods:{
    async buscar(){
      try{
        const resposta = await fetch("http://localhost:8080/")
        const data = await resposta.json()
        this.mensagem = data.mensagem
      }catch(e){
        console.error(e)
        this.mensagem = "Erro de requisição"
      }
    }
  }
}

</script>