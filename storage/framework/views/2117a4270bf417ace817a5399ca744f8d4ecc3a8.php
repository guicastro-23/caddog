
<?php $__env->startSection('content'); ?>
    <div class="section container">
        <div class="header-container">
            <br>
            <h4 class="inline">Editar Item do Cardápio</h4>
            <div class="class button-group">
                <a href="<?php echo e(route('admin.itemCardapio.index')); ?>" class="btn-small waves-effect waves-light grey inline">Voltar</a>
            </div>

        </div>
        <hr>

        <!-- Mensagens de erro -->
        <?php if($errors->any()): ?>
            <span style="color: #ff0000">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($error); ?><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </span>
            <br>
        <?php endif; ?>

        <div class="section container">
            <form action="<?php echo e(route('admin.itemCardapio.update', $itemCardapio->id)); ?>" method="POST" enctype="multipart/form-data" class="form-container">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="input-field">
                    <label for="nome">Nome do Item</label>
                    <input type="text" id="nome" name="nome" value="<?php echo e(old('nome', $itemCardapio->nome)); ?>">
                </div>

                <div class="input-field">
                    <label for="preco">Preço</label>
                    <input type="text" id="preco" name="preco" value="<?php echo e(old('preco', number_format($itemCardapio->preco, 2, ',', '.'))); ?>">
                </div>

                <div class="input-field ">
                    <label for="categoria_id"></label>
                    <select id="categoria_id" name="categoria_id">
                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($categoria->id); ?>" <?php echo e($categoria->id == $itemCardapio->categoria_id ? 'selected':''); ?>>
                                <?php echo e($categoria->nome); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <label>Categoria</label>



                </div>

                <div class="input-field">
                    <label for="foto"></label>
                    <input type="file" id="foto" name="foto">
                </div>

                <!-- Exibe a imagem atual, se houver -->
                <?php if($itemCardapio->foto): ?>
                    <div style="margin-top: 15px;">
                        <p>Foto Atual:</p>
                        <img src="<?php echo e(url('storage/'.$itemCardapio->foto)); ?>" alt="<?php echo e($itemCardapio->nome); ?>" style="width: 100px; height: auto;">
                    </div>
                <?php endif; ?>

                <button type="submit" class="btn-small waves-effect waves-light">Salvar</button>
            </form>
        </div>

        <!-- Floating Help Button -->
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large blue modal-trigger" href="#helpModal">
                <i class="large material-icons">help_outline</i>
            </a>
        </div>

        <!-- Help Modal -->
       
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large blue modal-trigger" href="#helpModal">
                <i class="large material-icons">help_outline</i>
            </a>
        </div>

        <!-- Help Modal -->
        <div id="helpModal" class="modal">
            <div class="modal-content">
                <h4>Ajuda - Editar Item do Cardápio</h4>
                <p>Preencha ou altere os campos abaixo para atualizar o item no cardápio:</p>
                <ul>
                    <li><strong>Nome do Item:</strong> Altere o nome do item no cardápio.</li>
                    <li><strong>Preço:</strong> Insira o preço atualizado (formato automático R$ XX,XX).</li>
                    <li><strong>Categoria:</strong> Selecione uma categoria adequada.</li>
                    <li><strong>Foto:</strong> Carregue uma nova imagem, se desejar substituir a atual.</li>
                    <li><strong>Salvar:</strong> Clique para salvar as alterações.</li>
                </ul>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close btn grey">Fechar</a>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>


        M.AutoInit(); // Inicializar o Materialize JS


        // Máscara para formatação do preço na interface
        $(document).ready(function() {
            $('#preco').on('input', function() {
                let valor = $(this).val().replace(/\D/g, ''); // Remove caracteres não numéricos
                if (valor) {
                    valor = (parseInt(valor) / 100).toFixed(2).replace('.', ','); // Formata como R$ XX,XX
                    $(this).val('R$ ' + valor);
                } else {
                    $(this).val('');
                }
            });

            // Substitui vírgula por ponto ao enviar o formulário
            $('form').on('submit', function() {
                let precoField = $('#preco');
                let precoValue = precoField.val();

                // Remove o "R$ " e troca a vírgula por ponto para enviar no formato correto
                precoValue = precoValue.replace('R$ ', '').replace(',', '.');

                precoField.val(precoValue); // Atualiza o valor do campo com o formato correto
            });
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
            margin-bottom: 1px;
        }

        hr {
            margin-top: 5px;
            margin-bottom: 20px;
        }

        .header-container h4 {
            margin: 1%;
        }

        .header-container .btn-small {
            margin-left: auto;
        }

        .input-field {
            margin-bottom: 20px;
            margin-left: auto;
        }

        .btn-small {
            padding: 5px 10px;
            font-size: 12px;
        }

        .fixed-action-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
        }


    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\guilh\best_imoveis\resources\views/admin/itemCardapio/edit.blade.php ENDPATH**/ ?>