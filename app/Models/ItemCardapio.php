<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCardapio extends Model
{
    use HasFactory;
    protected $table = 'item_cardapio'; //ajuste porque o laravel padroniza no plural 
    protected $fillable = ['nome','categoria_id', 'preco', 'foto'];

    public function pedidos(){
        return $this->belongsTo(Pedido::class, 'pedido_item')
                    ->withPivot('quantidade', 'preco')
                    ->withTimestamps();
    }


    public function adicionais()
    {
        return $this->belongsToMany(Adicionais::class, 'adicionais_item_cardapio', 'item_cardapio_id', 'adicionais_id')
                    ->withPivot('preco', 'quantidade');
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    




}
