<template>
  <div>
    <h1>{{Mensagen}}</h1>
    <Button @click = "buscar">Buscar na api</Button>
  </div>
</template>

<script>
export default{
  data(){
    return{
      Mensagen:" click no buttonnnn"
    }
  }, methods: {
    async buscar(){
      try {
        const resposta = await fetch("http://localhost:8080/")
        const data = await resposta.json()
        this.Mensagen = data.Mensagen
        
      } catch (e) {
        console.error(e)
        this.Mensagen = "Erro de requisição"
      }
    }
  }
}
</script>     