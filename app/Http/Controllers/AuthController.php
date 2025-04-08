<?php
namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        // Hachage du mot de passe avant stockage
        $fields['password'] = Hash::make($fields['password']);

        // Création de l'utilisateur
        $user = User::create($fields);

        // Création du token pour l'authentification
        $token = $user->createToken($request->name)->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ], 201);
    }
    
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)){
            return [
                'message' => 'Incorrect'
            ];
        }

        // Création du token pour l'authentification
        $token = $user->createToken($user->name)->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ], 201);
    }
}
