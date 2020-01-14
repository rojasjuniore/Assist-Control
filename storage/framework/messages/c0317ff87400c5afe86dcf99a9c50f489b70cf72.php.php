<?php $messages = app('navbar.messages'); ?>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
        <?php if($messages->get()->count() > 0): ?>
            <div class="notify">
                <span class="heartbit"></span> <span class="point"></span>
            </div>
        <?php endif; ?>
    </a>
    <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
        <ul>
            <li>
                <div class="drop-title">You have <?php echo e($messages->get()->count()); ?> new messages</div>
            </li>
            <li>
                <div class="message-center">

                    <?php $__currentLoopData = $messages->get()->slice($start = 0, $howMany = 6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="#">
                            <div class="user-img">
                                
                                <img src="/vendor/wrappixel/material-pro/4.2.1/assets/images/users/1.jpg"
                                     alt="user"
                                     class="img-circle"
                                >
                                    <span class="profile-status online pull-right"></span>
                            </div>
                            <div class="mail-contnet">
                                <h5><?php echo e($message->author->name); ?></h5>
                                <span class="mail-desc">
                                    <?php echo e(str_limit($message->title, 40)); ?>

                                </span>
                                <span class="time">
                                    <?php echo e($message->created_at->diffForHumans()); ?>

                                </span>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>
            </li>
            <li>
                <a class="nav-link text-center" href="javascript:void(0);">
                    <?php if($messages->get()->count() > 0): ?>
                        <span> Displaying <?php echo e($howMany); ?>. </span>
                    <?php endif; ?>
                    <strong> See all e-Mails</strong>
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        </ul>
    </div>
</li>
