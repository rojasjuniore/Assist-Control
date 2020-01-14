<div class="user-profile" style="background: url(<?php echo e(asset('images/bguser.jpg')); ?>) no-repeat;">
    <!-- User profile image -->
    <div class="profile-img text-center">
        <?php if(Auth::user()->avatar): ?>
            <img src="<?php echo e(Auth::user()->avatar); ?>" alt="user"/>
        <?php else: ?>
            <img src="/vendor/wrappixel/material-pro/4.2.1/assets/images/users/1.jpg" alt="user" class="img-fluid"/>
        <?php endif; ?>
    </div>
    <!-- User profile text-->
    <div class="profile-text">

        <a href="#" class="dropdown-toggle u-dropdown popopUserProfile" onclick="return false">
            <?php echo e(Auth::user()->nombre); ?>

        </a>

        <div class="dropdown-menu animated flipInY" id="popopUserProfile">

           

           
            <a href="/perfil" class="dropdown-item"><i class="fa fa-user"></i> Perfil</a>
            <a href="/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Cerrar sesión</a>

        </div>
    </div>
</div>