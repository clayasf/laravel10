<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Componentes extends Model
{
    use HasFactory;

    public function formatacaMascaraDinheiroDecimal($valor){
        $tamanho = strlen($valor);
        if($tamanho <= 6){
            $dados = str_replace('.', '', $valor);
            
        }else{
            if($tamanho >= 8 && $tamanho <= 10){
                $dados = str_replace('.', '', $valor);
                $dados = str_replace(',', '.', $dados);
                $separaPorindice = explode('.', $dados);
                $valor = $separaPorindice[0] . '.' . $separaPorindice[1];
            }
        }
        return $valor;
    }
}
