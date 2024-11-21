<div class="card" style="position: relative; padding-bottom: 60px;">
    <div class="card-content">
        <?php if(isset($itemCardapio)): ?>
            <span class="card-title"><?php echo e($itemCardapio->nome); ?></span>
            <p>R$ <?php echo e(number_format($itemCardapio->preco, 2, ',', '.')); ?></p>
        <?php else: ?>
            <p>Item do cardápio não encontrado.</p>
        <?php endif; ?>

        <?php if(!empty($adicionais)): ?>

            <!-- Divisão em colunas dinâmicas -->
            <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                <?php $__currentLoopData = $adicionais->chunk(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <ul style="flex: 1;">
                        <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adicional): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($adicional->nome); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <div class="quantity-controls" style="display: flex; align-items: center; gap: 20px; margin-top: 10px; border: 1px solid #ccc; padding: 5px; border-radius: 5px; max-width: 150px; justify-content: center; position: absolute; bottom: 10px; right: 10px;">
            <?php if($quantidade > 1): ?>
                <button wire:click="decrementar" style="background: none; border: none; cursor: pointer;">
                    <i class="material-icons">remove</i>
                </button>
            <?php else: ?>
                <button wire:click="deletar" style="background: none; border: none; cursor: pointer;">
                    <i class="material-icons">delete</i>
                </button>
            <?php endif; ?>

            <span><?php echo e($quantidade); ?></span>

            <button wire:click="incrementar" style="background: none; border: none; cursor: pointer;">
                <i class="material-icons">add</i>
            </button>
        </div>

        <!-- Formulário para remover o item -->
        <div style="position: absolute; top: 10px; right: 10px;">
            <button wire:click="deletar" class="btn-floating waves-effect waves-light red"><i class="material-icons">clear</i></button>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\guilh\best_imoveis\resources\views/livewire/carrinho-item.blade.php ENDPATH**/ ?>