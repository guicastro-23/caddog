<div class="col s12 m6 l4">
    <ul class="collapsible">
        <li class="active">
            <div class="collapsible-header yellow lighten-1 valign-wrapper">
                <h5 class="black-text flow-text" style="flex: 1;">
                    <i class="material-icons black-text">build</i>
                    <strong>Em produção</strong>
                </h5>
                <div class="right-align" style="display: flex; align-items: center;">
                    <span class="black-text" style="font-size: 1.5em; margin-right: 10px;"><?php echo e($numeroPedidosEmProcesso); ?></span>
                    <i class="material-icons black-text" id="icon-emProducao" onclick="toggleDetails('emProducao')">arrow_drop_up</i>
                </div>
            </div>
            <div class="collapsible-body" id="details-emProducao" style="display: block;">
                <?php if($pedidosEmProcesso->isNotEmpty()): ?>
                    <?php $__currentLoopData = $pedidosEmProcesso; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
} elseif ($_instance->childHasBeenRendered('l693561711-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l693561711-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l693561711-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l693561711-0');
} else {
    $response = \Livewire\Livewire::mount('exibir-detalhes', ['pedido' => $pedido]);
    $html = $response->html();
    $_instance->logRenderedChild('l693561711-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                        <!-- Div para centralizar o botão Avançar -->
                        <div style="display: flex; justify-content: center; margin-top: 10px;">
                            <form action="<?php echo e(route('admin.pedidos.avancarPr', $pedido->id)); ?>" method="POST" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="waves-effect waves-light btn btn-custom" style="display: flex; align-items: center; justify-content: center;">
                                    <strong>Avançar</strong>
                                    <span style="margin-left: 20px;">
                                        <i class="material-icons">arrow_forward</i>
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <p>Nenhum Pedido em Produção</p>
                <?php endif; ?>
            </div>
        </li>
    </ul>
</div><?php /**PATH C:\Users\guilh\best_imoveis\resources\views/livewire/pedidos-em-producao.blade.php ENDPATH**/ ?>