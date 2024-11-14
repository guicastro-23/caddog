

<?php $__env->startSection('conteudo-principal'); ?>
<style>
    .card-image img {
    width: 70%; /* Largura total da div pai */
    height: 230px; /* Altura fixa para todas as imagens */
    object-fit: cover; /* Recorta a imagem para preencher o espaço definido */
    border-radius: 8px; /* Canto arredondado para um visual mais suave */
}

@media (max-width: 768px) {
    .card-image img {
        height: 200px; /* tablets */
    }
}

@media (max-width: 480px) {
    .card-image img {
        height: 150px; /*smartphones */
    }
}

</style>
    <div class="container">
        <h4>Bem-vindo à Master Dog</h4>
        <p>Explore nosso cardápio!</p>

        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h4><?php echo e($categoria->nome); ?></h4>
            <div class="row">
                <?php $__currentLoopData = $categoria->itensCardapio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col s12 m6 l4">
                        <div class="card">
                            <div class="card-image">
                                <a href="<?php echo e(route('itemCardapio.product', $item->id)); ?>">
                                    <?php if($item->foto): ?>
                                        <img src="<?php echo e(url("storage/{$item->foto}")); ?>" alt="<?php echo e($item->nome); ?>">
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/300x150" alt="Sem Foto">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="card-content">
                                <span class="card-title"><?php echo e($item->nome); ?></span>
                                <p>R$ <?php echo e(number_format($item->preco, 2, ',', '.')); ?></p>
                                <p><?php echo e($item->descricao); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <hr>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\guilh\best_imoveis\resources\views/home/index.blade.php ENDPATH**/ ?>