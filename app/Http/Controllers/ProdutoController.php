<?php namespace estoque\Http\Controllers;

use estoque\Produto;
use Request;
use estoque\Http\Requests\ProdutoRequest;
use estoque\Categoria;

class ProdutoController extends Controller {

    public function __construct()
    {
        $this->middleware('nosso-middleware', 
            ['only' => ['adiciona', 'remove']]);
    }

    public function lista(){
        $produtos = Produto::all();
        return view('produto.listagem')
            ->with('produtos', $produtos);
    }

    public function mostra($id){
        $produto = Produto::find($id);
        if(empty($produto)) {
            return "Esse produto não existe";
        }
        return view('produto.detalhes')
            ->with('p', $produto);
    }

    public function novo(){
        return view('produto.formulario')->with('categorias', Categoria::all());
    }

    public function adiciona(ProdutoRequest $request){

        Produto::create($request->all());

        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('nome'));
    }

    public function listaJson(){
        $produtos = Produto::all();
        return response()->json($produtos);
    }

    public function remove($id){
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()
            ->action('ProdutoController@lista');
    }

    public function busca($id){
	    $resposta = produto::find($id);

	    if(empty($resposta)) {
	        return "Esse produto não existe";
	      }
	      return view('produto/formularioAltera')->with('p', $resposta);

    }

	public function alterado(ProdutoRequest $request, $id){
       	
       	$produto = Produto::find($id);
        $valores = $request->all();

		$produto->fill($valores)->save();

        return redirect()->action('ProdutoController@lista');


	}

}


/*
opção 1 sem validação

public function alterado($id){
        
        $produto = Produto::find($id);
        $valores = Request::all();

        $produto->fill($valores)->save();

        return redirect()->action('ProdutoController@lista');


    }

*/




/** 
opção 2
public function alterado($id){
       	
        $produto = Produto::find($id);
        $produto->nome = Request::input('nome');
        $produto->valor = Request::input('valor');
        $produto->descricao = Request::input('descricao');
        $produto->quantidade = Request::input('quantidade');

        $produto->save();

        return redirect()->action('ProdutoController@lista');


	}
**/