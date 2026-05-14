<!-- https://academy.especializati.com.br/aula/conectar-laravel-banco-de-dados -->
 <!-- https://pt.vuejs.org/tutorial/#step-10 -->

<template>
  <div id="app">

    <main class="container">

      <section class="hero">
        <span class="tag">CRUD DO KAZUMA</span>

        <h1>
          Sistema
          <span>CRUD</span>
        </h1>

        <p>
          Gerencie usuários, cadastros e informações com uma interface moderna,
          simples e preparada para futuras páginas.
        </p>
      </section>

      <section class="grid">

        <div class="card">
          <div class="icon">📄</div>

          <h2>Listar</h2>

          <p>
            Visualize todos os registros cadastrados no banco de dados.
          </p>
          <a href="/verusuarios">
            <button class="button">
              Entrar
            </button>
          </a>
        </div>


        <div class="card">
          <div class="icon">➕</div>

          <h2>Criar</h2>

          <p>
            Adicione novos usuários ou dados rapidamente.
          </p>
          <a href="/criarusuario">
            <button class="button">
              Entrar
            </button>
          </a>
        </div>


        <div class="card">
          <div class="icon">✏️</div>

          <h2>Editar</h2>

          <p>
            Atualize informações já existentes no sistema.
          </p>
          <a href="/editarusuario">
            <button class="button">
              Entrar
            </button>
          </a>
        </div>


        <div class="card">
          <div class="icon">🗑️</div>

          <h2>Deletar</h2>

          <p>
            Remova registros do banco de forma simples.
          </p>

          <a href="/deletarusuario">  
            <button class="button">
              Entrar
            </button>
          </a>
        </div>

      </section>

    </main>
  </div>
</template>

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
  background: radial-gradient(circle at top, #171726 0%, #09090f 60%);
  min-height: 100%;
  font-family: var(--font);
  overflow-x: hidden;
}

#app {
  width: 100%;
  min-height: 100vh;

  display: flex;
  justify-content: center;
  align-items: center;

  padding: 40px 20px;

  position: relative;
}

.background-glow {
  position: absolute;

  width: 400px;
  height: 400px;

  background: rgba(170, 59, 255, 0.15);

  filter: blur(120px);

  border-radius: 50%;

  top: -100px;
  left: -100px;

  z-index: 0;
}

.background-glow.second {
  top: auto;
  left: auto;
  bottom: -120px;
  right: -120px;
}

.container {
  width: 100%;
  max-width: 100%;

  display: flex;
  flex-direction: column;
  gap: 50px;

  position: relative;
  z-index: 2;
}

.hero {
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

  border: 1px solid rgba(170, 59, 255, 0.3);

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

  text-shadow: 0 0 25px rgba(170, 59, 255, 0.6);
}

.hero p {
  max-width: 700px;

  margin: 0 auto;

  color: var(--text);

  font-size: 18px;

  line-height: 1.7;
}

.grid {
  display: grid;

  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));

  gap: 25px;
}

.card {
  background: var(--card);

  border: 1px solid var(--border);

  border-radius: 28px;

  padding: 35px;

  backdrop-filter: blur(18px);

  box-shadow: var(--shadow);

  transition: 0.35s ease;

  display: flex;
  flex-direction: column;
  gap: 18px;
}

.card:hover {
  transform: translateY(-10px) scale(1.02);

  border-color: rgba(170, 59, 255, 0.5);
}

.icon {
  width: 60px;
  height: 60px;

  border-radius: 18px;

  display: flex;
  justify-content: center;
  align-items: center;

  font-size: 28px;

  background: rgba(170, 59, 255, 0.15);

  color: var(--accent);
}

.card h2 {
  color: var(--title);

  font-size: 28px;
}

.card p {
  color: var(--text);

  line-height: 1.7;
}

.button {
  margin-top: auto;

  border: none;

  background: linear-gradient(135deg, #aa3bff, #7c3aed);

  color: white;

  padding: 14px;

  border-radius: 14px;

  cursor: pointer;

  font-size: 16px;

  transition: 0.3s ease;
}

.button:hover {
  transform: scale(1.03);

  box-shadow: 0 0 20px rgba(170, 59, 255, 0.4);
}

@media (max-width: 768px) {

  .hero h1 {
    font-size: 42px;
  }

  .hero p {
    font-size: 16px;
  }

  .card {
    padding: 25px;
  }
}
</style>