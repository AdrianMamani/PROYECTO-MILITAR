<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>Mis Emprendimientos</title>
  <link rel="icon" href="/PROYECTO-MILITAR/views/assets/img/logo.jpg" type="image/png">
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    rel="stylesheet"
  />
  <style>
    /* Reset and base */
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #fff;
      color: #4a4a4a;
    }
    main {
      max-width: 1120px;
      margin: 0 auto;
      padding: 32px 16px;
    }
    h1 {
      font-weight: 800;
      font-size: 2rem;
      color: #1f2937;
      text-align: center;
      margin-bottom: 8px;
    }
    p.description {
      text-align: center;
      color: #6b7280;
      margin-top: 0;
      margin-bottom: 32px;
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
      font-size: 1rem;
    }
    /* Layout */
    .container {
      display: flex;
      flex-direction: column;
      gap: 32px;
    }
    @media (min-width: 768px) {
      .container {
        flex-direction: row;
      }
    }
    /* Sidebar */
    .sidebar {
      flex: 1 1 25%;
      max-width: 280px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .sidebar label {
      font-weight: 600;
      font-size: 1.125rem;
      color: #374151;
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 8px;
    }
    .sidebar input[type="text"] {
      width: 100%;
      padding: 10px 14px;
      border: 1px solid #d1d5db;
      border-radius: 8px;
      font-size: 1rem;
      outline-offset: 2px;
      transition: border-color 0.3s ease;
    }
    .sidebar input[type="text"]:focus {
      border-color: #166534;
      box-shadow: 0 0 0 3px rgba(22, 101, 52, 0.3);
    }
    .sidebar img {
      margin-top: 24px;
      width: 180px;
      height: 180px;
      object-fit: contain;
      border-radius: 8px;
    }
    /* Cards grid */
    .cards {
      flex: 1 1 75%;
      display: grid;
      grid-template-columns: 1fr;
      gap: 24px;
    }
    @media (min-width: 640px) {
      .cards {
        grid-template-columns: repeat(2, 1fr);
      }
    }
    @media (min-width: 768px) {
      .cards {
        grid-template-columns: repeat(3, 1fr);
      }
    }
    /* Card */
    .card {
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgb(0 0 0 / 0.1);
      display: flex;
      flex-direction: column;
      overflow: hidden;
      transition: transform 0.3s ease;
      cursor: pointer;
    }
    .card:hover {
      transform: scale(1.05);
      z-index: 10;
    }
    .card img {
      width: 100%;
      height: 144px;
      object-fit: cover;
      display: block;
    }
    .card-content {
      padding: 24px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }
    .card-content h2 {
      font-size: 1.125rem;
      font-weight: 700;
      color: #111827;
      margin: 0 0 8px 0;
    }
    .card-content p {
      font-size: 0.875rem;
      color: #4b5563;
      flex-grow: 1;
      margin: 0;
    }
    .card-content button {
      margin-top: 16px;
      background-color: #166534;
      color: white;
      font-weight: 600;
      border: none;
      border-radius: 9999px;
      padding: 10px 24px;
      font-size: 1rem;
      cursor: pointer;
      align-self: flex-start;
      transition: background-color 0.3s ease;
    }
    .card-content button:hover {
      background-color: #14532d;
    }
  </style>
</head>
<body>
  <?php
    include 'layout/header.php';
    ?>
  <main>
    <h1>Mis Emprendimientos</h1>
    <p class="description">Descubre los proyectos y negocios que he creado con pasión y dedicación.</p>
    <div class="container">
      <aside class="sidebar" aria-label="Buscador de emprendimientos">
        <label for="searchInput">
          Buscar <i class="fas fa-search" aria-hidden="true"></i>
        </label>
        <input
          type="text"
          id="searchInput"
          placeholder="Buscar emprendimiento..."
          aria-label="Buscar emprendimiento"
          oninput="filterCards()"
        />
        <img
          src="/PROYECTO-MILITAR/views/assets/img/logo.jpg"
          alt="Logo de la empresa, imagen cuadrada con texto 'Logo Empresa' en fondo gris claro"
          width="180"
          height="180"
        />
      </aside>
      <section class="cards" id="cardsContainer" aria-label="Lista de emprendimientos">
        <?php foreach ($emprendimientos as $emprendimiento): ?>
  <article class="card" data-title="<?= htmlspecialchars($emprendimiento['nombre_emprendimiento']) ?>" tabindex="0">
    <img
      src="<?= htmlspecialchars($emprendimiento['imagen_principal']) ?>"
      alt="Imagen de <?= htmlspecialchars($emprendimiento['nombre_emprendimiento']) ?>"
      width="600"
      height="144"
    />
    <div class="card-content">
      <h2><?= htmlspecialchars($emprendimiento['nombre_emprendimiento']) ?></h2>
      <p><?= htmlspecialchars($emprendimiento['descripcion']) ?></p>
      <a href="<?= BASE_URL ?>emprendimientos/<?= $emprendimiento['id'] ?>">
        <button type="button">Visitar sitio</button>
      </a>
    </div>
  </article>
<?php endforeach; ?>
      </section>
    </div>
  </main>
  <script>
    function filterCards() {
      const input = document.getElementById("searchInput");
      const filter = input.value.toLowerCase();
      const cards = document.querySelectorAll(".card");
      cards.forEach((card) => {
        const title = card.getAttribute("data-title").toLowerCase();
        if (title.includes(filter)) {
          card.style.display = "";
        } else {
          card.style.display = "none";
        }
      });
    }
  </script>
  <?php
    include 'layout/footer.php';
    ?>
</body>

</html>