<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
    <?php echo $__env->make('templates.application.components.sidebar-profile', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <?php if(auth()->check()): ?>
                <ul id="sidebarnav">
                    <li>
                        <a href="<?php echo e(route('home-one')); ?>" aria-expanded="false">
                            <i class="fas fa-home"></i>
                            <span class="hide-menu"><?php echo e(_i('Inicio')); ?></span>
                        </a>
                    </li>
                    <?php if(\App\Menu::menus()!=''): ?>
                        <?php $__currentLoopData = \App\Menu::menus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($item['padre'] == 0): ?>
                                <?php echo $__env->make('templates.material.menu-item', ['item' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ul>
            <?php endif; ?>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
    
    <!-- item-->  <a href="/logout" class="link" data-toggle="tooltip" title="<?php echo e(_i('Cerrar sesión')); ?>"><i class="mdi mdi-power"></i></a>
    </div>
    <!-- End Bottom points-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->