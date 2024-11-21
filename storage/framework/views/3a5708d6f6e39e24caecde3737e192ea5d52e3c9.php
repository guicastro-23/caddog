

<?php $__env->startSection('conteudo-principal'); ?>

<section class="section container">
    <?php if($errors->any()): ?>
        <span style="color: #ff0000">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($error); ?><br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </span>
        <br>
    <?php endif; ?>

    <!-- Adiciona o componente Livewire -->
    
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('cliente-form', [])->html();
} elseif ($_instance->childHasBeenRendered('r7MRp53')) {
    $componentId = $_instance->getRenderedChildComponentId('r7MRp53');
    $componentTag = $_instance->getRenderedChildComponentTagName('r7MRp53');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('r7MRp53');
} else {
    $response = \Livewire\Livewire::mount('cliente-form', []);
    $html = $response->html();
    $_instance->logRenderedChild('r7MRp53', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        
    
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\guilh\best_imoveis\resources\views/clientes/create.blade.php ENDPATH**/ ?>