<template>
  <button @click="contador++">Click {{ contador }}</button>
</template>

<script>
export default{
  data(){
    return{
      contador: 0
    }
  }
}

</script>