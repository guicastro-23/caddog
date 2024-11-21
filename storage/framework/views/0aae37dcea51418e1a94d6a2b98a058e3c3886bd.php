<div>
    <span wire:click="toggleDetalhes" style="cursor: pointer; color: #000000; font-weight: bold; display: flex; align-items: center;">
        Exibir detalhes
        <i class="material-icons" style="margin-left: 5px;"><?php echo e($mostrarDetalhes ? 'arrow_drop_up' : 'arrow_drop_down'); ?></i>
    </span>

    <?php if($mostrarDetalhes): ?>
        <div style="padding-top: 10px; border-top: 1px solid #ccc; margin-top: 5px;">
            <?php $__currentLoopData = $pedido->pedidoItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><strong>Item: </strong> <?php echo e($item->itemCardapio->nome); ?></p>
                <!-- Verifica se o item pertence à categoria "Lanche" -->
                <?php if($item->itemCardapio->categoria && $item->itemCardapio->categoria->nome === 'Lanche'): ?>
                    <?php if($item->adicionais->isNotEmpty()): ?>
                        <div style="display: flex; justify-content: space-between;">
                            <div style="width: 45%;">
                                <ul>
                                    <?php $__currentLoopData = $item->adicionais->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedidoItemAdicional): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($pedidoItemAdicional->adicional->nome); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>

                            <!-- Se houver mais de 5 adicionais, exibe na segunda coluna -->
                            <?php if($item->adicionais->count() > 5): ?>
                                <div style="width: 45%; border-left: 1px solid #ccc; padding-left: 10px;">
                                    <ul>
                                        <?php $__currentLoopData = $item->adicionais->slice(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedidoItemAdicional): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($pedidoItemAdicional->adicional->nome); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <hr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\guilh\best_imoveis\resources\views/livewire/exibir-detalhes.blade.php ENDPATH**/ ?>