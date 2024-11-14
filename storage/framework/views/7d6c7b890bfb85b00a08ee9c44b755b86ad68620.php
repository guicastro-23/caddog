

<?php $__env->startSection('content'); ?>


<div class="section container">

    <div div class="header-container center-align" style="display: flex; justify-content: center;
     align-items: center; height: 30px;">
        <h4 class="inline">Pedidos do dia</h4>
    </div>

    <hr>

    <div class="row">
        <!-- Painel Pendentes -->
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('pedidos-pendentes', [])->html();
} elseif ($_instance->childHasBeenRendered('iky0BSd')) {
    $componentId = $_instance->getRenderedChildComponentId('iky0BSd');
    $componentTag = $_instance->getRenderedChildComponentTagName('iky0BSd');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('iky0BSd');
} else {
    $response = \Livewire\Livewire::mount('pedidos-pendentes', []);
    $html = $response->html();
    $_instance->logRenderedChild('iky0BSd', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>


        <!-- Painel Em Produção -->
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('pedidos-em-producao', [])->html();
} elseif ($_instance->childHasBeenRendered('JJw562O')) {
    $componentId = $_instance->getRenderedChildComponentId('JJw562O');
    $componentTag = $_instance->getRenderedChildComponentTagName('JJw562O');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('JJw562O');
} else {
    $response = \Livewire\Livewire::mount('pedidos-em-producao', []);
    $html = $response->html();
    $_instance->logRenderedChild('JJw562O', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>


        <!-- Painel Prontos para Entrega -->
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('pronto-entrega', [])->html();
} elseif ($_instance->childHasBeenRendered('KsWX9M8')) {
    $componentId = $_instance->getRenderedChildComponentId('KsWX9M8');
    $componentTag = $_instance->getRenderedChildComponentTagName('KsWX9M8');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('KsWX9M8');
} else {
    $response = \Livewire\Livewire::mount('pronto-entrega', []);
    $html = $response->html();
    $_instance->logRenderedChild('KsWX9M8', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        

        <div class="row">
            <div class="col s12" style="display: flex; justify-content: flex-end; margin-top: 20px;">
                <a href="<?php echo e(route('admin.pedidos.historico')); ?>" class="btn-small waves-effect waves-light green inline">
                    <i class="material-icons left">history</i> Histórico
                </a>
            </div>
        </div>
    </div>

    <!-- Help Modal -->
    <div id="helpModal" class="modal">
        <div class="modal-content">
            <h4>Ajuda</h4>
            <p>Esta é a página de gerenciamento de pedidos. Você pode visualizar os pedidos pendentes, em produção e prontos para entrega.</p>
            <p>Para avançar um pedido, clique no botão "Avançar" ao lado do pedido correspondente.</p>
            <p>Para ver o histórico de pedidos, clicar no botão "Histórico"</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close btn grey">Fechar</a>
        </div>
    </div>
</div>



</div>

<div class="fixed-action-btn">
    <a class="btn-floating btn-large blue modal-trigger" href="#helpModal">
        <i class="large material-icons">help_outline</i>
    </a>
</div>

  <!-- Floating Help Button -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inicializa os modais
        M.Modal.init(document.querySelectorAll('.modal'));
    });

    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.collapsible');
        M.Collapsible.init(elems);
    });


   
</script>



<style>
    .header-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 2px;

    }

    hr {
        margin-top: 1px;
        margin-bottom: 20px;
    }

    .header-container h4 {
        margin: 1%;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .header-container .btn-small {
        margin-left: auto;
    }

    .table-container {
        max-width: 100%;
        margin: 0 auto;
        overflow-y: auto;
        height: 400px;
    }

    table {
        margin: 0;
        width: 100%;
        border-collapse: collapse;
    }

    table th, table td {
        padding: 10px;
        font-size: 14px;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #f5f5f5;
        position: sticky;
        top: 0;
        z-index: 5;
    }

    table th:last-child, table td:last-child {
        text-align: right;
    }

    .btn-small {
        padding: 5px 10px;
        font-size: 12px;
    }

    .modal.small-modal {
        width: 40% !important;
        max-height: 200px;
    }

    .header-link {
        color: inherit;
        text-decoration: none;
    }

    .header-link:hover {
        text-decoration: underline;
    }

    .fixed-action-btn {
        position: fixed;
        bottom: 30px;
        right: 30px;
    }
</style>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\guilh\best_imoveis\resources\views/admin/pedidos/index.blade.php ENDPATH**/ ?>