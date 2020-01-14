<?php $__env->startComponent('mail::message'); ?>

# Hola



Hola, <?php echo e($giftcard->user->name); ?> <?php echo e($giftcard->user->surname); ?>, gracias por utilizar Giftcardreembolsable.com Giftcard!



Nota: las transferencias se hacen de lunes a viernes (no feriados) en horario de 8:00am a 4:00pm hora de Venezuela. Máximo en 48 horas (sólo días hábiles) están enviadas.


* Nombre del titular : <?php echo e($transfer->name_titular); ?>


* Cedula de Identidad : <?php echo e($transfer->dni); ?>


* Entidad Bancaria: <?php echo e($transfer->bank); ?>


* Numero de Cuenta: <?php echo e($transfer->bank_account); ?>


* Email: <?php echo e($transfer->user->email); ?>


* Codigo Giftcard: <?php echo e($giftcard->code); ?>


* Monto Giftcard: US$ <?php echo e($giftcard->amount); ?>


* Tipo de Cambio Aplicar : Bsf. <?php echo e(number_format($transfer->rate, 2, ',', '.')); ?>


<!-- * Cargos de Operacion : US$ <?php echo e($giftcard->amount * .05); ?> -->

* Total Reembolsable: Bsf. <?php echo e(number_format($transfer->total_reimbursable, 2, ',', '.')); ?>





<?php $__env->startComponent('mail::button', ['url' => env('APP_URL') . '/login']); ?>

Inicia sesión

<?php echo $__env->renderComponent(); ?>



Gracias,<br>

<?php echo e(config('app.name')); ?>


<?php echo $__env->renderComponent(); ?>

