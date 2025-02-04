<template>
    <header class="bg-dark text-light py-4 mb-5">
      <div class="container d-flex justify-content-between align-items-center px-0">
        <!-- Logo más pequeño y movido hacia la izquierda -->
        <img src="/images/logoPet.png" alt="Logo" class="img-fluid logo">

        <div class="d-flex align-items-center">
          <h1 class="me-3 display-5">
            <Link href="/" class="text-light text-decoration-none">Pelopicopata</Link>
          </h1>
        </div>

        <!-- Enlace de login movido más a la derecha -->
        <div class="mb-3 login-container">
          <a href="#" class="btn btn-outline-light">Iniciar sesión</a>
        </div>
      </div>
      <!-- Menú de navegación en fila -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-secondary custom-nav">
        <div class="container-fluid">
          <ul class="navbar-nav d-flex flex-row justify-content-center w-100">
            <li class="nav-item"><Link href="/usuarios" class="nav-link">Usuarios</Link></li>
            <li class="nav-item"><Link href="/clientes" class="nav-link">Clientes</Link></li>
            <li class="nav-item"><Link href="/animales" class="nav-link">Animales</Link></li>
          </ul>
        </div>
      </nav>
    </header>
  </template>

  <script setup>
  import { Link } from '@inertiajs/vue3'; // Importa el componente Link
  </script>

  <style scoped>
  /* Estilo para el logo, tamaño más pequeño */
  .logo {
    max-width: 100px; /* Reducir el tamaño */
    margin-left: -0px; /* Asegura que el logo esté más cerca del borde izquierdo */
    margin-right: 20px;
    margin-bottom: 20px;
  }

  /* Centrado del contenido dentro del header */
  header .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .header{
      margin-bottom: 200px;
  }

  /* Ajuste para mover el login más a la derecha */
  .login-container {
    margin-left: auto; /* Esto mueve el contenedor de login hacia la derecha */
  }

  /* Estilo para el fondo gris del navbar */
  .custom-nav {
    background-color: #6c757d !important; /* Fondo gris oscuro */
  }

  /* Asegurar que los enlaces del navbar se muestren en fila */
  .navbar-nav {
    justify-content: center;
    width: 100%;
  }

  /* Estilos para los elementos del navbar */
  .nav-item {
    margin-left: 20px;
    margin-right: 20px;
  }

  /* Estilos para los enlaces del navbar */
  .navbar-nav .nav-link {
    color: #fff !important; /* Color blanco para el texto */
  }

  .navbar-nav .nav-link:hover {
    color: #007bff !important; /* Color azul al pasar el mouse */
  }

  /* Para mejorar el diseño del navbar y centrar los elementos */
  .navbar-nav.d-flex {
    display: flex;
    justify-content: center;
    width: 100%;
  }
  </style>
