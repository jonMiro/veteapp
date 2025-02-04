<script setup>
import Header from '../../Components/Header.vue'; // Importamos el Header
import Footer from '../../Components/Footer.vue'
import { Link } from '@inertiajs/vue3'; // Importamos Link de Inertia.js
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';

defineProps({
  animales: Array,
});
</script>

<template>
  <div>
    <Header /> <!-- Añadimos el Header con clase personalizada -->

    <div class="container mt-5">
      <h2 class="text-center mb-4">Listado de Animales</h2>

    <!--  <div class="text-center mb-4">
        <Link :href="route('animales.create')" class="btn btn-success">Crear Nuevo Animal</Link>
      </div>-->

      <!-- v-if para cuando hay animales -->
      <div v-if="animales.length > 0" class="row g-4">
        <div v-for="animal in animales" :key="animal.id" class="col-lg-3 col-md-6 col-sm-12">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title text-primary">ID Animal: {{ animal.id }}</h5>
              <p class="card-text"><strong>Nombre:</strong> {{ animal.nombre }}</p>
              <p class="card-text"><strong>Tipo:</strong> {{ animal.tipo }}</p>
              <p class="card-text"><strong>Raza:</strong> {{ animal.raza }}</p>
              <p class="card-text"><strong>Fecha Nacimiento:</strong> {{ animal.fechaNacimiento }}</p>
              <p class="card-text"><strong>Cliente:</strong> id: {{ animal.cliente.id }} Nombre: {{ animal.cliente.nombre }} {{ animal.cliente.apellidos }}</p>
              <p class="card-text"><strong>Usuario:</strong> id: {{ animal.usuario.id }} Nombre: {{ animal.usuario ? animal.usuario.nombre : 'No asignado' }} {{ animal.usuario ? animal.usuario.apellido : '' }}</p>
              <img v-if="animal.imagen" :src="animal.imagen" alt="Imagen del animal" class="img-fluid" />
            </div>
            <div class="card-footer bg-white text-center">
              <Link :href="`/animales/${animal.id}`" class="btn btn-primary">Ver detalles</Link>
            </div>
          </div>
        </div>
      </div>

      <!-- v-else para cuando no hay animales -->
      <p v-else class="text-center text-muted">No hay animales registrados.</p>
    </div>

    <Footer/>
  </div>
</template>



<style scoped>
/* Ajuste de altura para que todas las tarjetas sean iguales */
.card {
  transition:none;
}



.card img {
  height: 200px;  /* Establece una altura fija para la imagen */
  object-fit: cover;  /* Asegura que la imagen se recorte proporcionalmente */
  border-radius: 8px;
  margin-bottom: 15px;
}
</style>
