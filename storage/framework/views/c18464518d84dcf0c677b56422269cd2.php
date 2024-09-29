<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/normalize.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/createCharacter.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <?php if(session('success')): ?>
        <script>
            alert("<?php echo e(session('success')); ?>");
        </script>
    <?php endif; ?>
    <div class="pepe">
        <h1 style="border: 0;">Gestión de Inventario</h1>
        <h2>Añadir Objeto al Inventario</h2>
        <select name="choseObject" id="choseObject" onchange="showForm()" required>
            <option value="none" disabled selected>Elige un tipo de objeto para añadir al inventario</option>
            <option value="arma">Arma</option>
            <option value="armadura">Armadura</option>
            <option value="escudo">Escudo</option>
            <option value="otros">Otros</option>
        </select>

        <!-- armas -->
        <form name="weapon" id="weapon" method="post" style="display:none;" action="<?php echo e(route('insertarArma')); ?>">
            <?php echo csrf_field(); ?>
            <input type="hidden" value="arma" name="type" required>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre del arma" required>
            <input type="number" name="cantidad" id="cantidad" min="1" max="99" placeholder="Cantidad" required>
            <select name="dice" id="dice" required>
                <option value="none" disabled selected>Elige el dado del daño</option>
                <option value="d4">d4</option>
                <option value="d6">d6</option>
                <option value="d8">d8</option>
                <option value="d10">d10</option>
                <option value="d12">d12</option>
                <option value="d16">d16</option>
                <option value="d20">d20</option>
            </select>
            <input type="number" name="cantidadDados" id="cantidadDados" min="1" max="99" placeholder="Número de dados"
                required>
            <select id="tipo_dano" name="tipo_dano" required>
                <option value="none" disabled selected>Elige el tipo de daño</option>
                <option value="Cortante">Cortante</option>
                <option value="Perforante">Perforante</option>
                <option value="Contundente">Contundente</option>
                <option value="Fuego">Fuego</option>
                <option value="Frío">Frío</option>
                <option value="Ácido">Ácido</option>
                <option value="Eléctrico">Eléctrico</option>
                <option value="Veneno">Veneno</option>
                <option value="Psíquico">Psíquico</option>
                <option value="Radiante">Radiante</option>
                <option value="Necrótico">Necrótico</option>
            </select>
            <input type="text" name="description" id="description" placeholder="Descripción" required>
            <input type="number" name="peso" id="peso" min="1" placeholder="Peso" required>
            <button type="submit">Añadir Arma</button>
        </form>

        <!-- escudo -->
        <form name="shield" id="shield" method="post" style="display:none;" action="<?php echo e(route('insertarArmadura')); ?>">
            <?php echo csrf_field(); ?>
            <input type="hidden" value="escudo" name="type" required>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre del escudo" required>
            <input type="number" name="cantidad" id="cantidad" min="1" max="99" placeholder="Cantidad" required>
            <input type="number" name="defensa" id="defensa" min="1" placeholder="Defensa" required>
            <input type="text" name="description" id="description" placeholder="Descripción" required>
            <input type="number" name="peso" id="peso" min="1" placeholder="Peso" required>
            <button type="submit">Añadir Escudo</button>
        </form>

        <!-- armadura -->
        <form name="armor" id="armor" method="post" style="display:none;" action="<?php echo e(route('insertarEscudo')); ?>">
            <?php echo csrf_field(); ?>
            <input type="hidden" value="armadura" name="type" required>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre de la armadura" required>
            <input type="number" name="cantidad" id="cantidad" min="1" max="99" placeholder="Cantidad" required>
            <input type="number" name="defensa" id="defensa" min="1" placeholder="Defensa" required>
            <select id="tipo_armadura" name="tipo_armadura" required>
                <option value="none" disabled selected>Elige el tipo de armadura</option>
                <option value="Ligera">Ligera</option>
                <option value="Media">Media</option>
                <option value="Pesada">Pesada</option>
            </select>
            <select id="parte" name="parte" required>
                <option value="none" disabled selected>Elige la posición de la armadura</option>
                <option value="Cabeza">Cabeza</option>
                <option value="Pechera">Pechera</option>
                <option value="Piernas">Piernas</option>
            </select>
            <input type="text" name="description" id="description" placeholder="Descripción" required>
            <input type="number" name="peso" id="peso" min="1" placeholder="Peso" required>
            <button type="submit">Añadir Armadura</button>
        </form>

        <!-- otros -->
        <form name="other" id="other" method="post" style="display:none;" action="<?php echo e(route('insertarObjeto')); ?>">
            <?php echo csrf_field(); ?>
            <input type="hidden" value="objeto_normal" name="type" required>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
            <input type="number" name="cantidad" id="cantidad" min="1" max="99" placeholder="Cantidad" required>
            <input type="text" name="description" id="description" placeholder="Descripción" required>
            <input type="number" name="peso" id="peso" min="0" placeholder="Peso" required>
            <button type="submit">Añadir objeto</button>
        </form>
        <div class="inventory-container">
            <div class="section">
                <h2>Tu inventario</h2>
                <h3>Peso: <span style="float: right;"></span></h3>
                <br>
                <h2>Armas</h2>
                <?php if(count($inventarioArmas) != 0): ?>
                    <table>
                        <thead>
                            <tr>
                                <td>Nombre</td>
                                <td>Descripción</td>
                                <td>Peso</td>
                                <td>Daño</td>
                                <td>Tipo Daño</td>
                                <td>Cantidad</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $inventarioArmas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arma): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($arma['nombre']); ?></td>
                                    <td><?php echo e($arma['descripcion']); ?></td>
                                    <td><?php echo e($arma['peso']); ?></td>
                                    <td><?php echo e($arma['dano']); ?></td>
                                    <td><?php echo e($arma['tipo_dano']); ?></td>
                                    <td><?php echo e($arma['cantidad']); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <h4>No tienes armas en el inventario</h4>
                <?php endif; ?>
                <br>
                <h2>Armaduras</h2>
                <?php if(count($inventarioArmadura) != 0): ?>
                    <table>
                        <thead>
                            <tr>
                                <td>Nombre</td>
                                <td>Descripción</td>
                                <td>Peso</td>
                                <td>Defensa</td>
                                <td>Tipo</td>
                                <td>Posición</td>
                                <td>Cantidad</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $inventarioArmadura; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $armadura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($armadura['nombre']); ?></td>
                                    <td><?php echo e($armadura['descripcion']); ?></td>
                                    <td><?php echo e($armadura['peso']); ?></td>
                                    <td><?php echo e($armadura['defensa']); ?></td>
                                    <td><?php echo e($armadura['tipo']); ?></td>
                                    <td><?php echo e($armadura['parte']); ?></td>
                                    <td><?php echo e($armadura['cantidad']); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <h4>No tienes armaduras en el inventario</h4>
                <?php endif; ?>
                <br>
                <h2>Escudos</h2>
                <?php if(count($inventarioEscudo) != 0): ?>
                    <table>
                        <thead>
                            <tr>
                                <td>Nombre</td>
                                <td>Descripción</td>
                                <td>Peso</td>
                                <td>Defensa</td>
                                <td>Cantidad</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $inventarioEscudo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escudo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($escudo['nombre']); ?></td>
                                    <td><?php echo e($escudo['descripcion']); ?></td>
                                    <td><?php echo e($escudo['peso']); ?></td>
                                    <td><?php echo e($escudo['defensa']); ?></td>
                                    <td><?php echo e($escudo['cantidad']); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <h4>No tienes escudos en el inventario</h4>
                <?php endif; ?>
                <br>
                <h2>Objetos normales</h2>
                <?php if(count($inventarioObjeto) != 0): ?>
                    <table>
                        <thead>
                            <tr>
                                <td>Nombre</td>
                                <td>Descripción</td>
                                <td>Peso</td>
                                <td>Cantidad</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $inventarioObjeto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objeto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($objeto['nombre']); ?></td>
                                    <td><?php echo e($objeto['descripcion']); ?></td>
                                    <td><?php echo e($objeto['peso']); ?></td>
                                    <td><?php echo e($objeto['cantidad']); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <h4>No tienes objetos en el inventario</h4>
                <?php endif; ?>
            </div>
            <br><br>
            <div class="section">
                <h2>Tu equipo</h2>
                <br>

                <h2>Armas</h2>
                <?php if(count($equipoArmas) != 0): ?>
                    <table>
                        <thead>
                            <tr>
                                <td>Nombre</td>
                                <td>Descripción</td>
                                <td>Daño</td>
                                <td>Tipo Daño</td>
                                <td>Posición</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $equipoArmas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $armas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($armas['nombre']); ?></td>
                                    <td><?php echo e($armas['descripcion']); ?></td>
                                    <td><?php echo e($armas['dano']); ?></td>
                                    <td><?php echo e($armas['tipo_dano']); ?></td>
                                    <td><?php echo e($armas['tipo_equipo']); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <h4>No tienes armas equipadas</h4>
                <?php endif; ?>
                <br>

                <h2>Armaduras</h2>
                <?php if(count($equipoArmaduras) != 0): ?>
                    <table>
                        <thead>
                            <tr>
                                <td>Nombre</td>
                                <td>Descripción</td>
                                <td>Defensa</td>
                                <td>Tipo</td>
                                <td>Posición</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $equipoArmaduras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $armaduras): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($armaduras['nombre']); ?></td>
                                    <td><?php echo e($armaduras['descripcion']); ?></td>
                                    <td><?php echo e($armaduras['defensa']); ?></td>
                                    <td><?php echo e($armaduras['tipo']); ?></td>
                                    <td><?php echo e($armaduras['tipo_equipo']); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <h4>No tienes armaduras equipadas</h4>
                <?php endif; ?>
                <br>

                <h2>Escudos</h2>
                <?php if(count($equipoEscudo) != 0): ?>
                    <table>
                        <thead>
                            <tr>
                                <td>Nombre</td>
                                <td>Descripción</td>
                                <td>Defensa</td>
                                <td>Posición</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $equipoEscudo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escudo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($escudo['nombre']); ?></td>
                                    <td><?php echo e($escudo['descripcion']); ?></td>
                                    <td><?php echo e($escudo['defensa']); ?></td>
                                    <td><?php echo e($escudo['tipo_equipo']); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <h4>No tienes un escudo equipado</h4>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('js/showObjectForm.js')); ?>"></script>
    <script src="<?php echo e(asset('js/checkObject.js')); ?>"></script>
</body>

</html><?php /**PATH /var/www/html/resources/views/inventario.blade.php ENDPATH**/ ?>