<template>
    <footer class="bg-dark text-light py-4 mt-5">
      <div class="container text-center px-0">
        <p class="m-0">Clinica Animal 2025 @Pelopicopata</p>
      </div>
    </footer>
  </template>

  <script setup>

  </script>

  <style scoped>
  /* Estilos para el pie de página */
  footer {
    background-color: #343a40; /* Color negro apagado similar al del header */
  }

  footer .container {
    display: block; /* Para asegurar que el contenedor no tenga display:flex */
    text-align: center; /* Centramos el texto */
  }

  footer p {
    margin: 0;
    font-size: 1rem;
  }

  footer .text-light {
    color: #f8f9fa !important; /* Color de texto claro */
  }

  footer .text-light:hover {
    color: #007bff !important; /* Color azul al pasar el mouse */
  }

  /* Espaciado entre los enlaces en el footer */
  footer .me-3 {
    margin-right: 1rem;
  }
  </style>
