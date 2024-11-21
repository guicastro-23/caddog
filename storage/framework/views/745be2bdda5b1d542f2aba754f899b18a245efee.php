

<?php $__env->startSection('conteudo-principal'); ?>

<style>
    .header-container {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        
    }

    .header-container a {
        margin-right: 10px; /* Espaço menor para mobile */
    }

    .header-container h4 {
        margin: 0;
    }

    .header-container i {
        font-size: 24px;
        vertical-align: middle;
    }

    /* Estilos adicionais para dispositivos móveis */
    @media (max-width: 600px) {
        .header-container {
            flex-direction: column;
            align-items: flex-start;
        }
        .btn-full-width {
            width: 100% !important;
            margin-top: 10px;
        }
    }

    @media (min-width: 601px) {
        .btn-fixed-width {
            width: 300px;
        }
    }
</style>
    <div class="container">

        <?php if(empty($pedido)): ?>
            <p>Seu carrinho está vazio.</p>
        <?php else: ?>
        
        <?php $__currentLoopData = $pedido; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <div class="header-container">
            <a href="<?php echo e(route('carrinho.index')); ?>" class="waves-effect waves-light">
                <i class="material-icons black-text">arrow_back</i>
            </a>
            <h4 class="inline">Finalizar Pedido</h4>
            
        </div>
        <hr>
           

         <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('endereco-selecionado', ['enderecos' => $enderecos])->html();
} elseif ($_instance->childHasBeenRendered('4sGdFxd')) {
    $componentId = $_instance->getRenderedChildComponentId('4sGdFxd');
    $componentTag = $_instance->getRenderedChildComponentTagName('4sGdFxd');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('4sGdFxd');
} else {
    $response = \Livewire\Livewire::mount('endereco-selecionado', ['enderecos' => $enderecos]);
    $html = $response->html();
    $_instance->logRenderedChild('4sGdFxd', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    
            

            
            <div class="row">
                <div class="collection mb-0 grey lighten-3">
                    <h5 class="h5-header">Método de pagamento:</h5>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('metodo-pagamento')->html();
} elseif ($_instance->childHasBeenRendered('2wz0zuj')) {
    $componentId = $_instance->getRenderedChildComponentId('2wz0zuj');
    $componentTag = $_instance->getRenderedChildComponentTagName('2wz0zuj');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('2wz0zuj');
} else {
    $response = \Livewire\Livewire::mount('metodo-pagamento');
    $html = $response->html();
    $_instance->logRenderedChild('2wz0zuj', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>
            </div>

            
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('finalizar-pedido')->html();
} elseif ($_instance->childHasBeenRendered('4XM23j3')) {
    $componentId = $_instance->getRenderedChildComponentId('4XM23j3');
    $componentTag = $_instance->getRenderedChildComponentTagName('4XM23j3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('4XM23j3');
} else {
    $response = \Livewire\Livewire::mount('finalizar-pedido');
    $html = $response->html();
    $_instance->logRenderedChild('4XM23j3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

            
        <?php endif; ?>

        <style>
            .card-panel {
                margin: 0 !important; /* Remove a margem externa */
                padding: 15px; /* Ajusta o preenchimento interno */
                border: 1px solid #e0e0e0; /* Cria uma borda fina ao redor */
                border-radius: 0; /* Remove o arredondamento */
            }

            .divider {
                margin: 10px 0; /* Ajusta o espaçamento vertical da linha divisória */
            }

            .section {
                padding: 0; /* Remove preenchimento extra da section */
            }

            .h5-header {
                margin-bottom: 5px; /* Diminui a margem abaixo dos headers */
            }
        </style>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\guilh\best_imoveis\resources\views/checkout/index.blade.php ENDPATH**/ ?>