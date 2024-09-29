<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador de Personajes de D&D</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/normalize.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/index.css')); ?>">
</head>

<body>

    <nav>
        <?php if(session('id')): ?>
            <li><a href="<?php echo e(route('home')); ?>" class="button">Personajes</a></li>
        <?php endif; ?>
        <ul class="nav-links">
            <li><a href="<?php echo e(route('lanzar.dados')); ?>" class="button">Lanzar dados</a></li>
        </ul>
    </nav>

    <header>
        <h1>Administrador de Personajes de</h1>
        <div>
            <img src="https://logos-world.net/wp-content/uploads/2021/12/DnD-Logo.png" alt="logo de Dungeon and Dragons"
                width="300px" height="auto">

        </div>
    </header>

    <section id="introduccion">
        <h2>Bienvenido a tu Administrador de Personajes</h2>
        <p>Este sitio te permite crear, gestionar y llevar un registro de todos tus personajes de Dungeons & Dragons en
            un solo lugar. Organiza tus campañas, consulta estadísticas y accede a tus personajes desde cualquier lugar.
        </p>
        <p>Ya sea que seas un Dungeon Master experimentado o un jugador nuevo, aquí encontrarás todas las herramientas
            necesarias para tus aventuras de D&D.</p>
    </section>

    <section id="acciones">
        <h2>Comienza Ahora</h2>
        <p>Para empezar, puedes crear una cuenta o iniciar sesión si ya tienes una:</p>
        <ul>
            <li><a href="<?php echo e(route('login')); ?>">Iniciar sesión</a></li>

            <li><a href="<?php echo e(route('crear.usuario')); ?>">Crear Cuenta</a></li>
        </ul>
    </section>

    <footer>
        <p>&copy; 2024 Administrador de Personajes de D&D. Todos los derechos reservados.</p>
    </footer>
</body>

</html><?php /**PATH /var/www/html/resources/views/welcome.blade.php ENDPATH**/ ?>