<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;

class ProdutosController extends Controller
{
    protected $produto;
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    public function index(Request $request) {
        $pesquisar = $request->pesquisa;

        $produtinhos = $this->produto->getProdutosPesquisarIndex(search:  $pesquisar ?? '');
 
        return view('pages.produtos.paginacao', compact('produtinhos'));
    }

    public function delete(Request $request) {
      
        $produto = $this->produto->find($request->id);
        if ($produto) {
            $produto->delete();
        }
        return redirect()->route('produto.index');
    }

    public function cadastrarProduto(FormRequestProduto $request) {
        if ($request->isMethod('post')) {
 
            $dados = $request->only(['nome', 'valor']);
            $componentes = new Componentes();
            $dados['valor'] = $componentes->formatacaMascaraDinheiroDecimal($dados['valor']);
            $this->produto->create($dados);
            return redirect()->route('produto.index');
        }
        return view('pages.produtos.create');
    }

    public function atualizarProduto(FormRequestProduto $request, $id) {
        $produto = $this->produto->find($id);
        if (!$produto) {
            return redirect()->route('produto.index');
        }

        if ($request->isMethod('put')) {
            $dados = $request->only(['nome', 'valor']);
            $componentes = new Componentes();
            $dados['valor'] = $componentes->formatacaMascaraDinheiroDecimal($dados['valor']);
            $produto->update($dados);
            return redirect()->route('produto.index');
        }
        return view('pages.produtos.atualiza', compact('produto'));
    }
}
