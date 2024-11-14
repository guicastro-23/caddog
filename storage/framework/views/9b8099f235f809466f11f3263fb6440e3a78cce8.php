<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Master Dog</title>
    <!-- Import Google Icon Font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <?php echo \Livewire\Livewire::styles(); ?>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>


<nav class="orange darken-4">
    <div class="nav-wrapper container">
        <a href="<?php echo e(route('home.index')); ?>" class="brand-logo">Master Dog</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="<?php echo e(route('home.index')); ?>">Início</a></li>
            <li><a href="<?php echo e(url('/carrinho')); ?>">Carrinho</a></li>
        </ul>
    </div>
</nav>


<ul class="sidenav" id="mobile-demo">
    <li><a href="<?php echo e(route('home.index')); ?>">Início</a></li>
    <li><a href="<?php echo e(url('/carrinho')); ?>">Carrinho</a></li>
</ul>


<div class="container">
    <?php echo $__env->yieldContent('conteudo-principal'); ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        M.Sidenav.init(elems);

        <?php if(session('sucesso')): ?>
        M.toast({html: '<?php echo e(session('sucesso')); ?>'});
        <?php endif; ?>
    });
</script>

<?php echo $__env->yieldContent('scripts'); ?>


<div class="container">
    <?php echo $__env->yieldContent('conteudo-secundario'); ?>
</div>

<?php echo \Livewire\Livewire::scripts(); ?>

</body>
</html>
<?php /**PATH C:\Users\guilh\best_imoveis\resources\views/admin/layouts/principal.blade.php ENDPATH**/ ?>