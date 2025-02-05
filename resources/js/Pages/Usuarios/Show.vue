<script setup>
import Header from '../../Components/Header.vue';
import Footer from '../../Components/Footer.vue';
import { Link } from '@inertiajs/inertia-vue3';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';

defineProps({
  usuario: Object,
});
</script>

<template>
  <Header />
  <div class="container mt-5">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
      <div class="card-header bg-primary text-white text-center">
        <h2 class="mb-0">Detalles del Usuario</h2>
      </div>
      <div class="card-body">
        <p class="mb-2"><strong>ID:</strong> {{ usuario.id }}</p>
        <p class="mb-2"><strong>Nombre:</strong> {{ usuario.nombre }}</p>
        <p class="mb-2"><strong>Apellidos:</strong> {{ usuario.apellidos }}</p>
        <p class="mb-2"><strong>Dirección:</strong> {{ usuario.direccion }}</p>
        <p class="mb-2"><strong>Teléfono:</strong> {{ usuario.telefono }}</p>
        <p class="mb-3"><strong>Correo:</strong> {{ usuario.correo }}</p>

        <div class="d-flex justify-content-center gap-3">
            <Link :href="route('usuarios.edit', usuario.id)" class="btn btn-warning">Editar</Link>
         <!-- Botón de eliminar con método DELETE -->
         <Link :href="`/usuarios/${usuario.id}`" class="btn btn-danger" method="DELETE">Eliminar</Link>
         <Link href="/usuarios" class="btn btn-secondary">Volver</Link>
        </div>
      </div>
    </div>
  </div>
  <Footer />
</template>

<style scoped>
/* Eliminar el efecto de movimiento en la tarjeta al hacer clic */
.card {
  transition: none;
}

/* Estilo para los botones de editar y eliminar dentro de la tarjeta */
.d-flex {
  gap: 10px;
}

/* Botones de editar, eliminar y volver */
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
  cursor: not-allowed;
}

.btn-danger:disabled {
  background-color: #c82333;
  opacity: 0.65;
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
