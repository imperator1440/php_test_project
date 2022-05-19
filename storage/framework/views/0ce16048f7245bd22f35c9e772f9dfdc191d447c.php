<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">-->
    <title>NEWS</title>
</head>

<body>
<header class="p-3 bg-dark text-white mb-3">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="<?php echo e(route("home")); ?>" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none h1">NEWS</a>
     
    </div>
  </div>
</header>

<form action="<?php echo e(route('registration_process')); ?>" class="col-3 offset-4 border rounded " methot="POST" >
    <?php echo csrf_field(); ?>
    <h2 class="offset-1 py-2">Sign up</h2>
    <div class="offset-1 form-group col-9">
      <label for="name" class="col-form-label-lg">name</label>
      <input class="form-control" id="name" name="name" type="text" value="" placeholder="name">
    </div>
    <div class="offset-1 form-group col-9">
      <label for="email" class="col-form-label-lg">email</label>
      <input class="form-control" id="email" name="email" type="text" value="" placeholder="email">
      <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="alert alety-danger"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>  

    <div class="offset-1 form-group col-9 mb-1">
      <label for="password" class="col-form-label-lg">password</label>
      <input class="form-control" id="password" name="password" type="password" value="" placeholder="password">
      <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="alert alety-danger"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="offset-1 form-group col-9 mb-1">
      <input class="form-control" name="password_confirmation" type="password" value="" placeholder="repeat password">
    </div>
    <div>
        <a href="<?php echo e(route('login')); ?>" class="offset-1 font-mediun text-blue-900 hover:bg-blue-300 rounded-md p-2">Log in</a>      
    </div>
    <div>
      <button class="offset-1 btn btn-outline-light me-2 mb-2 bg-dark mt-1" type="submit" name="sendMe" value="1">Sign up</button>     
    </div>
</form>

</body>





<?php /**PATH C:\OpenServer\domains\diplom\resources\views/registration.blade.php ENDPATH**/ ?>