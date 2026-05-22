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
          LISTA USUÁRIOS
        </span>

        <h1>
          Usuários
          <span>CRUD</span>
        </h1>

        <p>
          Visualização futurística
          dos usuários cadastrados.
        </p>

      </section>

      <!-- GRID -->
      <section class="grid">

        <div
          class="card card-hover"
          v-for="user in users"
          :key="user.id"
        >

          <!-- CARD TOP -->
          <div class="card-top">

            <span class="user-id">
              #{{ user.id }}
            </span>

          </div>

          <!-- CARD CENTER -->
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

              <span class="badge badge-success">
                Ativo
              </span>

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

        const res = await fetch(
          "https://api-do-kazuma.onrender.com/api/pessoas"
        )

        if (!res.ok) {

          throw new Error(
            "Erro ao buscar API"
          )

        }

        this.users = await res.json()

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