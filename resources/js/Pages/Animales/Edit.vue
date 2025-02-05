<script setup>
import Header from '../../Components/Header.vue';
import Footer from '../../Components/Footer.vue';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';
import { defineProps } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    animal: Object, // Recibe el animal desde Inertia
    clientes: Array, // Lista de clientes
    usuarios: Array, // Lista de usuarios
});

const form = useForm({
    nombre: props.animal.nombre,
    tipo: props.animal.tipo,
    raza: props.animal.raza,
    fechaNacimiento: props.animal.fechaNacimiento,
    cliente_id: props.animal.cliente_id,
    usuario_id: props.animal.usuario_id,
});

const submit = () => {
    form.put(route('animales.update', props.animal.id));
};
</script>

<template>
  <Header />
  <div class="container mt-5">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
      <div class="card-header bg-primary text-white text-center">
        <h2 class="mb-0">Editar Animal</h2>
      </div>
      <div class="card-body">
        <form @submit.prevent="submit">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input v-model="form.nombre" type="text" class="form-control" id="nombre" required />
          </div>
          <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input v-model="form.tipo" type="text" class="form-control" id="tipo" required />
          </div>
          <div class="mb-3">
            <label for="raza" class="form-label">Raza</label>
            <input v-model="form.raza" type="text" class="form-control" id="raza" required />
          </div>
          <div class="mb-3">
            <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
            <input v-model="form.fechaNacimiento" type="date" class="form-control" id="fechaNacimiento" required />
          </div>
          <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select v-model="form.cliente_id" class="form-control" id="cliente_id" required>
              <option v-for="cliente in props.clientes" :key="cliente.id" :value="cliente.id">
                {{ cliente.nombre }} {{ cliente.apellidos }}
              </option>
            </select>
          </div>
          <div class="mb-3">
            <label for="usuario_id" class="form-label">Veterinario</label>
            <select v-model="form.usuario_id" class="form-control" id="usuario_id" required>
              <option v-for="usuario in props.usuarios" :key="usuario.id" :value="usuario.id">
                {{ usuario.nombre }}
              </option>
            </select>
          </div>
          <div class="d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="/animales" class="btn btn-secondary">Volver</a>
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

.btn-primary, .btn-secondary {
  font-weight: 600;
  padding: 8px 16px;
  text-decoration: none;
  border-radius: 5px;
}

.btn-primary {
  background-color: #007bff;
}

.btn-primary:hover {
  background-color: #0056b3;
}

.btn-secondary {
  background-color: #6c757d;
  color: white;
}

.btn-secondary:hover {
  background-color: #5a6268;
}
</style>
