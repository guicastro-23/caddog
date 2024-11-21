

<?php $__env->startSection('conteudo-principal'); ?>
    <div class="section container">
        <div class="header-container">
            <h4>Adicione Seu Endereço</h4>
            <hr>
        </div>
        <form action="<?php echo e(route('enderecos.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <!-- Campo oculto para cliente_id -->
            <input type="hidden" name="cliente_id" value="<?php echo e(session('cliente_id')); ?>" />

            <!-- Campo de seleção para cidades -->
            <div class="input-field">
                <select name="cidades_id" id="cidades_id">
                    <?php $__currentLoopData = $cidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cidade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cidade->id); ?>"><?php echo e($cidade->nome); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <label for="cidades_id">Cidade</label>
                <?php $__errorArgs = ['cidades_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="helper-text red-text"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Campo de texto para logradouro -->
            <div class="input-field">
                <input type="text" name="logradouro" id="logradouro" value="<?php echo e(old('logradouro')); ?>" />
                <label for="logradouro">Rua</label>
                <?php $__errorArgs = ['logradouro'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="helper-text red-text"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="input-field">
                <input type="text" name="numero" id="numero" value="<?php echo e(old('numero')); ?>" />
                <label for="numero">Número</label>    
                <?php $__errorArgs = ['numero'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="helper-text red-text"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Campo de seleção para bairro -->
            <div class="input-field">
                <select name="bairro" id="bairro">
                    <option value="" disabled selected>Escolha um bairro</option>
                    <option value="Almirante">Almirante</option>
                    <option value="Alvorada">Alvorada</option>
                    <option value="Arapongas">Arapongas</option>
                    <option value="Araucária">Araucária</option>
                    <option value="Centro">Centro</option>
                    <option value="Bailly">Bailly</option>
                    <option value="Bancarios">Bancários</option>
                    <option value="Bela Vista">Bela Vista</option>
                    <option value="Bom Sucesso">Bom Sucesso</option>
                    <option value="Canta Galo">Canta Galo</option>
                    <option value="Castrolanda">Castrolanda</option>
                    <option value="Castroville">Castroville</option>
                    <option value="Dona Helena">Dona Helena</option>
                    <option value="Invernada do Matadouro">Invernada do Matadouro</option>
                    <option value="Nações">Nações</option>      
                    <option value="Nossa Senhora das Gracas">Nossa Senhora das Graças</option> 
                    <option value="Morada do Sol">Morada do Sol</option>
                    <option value="Padre Piva">Padre Piva</option>
                    <option value="Pandorf">Pandorf</option>
                    <option value="Primavera">Primavera</option>
                    <option value="Rio Branco">Rio Branco</option>
                    <option value="Samambaia">Samambaia</option>     
                    <option value="Santa Cruz">Santa Cruz</option>
                    <option value="Rio Branco">Termas Riveira</option>
                    <option value="Vila do Rosário">Vila do Rosário</option>
                    <option value="Vila Farias">Vila Farias</option>
                    <option value="Vila Frei Mathias">Vila Frei Mathias</option>

                </select>
                <label for="bairro">Bairro</label>
                <?php $__errorArgs = ['bairro'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="helper-text red-text"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Campo de texto para complemento -->
            <div class="input-field">
                <input type="text" name="complemento" id="complemento" value="<?php echo e(old('complemento')); ?>" />
                <label for="complemento">Complemento</label>
                <?php $__errorArgs = ['complemento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="helper-text red-text"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <button class="btn-small waves-effect waves-light" type="submit">Salvar Endereço</button>
        </form>
    </div>

    <!-- Inicializa o componente select do Materialize -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            M.FormSelect.init(elems);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\guilh\best_imoveis\resources\views/admin/enderecos/create.blade.php ENDPATH**/ ?>