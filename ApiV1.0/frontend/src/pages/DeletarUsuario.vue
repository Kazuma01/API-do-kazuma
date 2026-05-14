<template>
  <div id="app">

    <main class="container">

      <!-- Top bar -->
      <section class="top-bar">
        <a href="/">
          <button class="back-button">
            ← Voltar
          </button>
        </a>
      </section>

      <!-- Hero -->
      <section class="hero">

        <span class="tag">
          GERENCIAR USUÁRIOS
        </span>

        <h1>
          Lista de
          <span>Usuários</span>
        </h1>

        <p>
          Visualize e remova usuários do sistema.
        </p>

      </section>

      <!-- GRID -->
      <section class="grid">

        <div class="card" v-for="user in users" :key="user.id">

          <div class="card-top">
            <span class="user-id">#{{ user.id }}</span>
          </div>

          <div class="card-center">

            <div class="avatar">
              {{ user.name.charAt(0) }}
            </div>

            <h2>{{ user.name }}</h2>

            <p>{{ user.idade }} anos</p>

            <button class="delete-btn" @click="deleteUser(user.id)">
              Deletar
            </button>

          </div>

        </div>

      </section>

    </main>

  </div>
</template>

<script>
export default {
  data() {
    return {
      users: [],
    }
  },

  methods: {

    async fetchUsers() {
      try {
        const res = await fetch("http://localhost:8000/api/pessoas")

        if (!res.ok) throw new Error("Erro ao buscar usuários")

        this.users = await res.json()

      } catch (err) {
        console.error(err)
      }
    },

    async deleteUser(id) {
      try {
        const res = await fetch(
          `http://localhost:8000/api/pessoas/${id}`,
          {
            method: "DELETE"
          }
        )

        if (!res.ok) throw new Error("Erro ao deletar")


        // remove do front sem recarregar
        this.users = this.users.filter(u => u.id !== id)

      } catch (err) {
        console.error(err)
      }
    }
  },

  mounted() {
    this.fetchUsers()
  }
}
</script>

<style>
.delete-btn {
    margin-top: 15px;
    padding: 10px 16px;
    
    border: 1px solid rgba(255, 80, 80, 0.3);
  background: rgba(255, 80, 80, 0.1);
  
  color: #ff6b6b;

  border-radius: 12px;
  cursor: pointer;
  
  transition: .3s;
}

.delete-btn:hover {
    background: rgba(255, 80, 80, 0.25);
    transform: translateY(-3px);
}
</style>