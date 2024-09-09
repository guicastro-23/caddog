<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adicional extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'preco'];

    public function pedidos(){
        return $this->belongsTo(Pedido::class, 'item_pedido_adicional')
                    ->withPivot('quantidade', 'preco')
                    ->withTimestamps();
    }

    public function itens(){
        return $this->belongsTo(ItemCardapio::class, 'item_pedido_adicional')
                    ->withPivot('quantidade', 'preco')
                    ->withTimestamps();
    }
}
