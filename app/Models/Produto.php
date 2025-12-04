<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'valor',
    ];

    public function getProdutosPesquisarIndex(string $search = '')
    {
        $produto = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('nome', $search);
                $query->orwhere('nome', 'like', "%{$search}%");
                
            }
        });

        return $produto->get();
    }
}
