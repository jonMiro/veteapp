<script setup>
import { useForm } from '@inertiajs/vue3';
import Header from '../../Components/Header.vue';
import Footer from '../../Components/Footer.vue';
import { defineProps } from 'vue';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';

const props = defineProps({
  usuario: Object,
});

const form = useForm({
  tipo: props.usuario.tipo,
  nombre: props.usuario.nombre,
  apellidos: props.usuario.apellidos,
  direccion: props.usuario.direccion,
  telefono: props.usuario.telefono,
  correo: props.usuario.correo,
  password: '',
});

const submit = () => {
    form.put(route('usuarios.update', props.usuario.id));
};
</script>

<template>
  <Header />
  <div class="container mt-5">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
      <div class="card-header bg-primary text-white text-center">
        <h2 class="mb-0">Editar Usuario</h2>
      </div>
      <div class="card-body">
        <form @submit.prevent="submit">
          <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input v-model="form.tipo" type="text" class="form-control" id="tipo" required />
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input v-model="form.nombre" type="text" class="form-control" id="nombre" required />
          </div>
          <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input v-model="form.apellidos" type="text" class="form-control" id="apellidos" required />
          </div>
          <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input v-model="form.direccion" type="text" class="form-control" id="direccion" required />
          </div>
          <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input v-model="form.telefono" type="text" class="form-control" id="telefono" required />
          </div>
          <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input v-model="form.correo" type="email" class="form-control" id="correo" required />
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Contraseña (opcional)</label>
            <input v-model="form.password" type="password" class="form-control" id="password" />
          </div>

          <div class="d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-success">Actualizar Usuario</button>
            <a href="/usuarios" class="btn btn-secondary">Volver</a>
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
