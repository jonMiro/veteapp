<script setup>
import Header from '../../Components/Header.vue'; // Importamos el Header
import Footer from '../../Components/Footer.vue'
import { Link } from '@inertiajs/vue3'; // Importamos Link de Inertia.js
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';

defineProps({
  servicios: Array,
});
</script>

<template>
  <div>
    <Header /> <!-- Añadimos el Header con clase personalizada -->

    <div class="container mt-5">
      <h2 class="text-center mb-4">Listado de Servicios</h2>

      <!-- Botón para crear un nuevo servicio -->
      <div class="text-center mb-4">
        <Link :href="route('servicios.create')" class="btn btn-success">Crear Nuevo Servicio</Link>
      </div>

      <!-- v-if para cuando hay servicios -->
      <div v-if="servicios.length > 0" class="row g-4">
        <div v-for="servicio in servicios" :key="servicio.id" class="col-lg-3 col-md-6 col-sm-12">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title text-primary">ID Servicio: {{ servicio.id }}</h5>
              <p class="card-text"><strong>Tipo:</strong> {{ servicio.tipo }}</p>
              <p class="card-text"><strong>Motivo:</strong> {{ servicio.motivo }}</p>
              <p class="card-text"><strong>Animal:</strong> {{ servicio.animal.nombre }}</p>
              <p class="card-text"><strong>Cliente:</strong> {{ servicio.cliente.nombre }} {{ servicio.cliente.apellidos }}</p>
              <p class="card-text"><strong>Usuario:</strong> {{ servicio.usuario ? servicio.usuario.nombre : 'No asignado' }}</p>
              <p class="card-text"><strong>Precio:</strong> {{ servicio.precio }} €</p>
              <p class="card-text"><strong>Duración:</strong> {{ servicio.duracion }} min</p>
            </div>
            <div class="card-footer bg-white text-center">
                <Link :href="route('servicios.show', servicio.id)" class="btn btn-primary">Mostrar</Link>
            </div>
          </div>
        </div>
      </div>

      <!-- v-else para cuando no hay servicios -->
      <p v-else class="text-center text-muted">No hay servicios registrados.</p>
    </div>

    <Footer/>
  </div>
</template>

<style scoped>
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
