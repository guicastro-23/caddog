

<?php $__env->startSection('conteudo-principal'); ?>
    <section class="section">
    

        <form action="<?php echo e(route('admin.cidades.adicionar')); ?>" method="POST">
            
            <?php echo csrf_field(); ?>
            <div class="input-field">
                <input type="text" class="text" name="nome" id="nome">
                <label for="nome">Nome</label>
                <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="red-text text-accent-3"><small><?php echo e($message); ?></small></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <input type="text" class="text" name='sigla' id='sigla'>
                <label for="sigla">Estado</label>
                


            </div>

            <div class="right-align">
                <a class="btn-flat waves-effect" href="<?php echo e(url()->previous()); ?>">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">
                    SALVAR
                </button>
            </div>

        </form>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\guilh\best_imoveis\resources\views/admin/cidades/form.blade.php ENDPATH**/ ?>