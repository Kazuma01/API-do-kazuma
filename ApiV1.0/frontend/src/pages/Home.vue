<template>
  <div id="app">

    <main class="container">

      <!-- HERO -->
      <section class="hero">

        <span class="tag">
          CRUD DO KAZUMA
        </span>

        <h1>
          Sistema
          <span>CRUD</span>
        </h1>

        <p>
          Gerencie usuários, cadastros e informações
          com uma interface moderna, simples
          e preparada para futuras páginas.
        </p>

      </section>

      <!-- GRID -->
      <section class="grid">

        <!-- LISTAR -->
        <div class="card card-hover">

          <div class="card-center">

            <div class="avatar">
              📄
            </div>

            <h2>
              Listar
            </h2>

            <p>
              Visualize todos os registros
              cadastrados no banco de dados.
            </p>

            <div class="actions">
              <router-link to="/verusuarios">                  
                  <button class="btn btn-primary">
                    Entrar
                  </button>
              </router-link>

            </div>

          </div>

        </div>

        <!-- CRIAR -->
        <div class="card card-hover">

          <div class="card-center">

            <div class="avatar">
              ➕
            </div>

            <h2>
              Criar
            </h2>

            <p>
              Adicione novos usuários
              ou dados rapidamente.
            </p>

            <div class="actions">

              <router-link to="/criarusuario">
                  <button class="btn btn-primary">
                    Entrar
                  </button>
              </router-link>

            </div>

          </div>

        </div>

        <!-- EDITAR -->
        <div class="card card-hover">

          <div class="card-center">

            <div class="avatar">
              ✏️
            </div>

            <h2>
              Editar
            </h2>

            <p>
              Atualize informações
              já existentes no sistema.
            </p>

            <div class="actions">

              <router-link to="/editarusuario">  
                <button class="btn btn-primary">
                  Entrar
                </button>
              </router-link>
                
            </div>

          </div>

        </div>

        <!-- DELETAR -->
        <div class="card card-hover">

          <div class="card-center">

            <div class="avatar">
              🗑️
            </div>

            <h2>
              Deletar
            </h2>

            <p>
              Remova registros do banco
              de forma simples.
            </p>

            <div class="actions">

              <router-link to="/deletarusuario">
                  <button class="btn btn-danger">
                    Entrar
                  </button>
              </router-link>

            </div>

          </div>

        </div>

      </section>

    </main>

  </div>
</template>