<?php $__env->startComponent('mail::message'); ?>
Buenas

Hola, <?php echo e($giftcard->user->name . ' ' . $giftcard->user->surname); ?>, la solicitud ya fue ejectuada,
esperamos su comentario en Facebook, ya que para nosotros es de gran importancia...


Inicia sesión para que puedas ver el estatus de tu transferencia.
<?php $__env->startComponent('mail::button', ['url' => env('APP_URL') . 'login']); ?>
Inicia sesión
<?php echo $__env->renderComponent(); ?>

<img src="<?php echo e(env('APP_URL') . $transfer->capture); ?>" alt="">

Gracias,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
