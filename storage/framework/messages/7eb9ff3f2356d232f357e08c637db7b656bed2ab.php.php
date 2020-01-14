<!DOCTYPE html>
<html>
<head>
	<title><?php echo e(env('APP_NAME')); ?> - <?php echo $__env->yieldContent('title_page'); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/web/giftcard.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/web/bootstrap.css')); ?>">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<div class="container login-page my-4 px-sm-5">
		<div class="row login-register">
			<div class="col col-12 col-sm-6 p-0 login-img">
				<img class="w-80 mb-0 mt-5" src="<?php echo e(asset('/images/giftcard/banner.svg')); ?>">
			</div>

			<div class="col col-12 col-sm-6 p-4 p-sm-5 login-form">
				<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo e(route('login')); ?>">Ingresar</a>
					</li>
					<li class="nav-item">
						<?php if(is_numeric(substr(URL::full(), strpos(URL::full(), '=') + 1))): ?>
							<a class="nav-link" href="<?php echo e(route('register', ['giftcard' => substr(URL::full(), strpos(URL::full(), '=') + 1)])); ?>">
								Registrarse
							</a>
						<?php else: ?>
							<a class="nav-link" href="<?php echo e(route('register')); ?>">
								Registrarse
							</a>
						<?php endif; ?>
					</li>
				</ul>

				<div class="tab-content mt-4" id="myTabContent">
					<?php echo $__env->yieldContent('content'); ?>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>