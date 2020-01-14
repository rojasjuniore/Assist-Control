<li class="nav-item dropdown" id="NavBarUserProfile">
    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark NavBarUserProfile" href="#" onclick="return false">
        <span class="text-white"><?php echo e(Auth::user()->nombre); ?></span>
        <?php if(Auth::user()->avatar): ?>
            <img src="<?php echo e(Auth::user()->avatar); ?>" alt="user" class="profile-pic"/>
        <?php else: ?>
            <img src="/vendor/wrappixel/material-pro/4.2.1/assets/images/users/1.jpg" alt="user" class="profile-pic"/>
        <?php endif; ?>
    </a>
    <div class="dropdown-menu dropdown-menu-right scale-up">
        <ul class="dropdown-user">
            <li>
                <div class="dw-user-box">
                    <div class="text-center">
                        <?php if(Auth::user()->avatar): ?>
                            <img src="<?php echo e(Auth::user()->avatar); ?>" alt="user" class="profile-pic" style="width: 5em"/>
                        <?php else: ?>
                            <img src="/vendor/wrappixel/material-pro/4.2.1/assets/images/users/1.jpg" alt="user" class="profile-pic" style="width: 5em"/>
                        <?php endif; ?>
                    </div>
                    <div class="text-center">
                        <h4><?php echo e(Auth::user()->nombre); ?></h4>
                        <p class="text-muted">Rol:
                            <?php $__currentLoopData = Auth::user()->perfiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perfil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($perfil->rol->name); ?>.
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </p>
                    </div>
                </div>
            </li>
            <li role="separator" class="divider"></li>
            <li><a href="/perfil"><i class="ti-user"></i> Perfil</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/logout"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
        </ul>
    </div>
</li>