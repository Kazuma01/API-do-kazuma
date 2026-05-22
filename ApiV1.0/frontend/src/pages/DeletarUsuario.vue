<template>
  <div id="app">

    <main class="container">

      <!-- TOP BAR -->
      <section class="top-bar">

        <router-link to="/">
            <button class="back-button">
              ← Voltar
            </button>
        </router-link>

      </section>

      <!-- HERO -->
      <section class="hero">

        <span class="tag">
          DELETAR USUÁRIO
        </span>

        <h1>
          Remover
          <span>Usuário</span>
        </h1>

        <p>
          Remova usuários cadastrados do sistema.
        </p>

      </section>

      <!-- GRID -->
      <section class="grid">

        <div
          class="card"
          v-for="user in users"
          :key="user.id"
        >

          <!-- TOP -->
          <div class="card-top">

            <span class="user-id">
              #{{ user.id }}
            </span>

          </div>

          <!-- CENTER -->
          <div class="card-center">

            <div class="avatar">
              {{ user.name.charAt(0) }}
            </div>

            <h2>
              {{ user.name }}
            </h2>

            <p>
              {{ user.idade }} anos
            </p>

            <div class="actions">

              <button
                class="btn btn-danger"
                @click="deleteUser(user.id)"
              >
                Deletar Usuário
              </button>

            </div>

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

      users: []

    }

  },

  methods: {

    async fetchUsers() {

      try {

        const response = await fetch(
          "https://api-do-kazuma.onrender.com/api/pessoas"
        )

        const data = await response.json()

        this.users = data

      } catch (error) {

        console.log(error)

      }

    },

    async deleteUser(id) {

      try {

        const response = await fetch(
          `https://api-do-kazuma.onrender.com/api/pessoas/${id}`,
          {
            method: "DELETE"
          }
        )

        if (!response.ok) {

          throw new Error(
            "Erro ao deletar usuário"
          )

        }

        this.users =
          this.users.filter(
            user => user.id !== id
          )

      } catch (error) {

        console.log(error)

      }

    }

  },

  mounted() {

    this.fetchUsers()

  }

}
</script>