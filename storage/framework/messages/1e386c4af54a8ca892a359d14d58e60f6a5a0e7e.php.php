<?php
#Listado de Etiquetas del Menu para que sean incluidas en la traduccion debido a que son valores de BD
_i('Sistema');
_i('Configuración');

?>
<?php if($item['submenu'] == []): ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($item['ruta'])): ?>
        <li>
            <a href="<?php echo e(($item['ruta']!='#')? route($item['ruta']) : '#'); ?>" aria-expanded="false">
                <i class="<?php echo e($item['icono']); ?>"></i>
                <span class="hide-menu"><?php echo e(_i($item['menu'])); ?></span>
            </a>
        </li>
    <?php endif; ?>
<?php else: ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($item['ruta'])): ?>
        <li>
            <a class="has-arrow" href="#" aria-expanded="false">
                <i class="<?php echo e($item['icono']); ?>"></i>
                <span class="hide-menu"><?php echo e(_i($item['menu'])); ?></span>
            </a>
            <ul aria-expanded="false" class="collapse">
                <?php $__currentLoopData = $item['submenu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($submenu['submenu'] == []): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($submenu['ruta'])): ?>
                            <li>
                                <a href="<?php echo e(($submenu['ruta']!='#')? route($submenu['ruta']) : '#'); ?>">
                                    <i class="<?php echo e($submenu['icono']); ?>"></i>
                                    <?php echo e(_i($submenu['menu'])); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php echo $__env->make('templates.material.menu-item', [ 'item' => $submenu ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </li>
    <?php endif; ?>
<?php endif; ?>