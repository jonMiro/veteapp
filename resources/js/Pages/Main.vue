<template>
    <div>
      <!-- Incluye el componente Header -->
      <Header />

      <!-- Contenido principal -->
      <div class="mainContent">
        <h1>Bienvenido a la página principal</h1>
        <p>Elige una de las opciones del menú para continuar.</p>
      </div>

    </div>
    <Footer />
  </template>

  <script>
  import Header from '../Components/Header.vue';
  import Footer from '../Components/Footer.vue';
  import 'bootstrap/dist/css/bootstrap.min.css';
  import 'bootstrap';

  export default {
    name: "Main",
    components: {
      Header,
      Footer,
    },
  };
  </script>

  <style scoped>
  /* Estilos para el contenido principal */
  .mainContent {
    text-align: center;
    margin-top: 40px;
  }
  </style>
