

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

    <div class="container" style="padding-bottom: 100px;  ">
        <div class="header-container">
            <a href="<?php echo e(route('home.index')); ?>" class="waves-effect waves-light">
                <i class="material-icons black-text">arrow_back</i>
            </a>
            <h4 class="inline">Seu Carrinho</h4>
        </div>
        <hr>
        <div>
            <?php if(session()->get('pedido')): ?>
                <?php $__currentLoopData = session()->get('pedido'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('carrinho-item', ['index' => $index])->html();
} elseif ($_instance->childHasBeenRendered($index)) {
    $componentId = $_instance->getRenderedChildComponentId($index);
    $componentTag = $_instance->getRenderedChildComponentTagName($index);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($index);
} else {
    $response = \Livewire\Livewire::mount('carrinho-item', ['index' => $index]);
    $html = $response->html();
    $_instance->logRenderedChild($index, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div style="text-align: center; margin-top: 20px;">
                    <a href="<?php echo e(route('home.index')); ?>" class="btn btn-full-width waves-effect waves-light orange darken-4">
                        Adicionar Produtos
                    </a>
                </div>
            <?php endif; ?>
        </div>

        <div style="margin-bottom: 80px;">
             <?php if(session()->get('pedido')): ?>
            <div style="text-align: center; margin-top: 25px;">
                <a href="<?php echo e(route('home.index')); ?>"
                   class="btn btn-full-width waves-effect waves-dark orange darken-4">
                    Adicionar Mais Itens
                </a>
            </div>
             <?php endif; ?>
        </div>
       
    </div>
   

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('carrinho-total', [])->html();
} elseif ($_instance->childHasBeenRendered('JUu3Kwc')) {
    $componentId = $_instance->getRenderedChildComponentId('JUu3Kwc');
    $componentTag = $_instance->getRenderedChildComponentTagName('JUu3Kwc');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('JUu3Kwc');
} else {
    $response = \Livewire\Livewire::mount('carrinho-total', []);
    $html = $response->html();
    $_instance->logRenderedChild('JUu3Kwc', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\guilh\best_imoveis\resources\views/carrinho/index.blade.php ENDPATH**/ ?>