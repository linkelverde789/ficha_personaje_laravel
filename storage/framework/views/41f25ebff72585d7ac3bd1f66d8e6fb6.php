<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exito</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/normalize.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/home.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=UnifrakturMaguntia&display=swap" rel="stylesheet">
</head>

<body>
    <nav>
        <ul class="nav-links">
            <li><a href="<?php echo e(route('crearPersonaje')); ?>">Crear Personaje</a></li>
        </ul>
    </nav>
    <div>
        <?php if($personajes->isEmpty()): ?>
            <h1>¡Aquí aparecerán tus personajes cuando crees alguno!</h1>
        <?php else: ?>
            <div class="personajes">
                <?php $__currentLoopData = $personajes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="personaje">
                        <h1><?php echo e($item->nombre); ?></h1>
                        <h2><?php echo e($item->raza); ?> <?php echo e($item->clase); ?></h2>
                        <h2>Nivel: <?php echo e($item->nivel); ?></h2>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html><?php /**PATH /var/www/html/resources/views/home.blade.php ENDPATH**/ ?>