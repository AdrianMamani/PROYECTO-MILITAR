<!DOCTYPE html>
<html class="scroll-smooth" lang="es">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>Login - Promocion Cabo Alberto</title>
  <link rel="icon" href="/PROYECTO-MILITAR/views/assets/img/logo.jpg" type="image/png">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4">
  <main class="bg-white bg-opacity-90 backdrop-blur-md rounded-3xl shadow-2xl max-w-md w-full p-10 flex flex-col items-center">
    <img alt="Logo verde moderno con formas abstractas y tipografía blanca, estilo minimalista y profesional" class="mb-8" height="80" src="/PROYECTO-MILITAR/views/assets/img/logo.jpg" width="150"/>
    <h1 class="text-4xl font-extrabold text-green-700 mb-8 select-none">Inicia sesión</h1>

    <?php if (isset($error)): ?>
      <p class="text-red-600 font-semibold mb-4"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="index.php?action=auth/login" method="POST" class="w-full space-y-6" novalidate>
      <div>
        <label class="block text-gray-700 font-semibold mb-2" for="correo">Correo electrónico</label>
        <div class="relative">
          <span class="absolute inset-y-0 left-3 flex items-center text-green-600 text-lg"><i class="fas fa-user"></i></span>
          <input id="correo" name="correo" placeholder="ejemplo@correo.com" required type="email" class="w-full pl-11 pr-4 py-3 rounded-2xl border border-green-600 focus:border-green-800 focus:ring-2 focus:ring-green-400 outline-none transition text-gray-800 font-medium"/>
        </div>
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-2" for="contraseña">Contraseña</label>
        <div class="relative">
          <span class="absolute inset-y-0 left-3 flex items-center text-green-600 text-lg"><i class="fas fa-lock"></i></span>
          <input id="contraseña" name="contraseña" placeholder="********" required type="password" class="w-full pl-11 pr-11 py-3 rounded-2xl border border-green-600 focus:border-green-800 focus:ring-2 focus:ring-green-400 outline-none transition text-gray-800 font-medium"/>
          <button aria-label="Mostrar contraseña" class="absolute inset-y-0 right-3 flex items-center text-green-600 hover:text-green-800 transition" onclick="togglePasswordVisibility()" type="button">
            <i class="fas fa-eye" id="eyeIcon"></i>
          </button>
        </div>
      </div>

      <button type="submit" class="w-full bg-green-600 hover:bg-green-800 text-white font-extrabold py-3 rounded-2xl shadow-lg transition">Entrar</button>
    </form>
  </main>

  <script>
    function togglePasswordVisibility() {
      const passwordInput = document.getElementById('contraseña');
      const eyeIcon = document.getElementById('eyeIcon');
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
      }
    }
  </script>
</body>
</html>