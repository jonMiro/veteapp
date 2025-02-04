<template>
    <div>
      <!-- COLLAGE -->
      <div class="collageBackground">
        <img
          src="https://media.istockphoto.com/id/696056142/es/foto/siluetas-de-animales-en-fondo-de-atardecer-nublado-oro.jpg?s=612x612&w=0&k=20&c=PS2dsINbaEits4xjWJkFuASl8Ghwz48msphTZkzNc0Q="
          alt="Animal 1"
        />
        <img
          src="https://www.infobae.com/resizer/v2/CD2EUSSC3NFN3NSTLD67ZXXTEQ.jpg?auth=6f97a24b40ce4253dd695a7cbf5d2e39487b0db8c2a12f061aea4a7c62dadae5&smart=true&width=350&height=197&quality=85"
          alt="Animal 2"
        />
        <img
          src="https://www.portalveterinaria.com/upload/20240625112352comportamientoybienestar.jpg"
          alt="Animal 3"
        />
        <img
          src="https://cdn.nubika.es/wp-content/uploads/2023/05/que-tipo-de-veterinarios-hay.jpg"
          alt="Animal 4"
        />
        <img
          src="https://veterinariasanjose.es/wp-content/uploads/revslider/vet/clinica-veterinaria-en-lorca.jpg"
          alt="Animal 5"
        />
        <img
          src="https://cdn.shopify.com/s/files/1/0268/6861/files/animales-de-granja-oveja_grande.jpg?v=1536690478"
          alt="Animal 6"
        />
      </div>

      <!-- Contenido principal -->
      <div class="welcomeContainer">
        <h1 class="welcomeTitle">
          ¡Bienvenido a PeloPicoPata!
        </h1>
           <!-- Usa Inertia Link en lugar de inertia-link -->
        <Link href="/main" class="btn_primary">
          Explorar
        </Link>
      </div>
    </div>
  </template>

  <script>
  import { Link } from '@inertiajs/vue3'; // Importa Link de Inertia

  import '../../css/Home.css'; // Asegúrate de que la ruta es correcta

  export default {
    name: "Home",
    components: {
      Link, // Registra el componente Link
    },
  };
  </script>
