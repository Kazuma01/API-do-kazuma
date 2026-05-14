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

      <!-- Form Card -->
      <section class="form-wrapper">

        <div class="form-card">

          <div class="form-header">
            <h2>Cadastro</h2>
            <p>Preencha os dados abaixo</p>
          </div>

          <form class="form" @submit.prevent="handleSubmit">

            <div class="input-group">
              <label>Nome</label>
              <input v-model="Name" type="text" required placeholder="Digite o nome" />
            </div>

            <div class="input-group">
              <label>Idade</label>
              <input v-model.number="Idade" type="number" required placeholder="Digite a idade" />
            </div>

            <button class="submit-btn" type="submit">
              Criar Usuário
            </button>

          </form>
          <p>{{ resposta }}</p>

        </div>

      </section>

    </main>

  </div>
</template>

<script>
export default{
    data(){
        return{
            Name:"",
            Idade: null,
            resposta: ""
        }
    },
    methods:{
        async handleSubmit(){
            const data = {
                name: this.Name,
                idade: this.Idade
            }
            try {
                const response = await fetch("http://localhost:8000/api/pessoas", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(data)
                });
                const result = await response.json();
                this.resposta = result.message;

                this.Name = "";
                this.Idade = null;

            } catch (error) {
                console.error("Erro ao enviar os dados:", error);
                this.resposta = "Ocorreu um erro ao enviar os dados.";
            }
        }
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
  font-size: 14px;
}

.hero h1 {
  font-size: 64px;
  color: white;
}

.hero h1 span {
  color: var(--accent);
}

.hero p {
  color: var(--text);
}

/* FORM CARD */
.form-wrapper {
  display: flex;
  justify-content: center;
}

.form-card {
  width: 100%;
  max-width: 500px;

  background: linear-gradient(
    180deg,
    rgba(30, 30, 45, 0.95),
    rgba(15, 15, 25, 0.95)
  );

  border: 1px solid rgba(170, 59, 255, 0.2);
  border-radius: 28px;

  padding: 40px;

  box-shadow:
    rgba(170, 59, 255, 0.15) 0 10px 40px,
    rgba(0, 0, 0, 0.4) 0 15px 30px;
}

.form-header {
  text-align: center;
  margin-bottom: 30px;
}

.form-header h2 {
  color: white;
  font-size: 28px;
}

.form-header p {
  color: var(--text);
  font-size: 14px;
}

.form {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.input-group {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.input-group label {
  color: #c084fc;
  font-size: 14px;
}

.input-group input {
  padding: 14px;
  border-radius: 12px;

  border: 1px solid rgba(170, 59, 255, 0.2);
  background: rgba(0, 0, 0, 0.2);

  color: white;
  outline: none;
  transition: .3s;
}

/* Remove arrows from number input */
.input-group input[type="number"] {
  -moz-appearance: textfield;
}

.input-group input[type="number"]::-webkit-outer-spin-button,
.input-group input[type="number"]::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

.input-group input:focus {
  border-color: var(--accent);
  box-shadow: 0 0 15px rgba(170, 59, 255, 0.2);
}

.submit-btn {
  margin-top: 10px;
  padding: 14px;

  border-radius: 14px;
  border: none;

  background: linear-gradient(90deg, #aa3bff, #7c3aed);
  color: white;

  cursor: pointer;
  font-size: 16px;

  transition: .3s;
}

.submit-btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 30px rgba(170, 59, 255, 0.3);
}

@media (max-width: 768px) {
  .hero h1 {
    font-size: 40px;
  }

  .form-card {
    padding: 25px;
  }
}
</style>