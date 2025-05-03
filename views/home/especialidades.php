<!-- views/home/index.php -->
<!DOCTYPE html>
<html>

<body>
    <section class="especialidades">
            <h2>Especialidades</h2>
            <p>
            Las 13 áreas en las que nos destacamos con orgullo y compromiso.
            </p>
            <div class="lista">
            </div>
            <button class="boton-ver">Ver más</button>     
    </section>
</body>

<script>
    const images2 = [
    { src: "./views/assets/img/nosotros/image1.png", descripcion: "Infantería" },
    { src: "./views/assets/img/nosotros/image2.png", descripcion: "Caballería" },
    { src: "./views/assets/img/nosotros/image3.png", descripcion: "Artillería" },
    { src: "./views/assets/img/nosotros/image4.png", descripcion: "Ingeniería" }
    ];

    const lista = document.querySelector(".lista");

    images2.forEach((item, index) => {
    const contenedor = document.createElement("div");
    contenedor.classList.add("contenedor");

    const img = document.createElement("img");
    img.src = item.src;
    img.alt = item.descripcion;

    const descripcion = document.createElement("h3");
    descripcion.textContent = item.descripcion;

    contenedor.appendChild(img);
    contenedor.appendChild(descripcion);
    lista.appendChild(contenedor);
    });

</script>

<style>
    .especialidades{
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-inline: auto;
        max-width: 1600px;
        text-align: center;
    }

    .especialidades h2 {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 1rem;
    }

    .especialidades p {
        font-size: 1.2rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .lista {
        width:100%;
        justify-content: center;
        display:flex;
        gap: 2rem;
        margin-bottom:2rem;
    }

    .contenedor {
        max-width: 300px;
        background-color:#272B27;
        color: white;
        font-weight: bold;
    }

    .contenedor img {
        width: 100%;
        aspect-ratio: 1/1;
        object-fit: cover;
        border-radius: 8px;
    }

    .boton-ver {
        background-color: #00c800;
        color: white;
        padding: 0.75rem 3rem;
        border-radius: 999px;
        border: none;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-inline: auto;
        
    }

    .boton-ver:hover {
        background-color: #00a000;
    }
</style>
</html>
