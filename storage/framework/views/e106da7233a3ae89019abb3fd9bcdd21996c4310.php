

<?php $__env->startSection('conteudo-principal'); ?>
<div class="container">
    <h4>Detalhes do Pedido #<?php echo e($pedido->id); ?></h4>
    <p><strong>Cliente:</strong> <?php echo e($pedido->cliente->nome); ?></p>
    <p><strong>Telefone:</strong>
        <?php
        $telefone = $pedido->cliente->telefone;
        if(strlen($telefone) == 11) { 
            $telefoneFormatado = '(' . substr($telefone, 0, 2) . ') ' . substr($telefone, 2, 5) . '-' . substr($telefone, 7);
        } else {
            $telefoneFormatado = $telefone;
        }
        ?>
        <?php echo e($telefoneFormatado); ?>

    </p>

    <p><strong>Tempo de espera:</strong> 40 minutos</p>

    <p><strong>Endereço de entrega:</strong>
        <?php if($pedido->endereco): ?>
            <?php echo e($pedido->endereco->logradouro); ?>, <?php echo e($pedido->endereco->numero); ?>, <?php echo e($pedido->endereco->bairro); ?>

            <br>
            <?php echo e($pedido->endereco->complemento); ?>

        <?php else: ?>
            Retirar no estabelecimento.
        <?php endif; ?>
    </p>

    <hr>

    <!-- Calcular a taxa de entrega com base no endereço -->
    <?php
        $taxaEntrega = 0;
        if (!$pedido->retirar && $pedido->endereco) {
            $bairro = $pedido->endereco->bairro;
            if (in_array($bairro, ['Alvorada', 'Almirante'])) {
                $taxaEntrega = 10.00;
            } elseif (in_array($bairro, ['Santa Cruz', 'Bela Vista'])) {
                $taxaEntrega = 8.00;
            } elseif (in_array($bairro, ['Castrolanda'])) {
                $taxaEntrega = 20.00;
            } else {
                $taxaEntrega = 7.00;
            }
        }
        $totalComTaxa = $pedido->total - $taxaEntrega;
    ?>

    <!-- Tabela de itens do pedido -->
    <table style="width: 100%;">
        <thead>
            <tr>
                <th>Quantidade</th>
                <th>Descrição</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $pedido->pedidoItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->quantidade); ?></td>
                    <td>
                        <?php echo e($item->itemCardapio->nome); ?>

                        <?php if($item->adicionais->isNotEmpty()): ?>
                            <ul>
                                <?php $__currentLoopData = $item->adicionais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedidoItemAdicional): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($pedidoItemAdicional->adicional->nome); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </td>
                    <td>R$ <?php echo e(number_format($item->itemCardapio->preco, 2, ',', '.')); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <hr>
    <p><strong>SubTotal:</strong> R$ <?php echo e(number_format($totalComTaxa, 2, ',', '.')); ?></p>
    <p><strong>Taxa de Entrega:</strong> R$ <?php echo e(number_format($taxaEntrega, 2, ',', '.')); ?></p>
    <p style="font-size: 1.5em; font-weight: bold;">
        <strong>Total:</strong> R$ <?php echo e(number_format($pedido->total, 2, ',', '.')); ?>

    </p>

    <hr>

    <p><strong>Método de Pagamento:</strong> <?php echo e(ucfirst($pedido->metdPag)); ?></p>
    <p><strong>Data de Criação:</strong> <?php echo e(\Carbon\Carbon::parse($pedido->data_pedido)->format('d/m/Y')); ?> - <strong>Horário:</strong> <?php echo e(\Carbon\Carbon::parse($pedido->data_pedido)->format('H:i')); ?></p>
    <?php if($pedido->status == 'finalizado' && $pedido->updated_at): ?>
        <p><strong>Data de Finalização:</strong> <?php echo e(\Carbon\Carbon::parse($pedido->updated_at)->format('d/m/Y')); ?> - <strong>Horário:</strong> <?php echo e(\Carbon\Carbon::parse($pedido->updated_at)->format('H:i')); ?></p>

        <!-- Cálculo do tempo decorrido -->
        <?php
            $createdAt = \Carbon\Carbon::parse($pedido->data_pedido);
            $updatedAt = \Carbon\Carbon::parse($pedido->updated_at);
            $tempoDecorridoEmMinutos = $createdAt->diffInMinutes($updatedAt);
            $tempoDecorridoEmHoras = $createdAt->diffInHours($updatedAt);
            $tempoDecorrido = ($tempoDecorridoEmHoras >= 1) ? $tempoDecorridoEmHoras . ' hora(s)' : $tempoDecorridoEmMinutos . ' minuto(s)';
        ?>
        <p><strong>Tempo Decorrido:</strong> <?php echo e($tempoDecorrido); ?></p>
    <?php endif; ?>

    <p><strong>Status:</strong>
        <?php if($pedido->status == 'em_processo'): ?>
            Em Andamento
        <?php elseif($pedido->status == 'concluido'): ?>
            Pronto para entrega
        <?php else: ?>
            <?php echo e(ucfirst($pedido->status)); ?>

        <?php endif; ?>
    </p>
</div>

<script>
    setInterval(function() {
        location.reload();
    }, 10000);
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\guilh\best_imoveis\resources\views/pedido/detalhes.blade.php ENDPATH**/ ?>