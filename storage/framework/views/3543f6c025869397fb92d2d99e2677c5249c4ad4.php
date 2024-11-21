
<?php $__env->startSection('content'); ?>
<div class="section container">
    <div class="header-container">
        <br>
        <h4 class="inline">Adicionar Categorias</h4>
        <a href="<?php echo e(route('admin.categorias.index')); ?>" class="btn-small waves-effect waves-light grey inline">Voltar</a>
    </div>
    <hr>
    <div class="section container">

        <?php if($errors->any()): ?>
            <span style="color: #ff0000">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($error); ?><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </span>
        <br>
        <?php endif; ?>

        <form action="<?php echo e(route('admin.categorias.store')); ?>" method="POST" class="form-container">
            <?php echo csrf_field(); ?>
            <div class='input-field'>
                <label for="nome">Nome da Categoria</label>
                <input type="text" id="nome" name="nome" value="<?php echo e(old('nome')); ?>">
            </div>
            <button type="submit" class="btn-small waves-effect waves-light">Salvar</button>
        </form>
    </div>

    <!-- Botão de Ajuda Flutuante -->
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large blue modal-trigger" href="#helpModal">
            <i class="large material-icons">help_outline</i>
        </a>
    </div>

    <!-- Modal de Ajuda -->
    <div id="helpModal" class="modal">
        <div class="modal-content">
            <h4>Ajuda - Adição de Categoria</h4>
            <p>Nesta página, você pode adicionar uma nova categoria ao sistema.</p>
            <ul>
                <li><strong>Campo Nome:</strong> Insira o nome da categoria que deseja adicionar.</li>
                <li><strong>Salvar:</strong> Clique em "Salvar" para registrar a nova categoria.</li>
                <li><strong>Voltar:</strong> Use o botão "Voltar" para retornar à lista de categorias sem salvar.</li>
            </ul>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close btn grey">Fechar</a>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inicializa os modais
        M.Modal.init(document.querySelectorAll('.modal'));
    });
</script>

<style>
    .form-container {
        max-width: 70%;
        margin: 0 auto;
    }

    .header-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .header-container h4 {
        margin: 0;
    }

    .header-container .btn-small {
        margin-left: auto;
    }

    .input-field {
        margin-bottom: 20px;
    }

    .btn-small {
        margin: 0 5px;
        padding: 5px 10px;
        font-size: 12px;
    }

    .center-align {
        text-align: center;
    }

    .fixed-action-btn {
        position: fixed;
        bottom: 30px;
        right: 30px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\guilh\best_imoveis\resources\views/admin/categorias/create.blade.php ENDPATH**/ ?>