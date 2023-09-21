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

    public function index()
    {
        return Produto::all();
    }


   public function store(Request $request)
{
 
    $request->validate([
        'nome' => 'required',
        'preco' => 'required',
        'quantidade' => 'required',
        'descricao' => 'nullable', // A descrição é opcional
    ]);

    return Produto::create($request->all());
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    { 
        return Produto::findOrfail($id);
        
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
  {
         $request->validate([
        'nome' => 'required',
        'preco' => 'required',
        'quantidade' => 'required',
        'descricao' => 'nullable', // A descrição é opcional
    ]);
    return Produto::findOrfail($id);
    return Produto::update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
       
    $produto = Produto::findOrFail($id);
    $produto->delete($request->all());
    }
}
