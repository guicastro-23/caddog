

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
} elseif ($_instance->childHasBeenRendered('MA99GqN')) {
    $componentId = $_instance->getRenderedChildComponentId('MA99GqN');
    $componentTag = $_instance->getRenderedChildComponentTagName('MA99GqN');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('MA99GqN');
} else {
    $response = \Livewire\Livewire::mount('cliente-form', []);
    $html = $response->html();
    $_instance->logRenderedChild('MA99GqN', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        
    
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\guilh\best_imoveis\resources\views/clientes/create.blade.php ENDPATH**/ ?>