<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /** 
     * 
     * 
    * @return \Illuminate\Http\Response
    */

    public function index(){
        return Produto::all();
    }

   public function store(Request $request){
      $request->validate([
        'nome' => 'required',
        'preco' => 'required',
        'quantidade' => 'required',
        'descricao' => 'nullable',
     ]);

     return Produto::create($request->all());
    }

    public function show($id){ 
        return Produto::findOrfail($id); 
    }

    public function update(Request $request, string $id){
      $request->validate([
        'nome' => 'required',
        'preco' => 'required',
        'quantidade' => 'required',
        'descricao' => 'nullable',
     ]);

        return Produto::findOrfail($id);
        return Produto::update($request->all());
    }

  
    public function destroy(Request $request, $id){
        $produto = Produto::findOrFail($id);
        $produto->delete($request->all());
    }
}
