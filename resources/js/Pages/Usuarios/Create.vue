<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    tipo: '',
    nombre: '',
    apellidos: '',
    direccion: '',
    telefono: '',
    correo: '',
    password: ''
});
</script>

<template>
    <h1>Crear Usuario</h1>

    <form @submit.prevent="form.post('/usuarios')">
        <div>
            <label for="tipo">Tipo de usuario</label>
            <select v-model="form.tipo" id="tipo">
                <option value="">Selecciona un tipo</option>
                <option value="cliente">Cliente</option>
                <option value="veterinario">Veterinario</option>
            </select>
        </div>

        <div>
            <label for="nombre">Nombre</label>
            <input type="text" v-model="form.nombre" placeholder="Nombre" id="nombre" />
        </div>

        <div>
            <label for="apellidos">Apellidos</label>
            <input type="text" v-model="form.apellidos" placeholder="Apellidos" id="apellidos" />
        </div>

        <div>
            <label for="direccion">Dirección</label>
            <input type="text" v-model="form.direccion" placeholder="Dirección" id="direccion" />
        </div>

        <div>
            <label for="telefono">Teléfono</label>
            <input type="text" v-model="form.telefono" placeholder="Teléfono" id="telefono" />
        </div>

        <div>
            <label for="correo">Correo Electrónico</label>
            <input type="email" v-model="form.correo" placeholder="Correo" id="correo" />
        </div>

        <div>
            <label for="password">Contraseña</label>
            <input type="password" v-model="form.password" placeholder="Contraseña" id="password" />
        </div>

        <button type="submit" :disabled="form.processing">Crear Usuario</button>
    </form>
</template>
