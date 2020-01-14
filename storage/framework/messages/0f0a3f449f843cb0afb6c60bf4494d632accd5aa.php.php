<li>
    <a href="<?php echo e($item->url ?? ''); ?>"
       aria-expanded="false"
       <?php if(isset($item->target)): ?> target="<?php echo e($item->target ?? ''); ?>" <?php endif; ?>
    >
        <?php if(isset($item->class)): ?> <i class="<?php echo e($item->class ?? ''); ?>"></i> <?php endif; ?>

        <span>
            <?php echo e($item->title ?? ''); ?>

            <?php echo $item->badge ?? ''; ?>

        </span>
    </a>
</li>
