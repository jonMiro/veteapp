<script setup>
import Header from '../../Components/Header.vue';
import Footer from '../../Components/Footer.vue';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';
import { defineProps } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';

// Definir props para recibir clientes y usuarios
const props = defineProps({
    clientes: Array,
    usuarios: Array,
});

const form = useForm({
    nombre: '',
    tipo: '',
    raza: '',
    fechaNacimiento: '',
    cliente_id: '',
    usuario_id: '',
});

const submit = () => {
    form.post(route('animales.store'), {
        onSuccess: () => {
            alert("¡Animal registrado correctamente!");
        },
        onError: (errors) => {
            console.log(errors);
        }
    });
};
</script>

<template>
  <Header />
  <div class="container mt-5">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
      <div class="card-header bg-primary text-white text-center">
        <h2 class="mb-0">Registrar Nuevo Animal</h2>
      </div>
      <div class="card-body">
        <form @submit.prevent="submit">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input v-model="form.nombre" type="text" class="form-control" id="nombre" required />
            <div v-if="form.errors.nombre" class="text-danger">{{ form.errors.nombre }}</div>
          </div>
          <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input v-model="form.tipo" type="text" class="form-control" id="tipo" required />
            <div v-if="form.errors.tipo" class="text-danger">{{ form.errors.tipo }}</div>
          </div>
          <div class="mb-3">
            <label for="raza" class="form-label">Raza</label>
            <input v-model="form.raza" type="text" class="form-control" id="raza" required />
            <div v-if="form.errors.raza" class="text-danger">{{ form.errors.raza }}</div>
          </div>
          <div class="mb-3">
            <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
            <input v-model="form.fechaNacimiento" type="date" class="form-control" id="fechaNacimiento" required />
            <div v-if="form.errors.fechaNacimiento" class="text-danger">{{ form.errors.fechaNacimiento }}</div>
          </div>
          <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select v-model="form.cliente_id" class="form-control" id="cliente_id" required>
              <option v-for="cliente in props.clientes" :key="cliente.id" :value="cliente.id">
                {{ cliente.nombre }} {{ cliente.apellidos }}
              </option>
            </select>
            <div v-if="form.errors.cliente_id" class="text-danger">{{ form.errors.cliente_id }}</div>
          </div>
          <div class="mb-3">
            <label for="usuario_id" class="form-label">Veterinario</label>
            <select v-model="form.usuario_id" class="form-control" id="usuario_id" required>
              <option v-for="usuario in props.usuarios" :key="usuario.id" :value="usuario.id">
                {{ usuario.nombre }}
              </option>
            </select>
            <div v-if="form.errors.usuario_id" class="text-danger">{{ form.errors.usuario_id }}</div>
          </div>
          <div class="d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-primary">Registrar Animal</button>
            <a href="/animales" class="btn btn-secondary">Volver</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <Footer />
</template>
