<template>
  <div id="app">

    <div class="background-glow"></div>
    <div class="background-glow second"></div>

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
          CRUD DO KAZUMA
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

        const res = await fetch(
          'http://localhost:8000/api/pessoas'
        )

        if (!res.ok) {
          throw new Error('Erro ao buscar API')
        }

        this.users = await res.json()

      } catch(error) {

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

  --shadow:
    rgba(170, 59, 255, 0.15) 0 10px 40px,
    rgba(0, 0, 0, 0.4) 0 15px 30px;

  --font: system-ui, sans-serif;
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

  position: relative;

  overflow-x: hidden;
}

.container {

  width: 100%;

  min-height: 100vh;

  padding: 40px;

  display: flex;
  flex-direction: column;

  gap: 50px;

  position: relative;

  z-index: 2;
}

.background-glow {

  position: absolute;

  width: 500px;
  height: 500px;

  background:
    rgba(170, 59, 255, 0.15);

  filter: blur(140px);

  border-radius: 50%;

  top: -150px;
  left: -150px;

  z-index: 0;
}

.background-glow.second {

  top: auto;
  left: auto;

  bottom: -150px;
  right: -150px;
}

.top-bar {

  width: 100%;

  display: flex;
  justify-content: flex-start;
}

.back-button {

  border: none;

  background:
    rgba(170, 59, 255, 0.12);

  border:
    1px solid rgba(170, 59, 255, 0.35);

  color: #d8b4fe;

  padding: 14px 22px;

  border-radius: 14px;

  cursor: pointer;

  font-size: 15px;

  transition: .3s;
}

.back-button:hover {

  transform: translateY(-3px);

  background:
    rgba(170, 59, 255, 0.22);
}

.hero {

  width: 100%;

  text-align: center;

  display: flex;
  flex-direction: column;

  gap: 20px;
}

.tag {

  width: fit-content;

  margin: 0 auto;

  padding: 10px 18px;

  border-radius: 999px;

  background: var(--accent-soft);

  border:
    1px solid rgba(170, 59, 255, 0.3);

  color: #d8b4fe;

  font-size: 14px;
}

.hero h1 {

  font-size: 72px;

  color: var(--title);

  line-height: 1;
}

.hero h1 span {

  color: var(--accent);

  text-shadow:
    0 0 25px rgba(170, 59, 255, 0.6);
}

.hero p {

  color: var(--text);

  font-size: 18px;
}

.grid {

  width: 100%;

  display: grid;

  grid-template-columns:
    repeat(auto-fit, minmax(300px, 1fr));

  gap: 30px;
}

.card {

  position: relative;

  overflow: hidden;

  background:
    linear-gradient(
      180deg,
      rgba(30, 30, 45, 0.95),
      rgba(15, 15, 25, 0.95)
    );

  border:
    1px solid rgba(170, 59, 255, 0.2);

  border-radius: 28px;

  padding: 30px;

  min-height: 300px;

  transition: .35s ease;

  display: flex;
  flex-direction: column;
}

.card::before {

  content: '';

  position: absolute;

  top: 0;
  left: 0;

  width: 100%;
  height: 6px;

  background:
    linear-gradient(
      90deg,
      #aa3bff,
      #7c3aed
    );
}

.card:hover {

  transform:
    translateY(-8px);

  box-shadow:
    0 0 30px rgba(170, 59, 255, 0.2);
}

.card-top {

  display: flex;
  justify-content: flex-end;
}

.user-id {

  background:
    rgba(170, 59, 255, 0.12);

  color: #c084fc;

  padding: 8px 14px;

  border-radius: 999px;

  font-size: 14px;
}

.card-center {

  flex: 1;

  display: flex;
  flex-direction: column;

  justify-content: center;
  align-items: center;

  gap: 18px;
}

.avatar {

  width: 110px;
  height: 110px;

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

  font-size: 46px;
  font-weight: bold;

  color: white;

  box-shadow:
    0 0 25px rgba(170, 59, 255, 0.35);
}

.card-center h2 {

  color: white;

  font-size: 32px;
}

.card-center p {

  color: #b8b8c7;

  font-size: 18px;
}

@media (max-width: 768px) {

  .container {

    padding: 20px;
  }

  .hero h1 {

    font-size: 42px;
  }

  .hero p {

    font-size: 16px;
  }

  .grid {

    grid-template-columns: 1fr;
  }

  .card {

    min-height: 250px;
  }
}

</style>