

<?php $__env->startSection('conteudo-principal'); ?>

    <style>
        .header-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .header-container a {
            margin-right: 20px;
        }

        .header-container h4 {
            margin: 0;
        }

        .card {
            width: 100%;
            max-width: 300px;
            margin: 10px auto;
        }

        .card-image img {
            width: 70%; /* Largura total da div pai */
            height: 230px; /* Altura fixa para todas as imagens */
            object-fit: cover; /* Recorta a imagem para preencher o espaço definido */
            border-radius: 8px; /* Canto arredondado para um visual mais suave */
        }

        .form-container {
            margin-top: 20px;
        }

        .btn-container {
            margin-top: 20px;
            text-align: right;
        }

        .input-field {
            margin-bottom: 10px;
        }

        /* Layout da grade para os adicionais */
        .adicionais-container {
            display: flex;
            flex-wrap: wrap; /* Permite quebra de linha entre colunas */
            gap: 15px; /* Espaço entre os itens */
        }

        .input-field {
            flex: 1 1 48%; /* Cada item ocupa 48% da largura */
        }

   
    </style>

    <div class="container">

        <div class="header-container">
            <a href="<?php echo e(route('home.index')); ?>" class="waves-effect waves-light">
                <i class="material-icons black-text">arrow_back</i>
            </a>
            <h4 class="inline">Detalhes do Pedido</h4>
        </div>
        <hr>

        <div class="card">
            <div class="card-image">
                <?php if($itemCardapio->foto): ?>
                    <img src="<?php echo e(url("storage/{$itemCardapio->foto}")); ?>" alt="<?php echo e($itemCardapio->nome); ?>">
                <?php else: ?>
                    <img src="https://via.placeholder.com/300x150" alt="Sem Foto">
                <?php endif; ?>
            </div>
            <div class="card-content">
                <span class="card-title"><?php echo e($itemCardapio->nome); ?></span>
                <p>R$ <?php echo e(number_format($itemCardapio->preco, 2, ',', '.')); ?></p>
                <p><?php echo e($itemCardapio->descricao); ?></p>
            </div>
        </div>

        <form action="<?php echo e(route('itemCardapio.salvarAdicionais', $itemCardapio)); ?>" method="POST" class="form-container">
            <?php echo csrf_field(); ?>

            <!-- Container para os adicionais -->
            <div class="adicionais-container">
                <?php
                $adicionaisCount = count($adicionais); // Contando o total de adicionais
            ?>
            
            <!-- Exibindo primeiros 5 adicionais -->
            <?php $__currentLoopData = collect($adicionais)->slice(0, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adicional): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="input-field">
                    <label>
                        <input type="checkbox" name="adicionais[]" value="<?php echo e($adicional->id); ?>" />
                        <span><?php echo e($adicional->nome); ?></span>
                    </label>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            <?php if($adicionaisCount > 5): ?>
                <!-- Exibindo adicionais restantes a partir do 6º item -->
                <?php $__currentLoopData = collect($adicionais)->slice(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adicional): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="input-field">
                        <label>
                            <input type="checkbox" name="adicionais[]" value="<?php echo e($adicional->id); ?>" />
                            <span><?php echo e($adicional->nome); ?></span>
                        </label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </div>

            <!-- Rodapé fixo com o botão 'Avançar' -->
            <div class="footer-container" style="position: fixed; bottom: 0; left: 0; width: 100%; background-color: #F5F5F5; border-top: 1px solid #ddd; padding: 10px 0; text-align: center; display: flex; justify-content: center; align-items: center;">
                <button type="submit" class="btn waves-effect waves-light green btn-responsive"
                    style="font-size: 1.2em; margin:0; width: 50%; justify-content: center; align-items: center;">
                    <span>Avançar</span>
                </button>
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\guilh\best_imoveis\resources\views/admin/itemCardapio/product.blade.php ENDPATH**/ ?>