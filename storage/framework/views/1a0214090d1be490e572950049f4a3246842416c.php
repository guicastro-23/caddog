<div class="row" style="margin-top: 10px">
    <div class="collection mb-0  grey lighten-3"  >
        <h5 class="h5-header">Endereço de entrega:</h5>
        <?php if($enderecos->isEmpty()): ?>
            <a href="<?php echo e(route('enderecos.create')); ?>" class="btn waves-effect waves-light">Adicionar Novo Endereço</a>
        <?php else: ?>
        <ul>
            <?php $__currentLoopData = $enderecos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $endereco): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <label>
                        <input type="radio" name="endereco_id" wire:click="atualizarEndereco(<?php echo e($endereco->id); ?>)"
                            <?php if($enderecoSelecionado == $endereco->id && !$retirar): ?> checked <?php endif; ?> />
                        <span style="font-size: 1.5em;color:black"><?php echo e($endereco->logradouro); ?>, <?php echo e($endereco->numero); ?> - <?php echo e($endereco->bairro); ?></span>

                        <br>

                        <a href="#" wire:click.prevent="excluirEndereco(<?php echo e($endereco->id); ?>)"
                            style="margin-left: 10px; color: red; font-size: 1.5em;">
                             <span>Excluir</span>
                        </a>
                        <hr style="opacity: 0.5">
                    </label>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
         <!-- Botão para cadastrar um segundo endereço -->
        <a href="<?php echo e(route('enderecos.create')); ?>" class="btn-small waves-effect waves-light" style="margin-top: 10px; padding: 0 10px; font-size: 0.9em;">
            Adicionar Novo Endereço
        </a>
        <?php endif; ?>
        <hr style="opacity: 0.3">
        <div>
            <label>
                <input type="radio" name="retirar" wire:click="atualizarEndereco('')" <?php if($retirar): ?> checked <?php endif; ?> />
                <span style="font-size: 1.5em; color:black">Retirar no estabelecimento</span> <br>
                <span style="font-size: 1.3em; margin-left: 30px; color:black">Travessa Alda De Andrade Krelling, 317 - Morada Do Sol</span>
            </label>
        </div>
    </div>
</div>

<?php /**PATH C:\Users\guilh\best_imoveis\resources\views/livewire/endereco-selecionado.blade.php ENDPATH**/ ?>