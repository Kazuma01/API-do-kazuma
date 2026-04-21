<template>
    <div>
        <h1>tabela de dados</h1>
        <table border = "1">
            <thead>
                <tr>
                    <th>Palavas</th>
                    <th>Numeros</th>
                </tr>
            </thead>    
            <tbody>
                <tr v-for="(item,index) in ListaDDB" :key="index">
                    <td>{{ item.Palavas }}</td>
                    <td>{{ item.Numeros }}</td>
                </tr>
            </tbody>
        </table>
        
        <button @click="ADD_dados">ADDress</button>
    </div>
    
</template>
<script>
export default{
    data(){
        return{
            ListaDDB: [
                { Palavas: "kazuma", Numeros: 265543},
                { Palavas: "kazuma", Numeros: 123678},
                { Palavas: "kazuma", Numeros: 126583},
                { Palavas: "kazuma", Numeros: 125123}
            ]
        }
    },
    methods: {
        ADD_dados(){
            this.ListaDDB.push({Palavas: "Kazua", Numeros: 123244})
        }
    }
}
</script>