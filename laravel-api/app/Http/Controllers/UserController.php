<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        User::all();
        return response->json($users);
    }

    public function createUser(){
    // Dados do novo usuário
    $userData = [
        'name' => 'required',
        'email' => 'required',
        'password' => Hash::make('required'), // Lembre-se de criptografar a senha
    ];

    // Cria o novo usuário
    $user = User::create($userData);

    // O novo usuário foi criado com sucesso
    return response()->json(['message' => 'Usuário criado com sucesso', 'user' => $user]);
   }
}
