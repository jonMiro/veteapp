<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import Header from '../../Components/Header.vue';
import Footer from '../../Components/Footer.vue';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';

defineProps({
    servicio: Object,
});
</script>

<template>
  <Header />
  <div v-if="servicio" class="container mt-5">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
      <div class="card-header bg-primary text-white text-center">
        <h2 class="mb-0">Detalles del Servicio</h2>
      </div>
      <div class="card-body">
        <p class="mb-2"><strong>ID Servicio:</strong> {{ servicio.id }}</p>
        <p class="mb-2"><strong>Tipo:</strong> {{ servicio.tipo }}</p>
        <p class="mb-2"><strong>Motivo:</strong> {{ servicio.motivo }}</p>
        <p class="mb-2"><strong>Animal:</strong> {{ servicio.animal.nombre }}</p>
        <p class="mb-2"><strong>Cliente:</strong> {{ servicio.cliente.nombre }} {{ servicio.cliente.apellidos }}</p>
        <p class="mb-2"><strong>Usuario:</strong> {{ servicio.usuario ? servicio.usuario.nombre : 'No asignado' }}</p>
        <p class="mb-2"><strong>Precio:</strong> {{ servicio.precio }} €</p>
        <p class="mb-2"><strong>Duración:</strong> {{ servicio.duracion }} min</p>

        <!-- Botones de editar, eliminar y volver dentro de la tarjeta -->
        <div class="d-flex justify-content-center gap-3 mt-4">
            <Link :href="route('servicios.edit', servicio.id)" class="btn btn-warning">Editar</Link>
            <!-- Enlace de eliminar con método DELETE -->
            <Link :href="`/servicios/${servicio.id}`" class="btn btn-danger" method="DELETE">Eliminar</Link>

            <Link href="/servicios" class="btn btn-secondary">Volver</Link>
        </div>
      </div>
    </div>
  </div>
  <p v-else>Cargando...</p>
  <Footer/>
</template>

<style scoped>
.card {
  transition: none;
}

.d-flex {
  gap: 10px;
}

.btn-warning, .btn-danger, .btn-secondary {
  font-weight: 600;
  padding: 8px 16px;
  text-decoration: none;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

.btn-warning {
  background-color: #ffc107;
}

.btn-warning:hover {
  background-color: #e0a800;
}

.btn-danger {
  background-color: #dc3545;
}

.btn-danger:hover {
  background-color: #c82333;
}

.btn-secondary {
  background-color: #6c757d;
  color: white;
}

.btn-secondary:hover {
  background-color: #5a6268;
}
</style>
