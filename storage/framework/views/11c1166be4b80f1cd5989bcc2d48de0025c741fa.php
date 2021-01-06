<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(asset(mix('css/app.css'))); ?>">

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src="<?php echo e(asset(mix('js/vendor.js'))); ?>"></script>
    <script src="<?php echo e(asset(mix('js/app.js'))); ?>" defer></script>
</head>

<body class="hold-transition sidebar-mini">
    <div id="app" data-page="<?php echo e(json_encode($page)); ?>"></div>
</body>

</html><?php /**PATH F:\proyectos_unsa\adm-grados\resources\views/app.blade.php ENDPATH**/ ?>