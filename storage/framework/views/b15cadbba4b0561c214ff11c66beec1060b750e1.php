<div>
    <ul>
        <li>
            <label>
                <input type="radio" name="metodo_pagamento" value="dinheiro" 
                       wire:click="selecionarMetodo('dinheiro')"
                       <?php if($metodoPagamento == 'dinheiro'): ?> checked <?php endif; ?> />
                <span style="color: black">Dinheiro</span>
            </label>
        </li>
        <li>
            <label>
                <input type="radio" name="metodo_pagamento" value="cartao" 
                       wire:click="selecionarMetodo('cartao')"
                       <?php if($metodoPagamento == 'cartao'): ?> checked <?php endif; ?> />
                <span style="color: black">Cartão</span>
            </label>
        </li>
        <li>
            <label>
                <input type="radio" name="metodo_pagamento" value="pix" 
                       wire:click="selecionarMetodo('pix')"
                       <?php if($metodoPagamento == 'pix'): ?> checked <?php endif; ?> />
                <span style="color: black">PIX - 42998583551</span>
            </label>
        </li>
    </ul>
</div>
<?php /**PATH C:\Users\guilh\best_imoveis\resources\views/livewire/metodo-pagamento.blade.php ENDPATH**/ ?>