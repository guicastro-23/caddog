

<?php $__env->startSection('conteudo-principal'); ?>

<section class="section">
<table class="highlight">
    <thead>
        <tr>
            <th>Cidade</th>
            <th class="right-align">Opções</th>
        </tr>
    </thead>

    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $cidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cidade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($cidade->nome); ?></td>
                <td><?php echo e($cidade->sigla); ?></td>
                <td class="right-align">Excluir - Remover</td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <td colspan="2"> Não existem cidades cadastradas </td>
        <?php endif; ?>
    </tbody>
</table>

<div class="fixed-action-btn">
    <a href="<?php echo e(route('admin.cidades.form')); ?>" class="btn-floating btn-large waves-effect waves-light">
        <i class="large material-icons">
            add
        </i>
    </a>
</div>



</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('conteudo-secundario'); ?>
<p>TExto secundario</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\guilh\best_imoveis\resources\views/admin/cidades/index.blade.php ENDPATH**/ ?>