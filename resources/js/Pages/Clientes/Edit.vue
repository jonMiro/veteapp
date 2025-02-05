<script setup>
import Header from '../../Components/Header.vue';
import Footer from '../../Components/Footer.vue';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';
import { defineProps } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';

// Definimos las propiedades que se reciben del componente principal
const props = defineProps({
  cliente: Object, // Recibe el cliente desde Inertia
});

const form = useForm({
    nombre: props.cliente.nombre,
    apellidos: props.cliente.apellidos,
    correo: props.cliente.correo,
    telefono: props.cliente.telefono,
    direccion: props.cliente.direccion,
});

const submit = () => {
    form.put(route('clientes.update', props.cliente.id));
};
</script>

<template>
  <div>
    <Header /> <!-- Añadimos el Header con clase personalizada -->

    <div class="container mt-5">
      <h2 class="text-center mb-4">Editar Cliente</h2>

      <div class="row">
        <div class="col-md-6 mx-auto">
            <form @submit.prevent="submit">

            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input v-model="form.nombre" type="text" id="nombre" name="nombre" class="form-control" required />
            </div>

            <div class="mb-3">
              <label for="apellidos" class="form-label">Apellidos</label>
              <input v-model="form.apellidos" type="text" id="apellidos" name="apellidos" class="form-control" required />
            </div>

            <div class="mb-3">
              <label for="correo" class="form-label">Correo</label>
              <input v-model="form.correo" type="email" id="correo" name="correo" class="form-control" required />
            </div>

            <div class="mb-3">
              <label for="telefono" class="form-label">Teléfono</label>
              <input v-model="form.telefono" type="text" id="telefono" name="telefono" class="form-control" />
            </div>

            <div class="mb-3">
              <label for="direccion" class="form-label">Dirección</label>
              <input v-model="form.direccion" type="text" id="direccion" name="direccion" class="form-control" />
            </div>

            <div class="mb-3 text-center">
              <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <Footer />
  </div>
</template>

<style scoped>
/* Estilos adicionales para el formulario */
.form-label {
  font-weight: bold;
}
</style>
