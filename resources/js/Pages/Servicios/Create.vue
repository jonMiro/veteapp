<script setup>
import Header from '../../Components/Header.vue';
import Footer from '../../Components/Footer.vue';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';
import { defineProps } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';

// Definir props para recibir clientes, usuarios y animales
const props = defineProps({
    clientes: Array,
    usuarios: Array,
    animales: Array,
});

const form = useForm({
    tipo: '',
    motivo: '',
    duracion: '',
    precio: '',
    cliente_id: '',
    usuario_id: '',
    animal_id: '', // Asegúrate de incluir este campo
});

const submit = () => {
    form.post(route('servicios.store'), {
        onSuccess: () => {
            alert("¡Servicio registrado correctamente!");
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
        <h2 class="mb-0">Registrar Nuevo Servicio</h2>
      </div>
      <div class="card-body">
        <form @submit.prevent="submit">
          <!-- Campo para tipo de servicio -->
          <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de Servicio</label>
            <input v-model="form.tipo" type="text" class="form-control" id="tipo" required />
            <div v-if="form.errors.tipo" class="text-danger">{{ form.errors.tipo }}</div>
          </div>

          <!-- Campo para motivo del servicio -->
          <div class="mb-3">
            <label for="motivo" class="form-label">Motivo</label>
            <input v-model="form.motivo" type="text" class="form-control" id="motivo" required />
            <div v-if="form.errors.motivo" class="text-danger">{{ form.errors.motivo }}</div>
          </div>

          <!-- Campo para duración del servicio -->
          <div class="mb-3">
            <label for="duracion" class="form-label">Duración</label>
            <input v-model="form.duracion" type="text" class="form-control" id="duracion" required />
            <div v-if="form.errors.duracion" class="text-danger">{{ form.errors.duracion }}</div>
          </div>

          <!-- Campo para precio -->
          <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input v-model="form.precio" type="number" class="form-control" id="precio" min="0" required />
            <div v-if="form.errors.precio" class="text-danger">{{ form.errors.precio }}</div>
          </div>

          <!-- Campo para seleccionar cliente -->
          <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select v-model="form.cliente_id" class="form-control" id="cliente_id" required>
              <option v-for="cliente in props.clientes" :key="cliente.id" :value="cliente.id">
                {{ cliente.nombre }} {{ cliente.apellidos }}
              </option>
            </select>
            <div v-if="form.errors.cliente_id" class="text-danger">{{ form.errors.cliente_id }}</div>
          </div>

          <!-- Campo para seleccionar veterinario -->
          <div class="mb-3">
            <label for="usuario_id" class="form-label">Veterinario</label>
            <select v-model="form.usuario_id" class="form-control" id="usuario_id" required>
              <option v-for="usuario in props.usuarios" :key="usuario.id" :value="usuario.id">
                {{ usuario.nombre }}
              </option>
            </select>
            <div v-if="form.errors.usuario_id" class="text-danger">{{ form.errors.usuario_id }}</div>
          </div>

          <!-- Campo para seleccionar animal -->
          <div class="mb-3">
            <label for="animal_id" class="form-label">Animal</label>
            <select v-model="form.animal_id" class="form-control" id="animal_id" required>
              <option v-for="animal in props.animales" :key="animal.id" :value="animal.id">
                {{ animal.nombre }} ({{ animal.tipo }})
              </option>
            </select>
            <div v-if="form.errors.animal_id" class="text-danger">{{ form.errors.animal_id }}</div>
          </div>

          <!-- Botones para enviar o volver -->
          <div class="d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-primary">Registrar Servicio</button>
            <a href="/servicios" class="btn btn-secondary">Volver</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <Footer />
</template>
