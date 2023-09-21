<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;

class ShoppingListController extends Controller
{
    public function addToShoppingList(Request $request, string $productId){

     $user = auth()->user();

     $produto = Produto::findOrFail($productId);

     $request->create([
        'id-produto' => $produto->id,
        'nome' => 'required',
        'preco' => 'required',
        'quantidade' => 'required',
        'descricao' => 'nullable',
     ]);

     return Produto::create($request->all());
    }
}
