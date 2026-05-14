<template>
  <div id="app">

    <main class="container">

      <!-- TOPO -->
      <section class="top-bar">

        <a href="/">
          <button class="back-button">
            ← Voltar
          </button>
        </a>

      </section>

      <!-- HERO -->
      <section class="hero">

        <span class="tag">
          EDITAR USUÁRIOS
        </span>

        <h1>
          Atualizar
          <span>Pessoas</span>
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

          <!-- ID -->
          <div class="card-top">

            <span class="user-id">
              #{{ user.id }}
            </span>

          </div>

          <!-- CONTEÚDO -->
          <div class="card-center">

            <div class="avatar">
              {{ user.name.charAt(0) }}
            </div>

            <!-- NOME -->
            <div class="input-group">

              <label>
                Nome
              </label>

              <input
                type="text"
                v-model="user.name"
                placeholder="Digite o nome"
              />

            </div>

            <!-- IDADE -->
            <div class="input-group">

              <label>
                Idade
              </label>

              <input
                type="number"
                v-model.number="user.idade"
                placeholder="Digite a idade"
              />

            </div>

            <!-- BOTÃO -->
            <button
              class="save-btn"
              @click="updateUser(user)"
            >
              Atualizar Usuário
            </button>
            <p class="response">
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

      users: [],
      resposta: ""

    }

  },

  methods: {

    async fetchUsers() {

      try {

        const response = await fetch(
          "http://localhost:8000/api/pessoas"
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
          `http://localhost:8000/api/pessoas/${user.id}`,
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

        user.resposta = data.message

      } catch (error) {

        console.log(error)

        user.resposta ="Erro ao atualizar usuário"

      }

    }

  },

  mounted() {

    this.fetchUsers()

  }

}
</script>

<style>
:root {

  --text: #b8b8c7;
  --title: #ffffff;

  --bg: #09090f;

  --accent: #aa3bff;

  --accent-soft:
    rgba(170, 59, 255, 0.12);

  --font:
    system-ui, sans-serif;

}

* {

  margin: 0;
  padding: 0;

  box-sizing: border-box;

}

body {

  background:
    radial-gradient(
      circle at top,
      #171726 0%,
      #09090f 60%
    );

  min-height: 100vh;

  font-family: var(--font);

  overflow-x: hidden;

}

#app {

  width: 100%;

  min-height: 100vh;

}

.container {

  width: 100%;

  min-height: 100vh;

  padding: 30px;

  display: flex;
  flex-direction: column;

  gap: 40px;

}

/* TOPO */

.top-bar {

  display: flex;

}

.back-button {

  border: none;

  background:
    rgba(170, 59, 255, 0.12);

  border:
    1px solid rgba(170, 59, 255, 0.35);

  color: #d8b4fe;

  padding: 12px 20px;

  border-radius: 14px;

  cursor: pointer;

  transition: .3s;

}

.back-button:hover {

  transform:
    translateY(-3px);

}

/* HERO */

.hero {

  text-align: center;

  display: flex;
  flex-direction: column;

  gap: 16px;

}

.tag {

  width: fit-content;

  margin: 0 auto;

  padding: 8px 16px;

  border-radius: 999px;

  background:
    var(--accent-soft);

  color: #d8b4fe;

  font-size: 13px;

}

.hero h1 {

  font-size: 58px;

  color: white;

  line-height: 1;

}

.hero h1 span {

  color: var(--accent);

}

.hero p {

  color: var(--text);

  font-size: 16px;

}

/* GRID */

.grid {

  width: 100%;

  display: grid;

  grid-template-columns:
    repeat(auto-fit, minmax(280px, 1fr));

  gap: 24px;

}

/* CARD */

.card {

  height: fit-content;


  background:
    linear-gradient(
      180deg,
      rgba(30, 30, 45, 0.95),
      rgba(15, 15, 25, 0.95)
    );

  border:
    1px solid rgba(170, 59, 255, 0.2);

  border-radius: 24px;

  padding: 22px;

  transition: .3s;

}

.card:hover {

  transform:
    translateY(-5px);

  box-shadow:
    0 0 25px rgba(170, 59, 255, 0.2);

}

.card-top {

  display: flex;
  justify-content: flex-end;

}

.user-id {

  background:
    rgba(170, 59, 255, 0.12);

  color: #c084fc;

  padding: 6px 12px;

  border-radius: 999px;

  font-size: 13px;

}

/* CENTRO */

.card-center {

  margin-top: 18px;

  width: 100%;

  display: flex;
  flex-direction: column;

  align-items: center;

  gap: 16px;

}

/* AVATAR */

.avatar {

  width: 75px;
  height: 75px;

  border-radius: 50%;

  background:
    linear-gradient(
      135deg,
      #aa3bff,
      #7c3aed
    );

  display: flex;
  justify-content: center;
  align-items: center;

  font-size: 28px;
  font-weight: bold;

  color: white;

}

/* INPUTS */

.input-group {

  width: 100%;

  display: flex;
  flex-direction: column;

  gap: 6px;

}

.input-group label {

  color: #c084fc;

  font-size: 13px;

}

.input-group input {

  width: 100%;

  padding: 12px;

  border-radius: 12px;

  border:
    1px solid rgba(170, 59, 255, 0.2);

  background:
    rgba(0, 0, 0, 0.2);

  color: white;

  outline: none;

  transition: .3s;

  font-size: 14px;

}

.input-group input:focus {

  border-color: var(--accent);

  box-shadow:
    0 0 12px rgba(170, 59, 255, 0.2);

}

/* REMOVE SETAS */

input[type="number"] {

  -moz-appearance: textfield;

}

input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {

  -webkit-appearance: none;

  margin: 0;

}

/* BOTÃO */

.save-btn {

  width: 100%;

  margin-top: 6px;

  padding: 12px;

  border-radius: 12px;

  border: none;

  background:
    linear-gradient(
      90deg,
      #aa3bff,
      #7c3aed
    );

  color: white;

  cursor: pointer;

  font-size: 14px;

  transition: .3s;

}

.save-btn:hover {

  transform:
    translateY(-2px);

  box-shadow:
    0 8px 20px rgba(170, 59, 255, 0.3);

}

/* RESPOSTA */

.response {

  text-align: center;

  color: #d8b4fe;

  font-size: 16px;

}

/* MOBILE */

@media (max-width: 768px) {

  .container {

    padding: 18px;

  }

  .hero h1 {

    font-size: 38px;

  }

  .grid {

    grid-template-columns: 1fr;

  }

}
</style>