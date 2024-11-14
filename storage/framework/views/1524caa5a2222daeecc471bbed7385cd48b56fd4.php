<div class="col s12 m6 l4">
    <ul class="collapsible">
        <li class="active">
            <div class="collapsible-header green lighten-1 valign-wrapper">
                <i class="material-icons white-text">check_circle</i>
                <h5 class="white-text flow-text" style="flex: 1;">
                    <strong>Prontos para entrega</strong>
                </h5>
                <div class="right-align" style="display: flex; align-items: center;">
                    <span class="white-text" style="font-size: 1.5em; margin-right: 10px;"><?php echo e($numeroPedidosConcluidos); ?></span>
                    <i class="material-icons white-text" id="icon-prontosEntrega" onclick="toggleDetails('prontosEntrega')">arrow_drop_up</i>
                </div>
            </div>
            <div class="collapsible-body" id="details-prontosEntrega" style="display: block;">
                <?php if($pedidosConcluidos->isNotEmpty()): ?>
                    <?php $__currentLoopData = $pedidosConcluidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="pedido-info" style="border: 1px solid #ccc; padding: 15px; border-radius: 15px; background-color: #fff; margin-bottom: 20px;">
                        <div class="pedido-info-header" style="display: flex; align-items: center; justify-content: space-between;">
                            <p class="flow-text">
                                <strong>Pedido:</strong> <?php echo e($pedido->id); ?>

                            </p>
                            <p class="flow-text">
                                <i class="material-icons">access_time</i>
                                <?php echo e(\Carbon\Carbon::parse($pedido->created_at)->format('H:i')); ?>

                            </p>


                        </div>
                            <hr>
                            <p>
                                <strong>Cliente:</strong> <?php echo e(explode(' ', trim($pedido->cliente->nome))[0]); ?>

                                <span style="margin-left:100px">
                                    <strong>Total:</strong> R$ <?php echo e(number_format($pedido->total, 2, ',', '.')); ?>

                                </span>
                                <br>
                                <p>
                                    <?php
                                        $telefone = $pedido->cliente->telefone;
                                        if(strlen($telefone) == 11) { // Verifica se o número tem 11 dígitos (incluindo DDD)
                                            $telefoneFormatado = '(' . substr($telefone, 0, 2) . ') ' . substr($telefone, 2, 5) . '-' . substr($telefone, 7);
                                        } else {
                                            $telefoneFormatado = $telefone; // Caso não tenha 11 dígitos, exibe o número como está
                                        }
                                    ?>
                                    <?php echo e($telefoneFormatado); ?>

                                    <span style="margin-left:100px">
                                        <strong><?php echo e(ucfirst($pedido->metdPag)); ?></strong>
                                    </span>
                                </p>
                            </p>
                            <hr>
                            
                            <?php if($pedido->endereco): ?>
                                <p><strong>Endereço:</strong>
                                    <?php echo e($pedido->endereco->logradouro); ?>, <?php echo e($pedido->endereco->numero); ?>, <?php echo e($pedido->endereco->bairro); ?>

                                </p>
                            <?php elseif($pedido->retirar): ?>
                                <p><span><strong>Retirada no Balcão</strong></span></p>
                            <?php else: ?>
                                <p><span>Endereço não disponível</span></p>
                            <?php endif; ?>

                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('exibir-detalhes', ['pedido' => $pedido])->html();
} elseif ($_instance->childHasBeenRendered('l129873712-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l129873712-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l129873712-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l129873712-0');
} else {
    $response = \Livewire\Livewire::mount('exibir-detalhes', ['pedido' => $pedido]);
    $html = $response->html();
    $_instance->logRenderedChild('l129873712-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                            <form action="<?php echo e(route('admin.pedidos.finalizado', $pedido->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" style="margin-left:110px" class="waves-effect waves-light btn btn-custom">
                                    <strong>Finalizar</strong>
                                </button>
                            </form>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <p>Visualize os pedidos prontos para entrega.</p>
                <?php endif; ?>
            </div>
        </li>
    </ul>
</div><?php /**PATH C:\Users\guilh\best_imoveis\resources\views/livewire/pronto-entrega.blade.php ENDPATH**/ ?>