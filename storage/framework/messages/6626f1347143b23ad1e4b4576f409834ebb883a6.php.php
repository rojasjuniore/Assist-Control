<?php
    if(isset($template) && $template === 'horizontal') $groupAddClass = '';
    else $groupAddClass = 'waves-effect waves-dark'
?>

<?php if(count($items) > 0): ?>
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php if(isset($item->separator)): ?>
            <?php if($item->separator === true): ?>
                <li class="nav-small-cap"><?php echo e($item->title ?? ''); ?></li>
                <?php continue; ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php if(isset($item->children)): ?>
            <?php if(count($item->children) > 0): ?>

                <li>
                    <a class="has-arrow <?php echo e($groupAddClass); ?>" href="#" aria-expanded="false">
                        <i class="<?php echo e($item->class ?? ''); ?>"></i>

                        <span
                        <?php if(isset($item->subgroup) && $item->subgroup): ?>
                            class=""
                        <?php else: ?>
                            class="hide-menu"
                        <?php endif; ?>
                        >
                            <?php echo e($item->title ?? ''); ?>

                            <?php echo $item->badge ?? ''; ?>

                        </span>

                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <?php echo $__env->make('templates.application.components.menu-items-vertical', [ 'items' => $item->children ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </ul>
                </li>

            <?php else: ?>
                <?php echo $__env->make('templates.application.components.menu-item-single', [ 'item' => $item ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>

        <?php endif; ?>

        <?php if(!isset($item->children)): ?>
            <?php echo $__env->make('templates.application.components.menu-item-single', [ 'item' => $item ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
