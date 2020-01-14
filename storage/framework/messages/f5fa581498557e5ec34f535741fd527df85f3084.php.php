<li id="BarIdioma" class="nav-item dropdown" <?php if(!Auth::user()): ?>style="list-style: none"<?php endif; ?>>
    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark BarIdioma" href="#" onclick="return false">

        <?php if(!Auth::user()): ?>
            <?php echo e(_i('Idioma')); ?>: &nbsp;
        <?php endif; ?>
        <?php switch(LaravelGettext::getLocale()):
            case ('es_ES'): ?>
            <i class="flag-icon flag-icon-es"></i>
            <?php break; ?>
            <?php case ('en_US'): ?>
            <i class="flag-icon flag-icon-us"></i>
            <?php break; ?>
        <?php endswitch; ?>
    </a>
    <div class="dropdown-menu dropdown-menu-right scale-up">

        <?php $__currentLoopData = Config::get('laravel-gettext.supported-locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <a class="dropdown-item" href="/lang/<?php echo e($locale); ?>">
                <?php switch($locale):
                    case ('es_ES'): ?>
                    <i class="flag-icon flag-icon-es"></i> Español
                    <?php break; ?>
                    <?php case ('en_US'): ?>
                    <i class="flag-icon flag-icon-us"></i> English
                    <?php break; ?>
                <?php endswitch; ?>
            </a>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</li>
