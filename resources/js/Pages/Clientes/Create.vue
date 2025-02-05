<script setup>
import Header from '../../Components/Header.vue';
import Footer from '../../Components/Footer.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';

// Definir el formulario vacío para la creación
const form = useForm({
    nombre: '',
    apellidos: '',
    correo: '',
    telefono: '',
    direccion: '',
});

// Función para enviar el formulario
const submit = () => {
    form.post(route('clientes.store'));
};
</script>

<template>
  <Header />
  <div class="container mt-5">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
      <div class="card-header bg-primary text-white text-center">
        <h2 class="mb-0">Crear Nuevo Cliente</h2>
      </div>
      <div class="card-body">
        <form @submit.prevent="submit">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input v-model="form.nombre" type="text" class="form-control" id="nombre" required />
          </div>

          <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input v-model="form.apellidos" type="text" class="form-control" id="apellidos" required />
          </div>

          <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input v-model="form.correo" type="email" class="form-control" id="correo" required />
          </div>

          <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input v-model="form.telefono" type="text" class="form-control" id="telefono" />
          </div>

          <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input v-model="form.direccion" type="text" class="form-control" id="direccion" />
          </div>

          <div class="d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-success">Crear Cliente</button>
            <a href="/clientes" class="btn btn-secondary">Volver</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <Footer />
</template>

<style scoped>
.card {
  transition: none;
}

.d-flex {
  gap: 10px;
}

.btn-success, .btn-secondary {
  font-weight: 600;
  padding: 8px 16px;
  text-decoration: none;
  border-radius: 5px;
}

.btn-success {
  background-color: #28a745;
}

.btn-success:hover {
  background-color: #218838;
}

.btn-secondary {
  background-color: #6c757d;
  color: white;
}

.btn-secondary:hover {
  background-color: #5a6268;
}
</style>
