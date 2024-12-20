

<?php $__env->startSection('content'); ?>
    <div class="section container">
        <div class="header-container">
            <br>
            <h4 class="inline">Adicionais</h4>
            <div class="class button-group">
                <a href="javascript:history.back()" class="btn-small waves-effect waves-light grey inline">Voltar</a>
                <a href="<?php echo e(route('admin.adicionais.create')); ?>" class="btn-small waves-effect waves-light green inline">Adicionar</a>
            </div>

        </div>
        <hr>

        <!-- Mensagem de sucesso, se houver -->
        <?php if(session('success')): ?>
            <div class="card-panel green lighten-4">
                <span class="green-text"><?php echo e(session('success')); ?></span>
            </div>
        <?php endif; ?>

        <!-- Modal de Confirmação de Exclusão -->
        <div id="deleteModal" class="modal small-modal">
            <div class="modal-content">
                <h4>Confirmar Exclusão</h4>
                <p>Tem certeza de que deseja excluir o adicional <strong id="item-name"></strong>?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="modal-close btn red">Sim</button>
                    <a href="#!" class="modal-close btn grey">Cancelar</a>
                </form>
            </div>
        </div>

        <div class="table-container">
            <table class="striped">
                <thead>
                    <tr>
                        <th>
                            <a href="<?php echo e(route('admin.adicionais.index', ['sort' => 'nome', 'direction' => $direction === 'asc' ? 'desc' : 'asc'])); ?>" class="header-link">
                                Nome
                                <?php if($sort === 'nome'): ?>
                                    <i class="material-icons"><?php echo e($direction === 'asc' ? 'arrow_drop_up' : 'arrow_drop_down'); ?></i>
                                <?php endif; ?>
                            </a>
                        </th>
                      
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $adicionais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adicional): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($adicional->nome); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.adicionais.show', $adicional->id)); ?>" class="btn blue btn-small">
                                    <i class="material-icons">remove_red_eye</i>
                                </a>
                                <a href="<?php echo e(route('admin.adicionais.edit', $adicional->id)); ?>" class="btn green btn-small">
                                    <i class="material-icons">edit</i>
                                </a>
                                <button class="btn red btn-small modal-trigger" data-target="deleteModal"
                                        data-url="<?php echo e(route('admin.adicionais.destroy', $adicional->id)); ?>"
                                        data-name="<?php echo e($adicional->nome); ?>">
                                    <i class="material-icons">delete</i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
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
                <h4>Ajuda - Gerenciamento de Adicionais</h4>
                <p>Essa seção permite visualizar, adicionar, editar e excluir adicionais.</p>
                <ul>
                    <li><strong>Adicionar:</strong> Clique em "Adicionar" para criar um novo adicional.</li>
                    <li><strong>Visualizar:</strong> Use o ícone de olho para ver detalhes de um adicional.</li>
                    <li><strong>Editar:</strong> Clique no ícone de lápis para editar um adicional existente.</li>
                    <li><strong>Excluir:</strong> Clique no ícone de lixeira e confirme no modal para excluir.</li>
                </ul>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close btn grey">Fechar</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializa os modais
            M.Modal.init(document.querySelectorAll('.modal'));

            // Define ação de exclusão e nome do item no modal de confirmação
            document.querySelectorAll('.modal-trigger[data-target="deleteModal"]').forEach(button => {
                button.addEventListener('click', function() {
                    let url = this.getAttribute('data-url');
                    document.getElementById('deleteForm').setAttribute('action', url);

                    let itemName = this.getAttribute('data-name');
                    document.getElementById('item-name').textContent = itemName;
                });
            });
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\guilh\best_imoveis\resources\views/admin/adicionais/index.blade.php ENDPATH**/ ?>