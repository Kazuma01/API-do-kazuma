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
          EDITAR USUÁRIOS
        </span>

        <h1>
          Atualizar
          <span>Dados</span>
          de Usuários
        </h1>

        <p>
          Atualize os dados dos usuários cadastrados.
        </p>

      </section>

      <!-- GRID -->
      <section class="grid">

        <div
          class="card"
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
              Atualize as informações
            </p>

            <!-- FORM -->
            <form
              class="form"
              @submit.prevent="updateUser(user)"
            >

              <!-- NAME -->
              <div class="input-group">

                <label class="label">
                  Nome
                </label>

                <input
                  class="input"
                  type="text"
                  v-model="user.name"
                  placeholder="Digite o nome"
                />

              </div>

              <!-- AGE -->
              <div class="input-group">

                <label class="label">
                  Idade
                </label>

                <input
                  class="input"
                  type="number"
                  v-model.number="user.idade"
                  placeholder="Digite a idade"
                />

              </div>

              <!-- ACTION -->
              <div class="actions">

                <button
                  class="btn btn-primary"
                  type="submit"
                >
                  Atualizar Usuário
                </button>

              </div>

            </form>

            <!-- RESPONSE -->
            <p
              v-if="user.resposta"
              class="badge badge-success"
            >
              {{ user.resposta }}
            </p>

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

    async updateUser(user) {

      try {

        const response = await fetch(
          `https://api-do-kazuma.onrender.com/api/pessoas/${user.id}`,
          {

            method: "PUT",

            headers: {
              "Content-Type": "application/json"
            },

            body: JSON.stringify({

              name: user.name,
              idade: user.idade

            })

          }
        )

        const data = await response.json()

        user.resposta =
          data.message || "Usuário atualizado!"

      } catch (error) {

        console.log(error)

        user.resposta =
          "Erro ao atualizar usuário"

      }

    }

  },

  mounted() {

    this.fetchUsers()

  }

}
</script>