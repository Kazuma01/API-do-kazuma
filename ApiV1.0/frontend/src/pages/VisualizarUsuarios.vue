<template>
  <div id="app">
    <main class="container">

      <section class="top-bar">
        <a href="/">
          <button class="back-button">
            ← Voltar
          </button>
        </a>
      </section>

      <section class="hero">
        <span class="tag">
          Lista Usuários
        </span>

        <h1>
          Usuários
          <span>CRUD</span>
        </h1>

        <p>
          Visualização futurística dos usuários cadastrados.
        </p>
      </section>

      <section class="grid">

        <div
          class="card"
          v-for="user in users"
          :key="user.id"
        >

          <div class="card-top">
            <span class="user-id">
              #{{ user.id }}
            </span>
          </div>

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
        const res = await fetch('http://localhost:8000/api/pessoas')

        if (!res.ok) {
          throw new Error('Erro ao buscar API')
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

<style>
:root {
  --text: #b8b8c7;
  --title: #ffffff;
  --bg: #09090f;
  --card: rgba(18, 18, 28, 0.8);
  --border: rgba(255, 255, 255, 0.08);
  --accent: #aa3bff;
  --accent-soft: rgba(170, 59, 255, 0.12);
  --font: system-ui, sans-serif;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  background: radial-gradient(circle at top, #171726 0%, #09090f 60%);
  min-height: 100vh;
  font-family: var(--font);
}

#app {
  min-height: 100vh;
}

.container {
  padding: 40px;
  display: flex;
  flex-direction: column;
  gap: 50px;
}

.top-bar {
  display: flex;
}

.back-button {
  background: rgba(170, 59, 255, 0.12);
  border: 1px solid rgba(170, 59, 255, 0.35);
  color: #d8b4fe;
  padding: 14px 22px;
  border-radius: 14px;
  cursor: pointer;
  transition: .3s;
}

.back-button:hover {
  transform: translateY(-3px);
}

.hero {
  text-align: center;
}

.tag {
  padding: 10px 18px;
  border-radius: 999px;
  background: var(--accent-soft);
  color: #d8b4fe;
}

.hero h1 {
  font-size: 72px;
  color: white;
}

.hero h1 span {
  color: var(--accent);
}

.hero p {
  color: var(--text);
}

.grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
  align-items: stretch;
}

/* ✅ AQUI está o segredo */
.card {
  height: 360px;
  background: linear-gradient(180deg, rgba(30, 30, 45, 0.95), rgba(15, 15, 25, 0.95));
  border: 1px solid rgba(170, 59, 255, 0.2);
  border-radius: 28px;
  padding: 30px;

  display: flex;
  flex-direction: column;
  justify-content: space-between;

  transition: .3s;
}

.card:hover {
  transform: translateY(-8px);
}

.card-top {
  display: flex;
  justify-content: flex-end;
}

.user-id {
  background: rgba(170, 59, 255, 0.12);
  color: #c084fc;
  padding: 8px 14px;
  border-radius: 999px;
}

.card-center {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 18px;
}

.avatar {
  width: 110px;
  height: 110px;
  border-radius: 50%;
  background: linear-gradient(135deg, #aa3bff, #7c3aed);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 46px;
  color: white;
}

.card-center h2 {
  color: white;
  font-size: 28px;
  text-align: center;

  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 100%;
}

.card-center p {
  color: var(--text);
}
</style>