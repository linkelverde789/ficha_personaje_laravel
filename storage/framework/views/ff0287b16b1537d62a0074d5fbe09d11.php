<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/normalize.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
</head>

<body>
    <div class="general">
        <form action="<?php echo e(url('login')); ?>" method="POST" id="formulario">
            <?php echo csrf_field(); ?>
            <label for="username">Introduce tu nombre de usuario</label>
            <input type="text" name="username" id="username" style="width: 400px;"
                placeholder="Introduce el nombre de usuario" required>
            <label for="password">Introduce tu contraseña</label>
            <div class="password">
                <input type="password" name="password" id="password" placeholder="Introduce la contraseña" required>
                <button type="button" id="first">👀</button>
            </div>
            <input type="submit" value="Iniciar Sesión">
        </form>
        <div>
            <?php if($errors->any()): ?>
                <p id="errorMessage"><?php echo e($errors->first()); ?></p>
            <?php endif; ?>
        </div>
    </div>
    <script src="<?php echo e(asset('js/showPassword.js')); ?>"></script>
</body>

</html><?php /**PATH /var/www/html/resources/views/auth/login.blade.php ENDPATH**/ ?>