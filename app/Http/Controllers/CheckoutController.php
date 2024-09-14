<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Pedido;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // Exibe o checkout
    public function index(Request $request){
        
        // Recupera o pedido salvo na sessão
        $pedido = session()->get('pedido', []);
        $clienteId = session()->get('cliente_id');

        // Calcula o subtotal
        $subtotal = array_sum(array_map(function ($item) {
            // Se o item tem uma chave 'quantidade', multiplique pelo preço
            // Caso contrário, apenas some o preço
            $precoItem = $item['item_cardapio']->preco;
            $quantidade = $item['quantidade'] ?? 1; // Assume 1 se 'quantidade' não estiver definido
            return $precoItem * $quantidade;
        }, $pedido));

        if ($clienteId) {
            // Busca os endereços do cliente
            $enderecos = Endereco::where('cliente_id', $clienteId)->get();
        } else {
            $enderecos = collect(); // Retorna uma coleção vazia se o cliente não estiver logado
        }

        

        // dd([
        //     'pedido' => $pedido,
        //     'cliente_id' => $clienteId,
        //     'cliente' => $clienteId ? \App\Models\Cliente::find($clienteId) : null
        // ]);

        return view('checkout.index', compact('pedido','enderecos', 'subtotal'));
    }

    
    


     // Selecionar o endereço no checkout
     public function selecionarEndereco(Request $request)
     {
         // Valida se o endereço foi selecionado
         $request->validate([
             'endereco_id' => 'required|exists:enderecos,id',
         ]);
 
         // Recupera o ID do endereço selecionado
         $enderecoId = $request->input('endereco_id');
 
         // Salva o endereço na sessão
         session()->put('endereco_id', $enderecoId);
         
         
         // Redireciona de volta ao checkout (ou para a próxima etapa do processo)
         return redirect()->route('checkout.index')->with('success', 'Endereço selecionado com sucesso!');
     }

     // Selecionar o método de pagamento no checkout
    public function selecionarPagamento(Request $request)
    {
        // Valida se o método de pagamento foi selecionado
        $request->validate([
            'metodo_pagamento' => 'required|in:dinheiro,cartao,pix',
        ]);

        // Recupera o método de pagamento selecionado
        $metodoPagamento = $request->input('metodo_pagamento');

        // Salva o método de pagamento na sessão
        session()->put('metodo_pagamento', $metodoPagamento);
        
        // Redireciona de volta ao checkout (ou para a próxima etapa do processo)
        return redirect()->route('checkout.index')->with('success', 'Método de pagamento selecionado com sucesso!');
    }

    




    // Exibe os detalhes do pedido
    public function detalhesPedido($id)
    {
        $pedido = Pedido::with(['itens'])->findOrFail($id);
        
        return view('pedido.detalhes', compact('pedido'));
    }




    public function selecionarMetodoPagamento(Request $request)
{
    $request->validate([
        'metodo_pagamento' => 'required|string|in:dinheiro,cartao,pix',
    ]);

    // Salva o método de pagamento na sessão
    session(['metodo_pagamento' => $request->input('metodo_pagamento')]);

    // Redireciona para a próxima etapa
    return redirect()->route('checkout.index');
}

public function finalizarPedido(Request $request)
{
    // Verifica se o método de requisição é POST
    if ($request->isMethod('post')) {
        // Recupera os dados da sessão e do pedido
        $pedido = session()->get('pedido', []);
        $clienteId = session()->get('cliente_id');
        $enderecoId = session()->get('endereco_id');
        $metodoPagamento = $request->input('metodo_pagamento');

        // Valida se todas as informações necessárias estão presentes
        if (!$clienteId || !$enderecoId || !$metodoPagamento) {
            return redirect()->route('checkout.index')->with('error', 'Preencha todas as informações para finalizar o pedido.');
        }

        // Calcula o subtotal
        $subtotal = array_sum(array_map(function ($item) {
            $precoItem = $item['item_cardapio']->preco;
            $quantidade = $item['quantidade'] ?? 1;
            return $precoItem * $quantidade;
        }, $pedido));

        // Cria o pedido
        $novoPedido = Pedido::create([
            'cliente_id' => $clienteId,
            'data_Pedido' => now(),
            'metdPag' => $metodoPagamento,
            'status' => 'pendente',
            'total' => $subtotal,
        ]);

        // Adiciona os itens ao pedido
        foreach ($pedido as $item) {
            $novoPedido->itens()->attach($item['item_cardapio']->id, [
                'quantidade' => $item['quantidade'] ?? 1,
                'preco' => $item['item_cardapio']->preco
            ]);
        }

        // Adiciona os adicionais ao pedido
        // foreach ($pedido as $item) {
        //     if (!empty($item['adicionais'])) {
        //         foreach ($item['adicionais'] as $adicional) {
        //             $novoPedido->adicionais()->attach($adicional['id'], [
        //                 'preco' => $adicional['preco']
        //             ]);
        //         }
        //     }
        // }

        // Limpa a sessão do pedido
        session()->forget('pedido');
        session()->forget('endereco_id');
        session()->forget('metodo_pagamento');

        // Redireciona para a tela de detalhes do pedido
        return redirect()->route('pedido.detalhes', ['id' => $novoPedido->id])->with('success', 'Pedido finalizado com sucesso!');
    }

    // Se o método de requisição não for POST, retorna um erro
    return redirect()->route('checkout.index')->with('error', 'Método não permitido.');
}
}
