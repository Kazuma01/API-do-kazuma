<template>
  <div id="app">

    <main class="container">

      <!-- Top bar -->
      <section class="top-bar">
        <router-link to="/">
            <button class="back-button">
              ← Voltar
            </button>
        </router-link>

      </section>

      <!-- Hero -->
      <section class="hero">

        <span class="tag">
          NOVO USUÁRIO
        </span>

        <h1>
          Criar
          <span>Usuário</span>
        </h1>

        <p>
          Adicione um novo usuário ao sistema.
        </p>

      </section>

      <!-- GRID -->
      <section class="grid">

        <div class="card">

          <!-- CARD TOP -->
          <div class="card-top">

            <span class="user-id">
              CADASTRO
            </span>

          </div>

          <!-- CARD CENTER -->
          <div class="card-center">

            <div class="avatar">
              {{ Name ? Name.charAt(0) : "U" }}
            </div>

            <h2>
              Novo Usuário
            </h2>

            <p>
              Preencha os dados abaixo
            </p>

            <!-- FORM -->
            <form
              class="form"
              @submit.prevent="handleSubmit"
            >

              <!-- NAME -->
              <div class="input-group">

                <label class="label">
                  Nome
                </label>

                <input
                  v-model="Name"
                  type="text"
                  required
                  placeholder="Digite o nome"
                  class="input"
                />

              </div>

              <!-- AGE -->
              <div class="input-group">

                <label class="label">
                  Idade
                </label>

                <input
                  v-model.number="Idade"
                  type="number"
                  required
                  placeholder="Digite a idade"
                  class="input"
                />

              </div>

              <!-- ACTIONS -->
              <div class="actions">

                <button
                  class="btn btn-primary"
                  type="submit"
                >
                  Criar Usuário
                </button>

              </div>

            </form>

            <!-- RESPONSE -->
            <p
              v-if="resposta"
              class="badge badge-success"
            >
              {{ resposta }}
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
      Name: "",
      Idade: null,
      resposta: ""
    }

  },

  methods: {

    async handleSubmit() {

      const data = {
        name: this.Name,
        idade: this.Idade
      }

      try {

        const response = await fetch(
          "https://api-do-kazuma.onrender.com/api/pessoas",
          {
            method: "POST",
            headers: {
              "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
          }
        )

        const result = await response.json()

        this.resposta =
          result.message || "Usuário criado com sucesso!"

        this.Name = ""
        this.Idade = null

      } catch (error) {

        console.error(
          "Erro ao enviar os dados:",
          error
        )

        this.resposta =
          "Ocorreu um erro ao enviar os dados."

      }
    }
  }
}
</script>