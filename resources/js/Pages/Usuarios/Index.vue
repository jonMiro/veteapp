<script setup>
import Header from '../../Components/Header.vue';
import Footer from '../../Components/Footer.vue';
import { Link } from '@inertiajs/vue3';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';

defineProps({
    usuarios: Array,
});
</script>

<template>
  <Header />
  <div class="container mt-5">
    <div>
        <Link href="/usuarios/create">Crear Usuario</Link>
    </div>

    <h2 class="text-center mb-4">Listado de Usuarios</h2>

    <div v-if="usuarios.length > 0" class="row g-4">
      <div v-for="usuario in usuarios" :key="usuario.id" class="col-lg-3 col-md-6 col-sm-12">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title text-primary">ID: {{ usuario.id }}</h5>
            <p class="card-text"><strong>Nombre:</strong> {{ usuario.nombre }}</p>
            <p class="card-text"><strong>Correo:</strong> {{ usuario.correo }}</p>
          </div>
          <div class="card-footer bg-white text-center">
            <Link :href="`/usuarios/${usuario.id}`" class="btn btn-primary">Ver detalles</Link>
          </div>
        </div>
      </div>
    </div>

    <p v-else class="text-center text-muted">No hay usuarios registrados.</p>
  </div>
  <Footer />
</template>

<style scoped>
/* Ajuste de altura para que todas las tarjetas sean iguales */
.card {
  transition: transform 0.3s ease-in-out;
}

.card:hover {
  transform: translateY(-5px);
}
</style>
