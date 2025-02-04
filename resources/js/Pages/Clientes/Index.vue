<script setup>
import Header from '../../Components/Header.vue';
import Footer from '../../Components/Footer.vue'
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';
import {Link} from '@inertiajs/inertia-vue3';

defineProps({
    clientes: Array,
});
</script>

<template>
  <Header />
  <div class="container mt-5">
    <h2 class="text-center mb-4">Listado de Clientes</h2>
    <div class="row">
      <div v-for="cliente in clientes" :key="cliente.id" class="col-md-6 col-lg-4 mb-4">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <p class="mb-2"><strong>ID Cliente:</strong> {{ cliente.id }}</p>
            <p class="mb-2"><strong>Nombre:</strong> {{ cliente.nombre }}, {{ cliente.apellidos }}</p>
            <p class="mb-3"><strong>Email:</strong> {{ cliente.correo }}</p>
            <p class="mb-3"><strong>Telefono:</strong> {{ cliente.telefono }}</p>

          </div>
          <div class="card-footer bg-white text-center">
            <Link :href="`/clientes/${cliente.id}`" class="btn btn-primary">Ver detalles</Link>

          </div>
        </div>
      </div>
    </div>
  </div>
  <Footer/>
</template>

<style scoped>
/* Efecto hover en la tarjeta */
.card {
  transition: none;
}

</style>
