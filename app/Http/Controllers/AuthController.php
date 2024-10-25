<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    // Get all existing users
    public function index() {
        return User::all();
    }


    public function show(string $id)
    {

        $user = User::find($id);

        if($user != null) {
            return $user;
        } else {
            return response()->json([
                'Användarkonto hittades inte.'
            ], 404);
        }
    }

    // Delete specific user from storage
    public function destroy(string $id)
    {
        $user = User::find($id);
        if($user != null) {
           $user->delete();
           return response()->json([
                'Användarkonto raderade.'
            ]);
        } else {
            return response()->json([
                'Användarkonto hittades inte i databasen.'
            ], 404);
        }
    }

    // Register User
    public function register(Request $request) {
        $validatedUser = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'
            ]
        );

        // user found
        if($validatedUser->fails()) {
            return response()->json([
                'message' => 'Epost adressen finns redan registrerade.',
                'error' => $validatedUser->errors()
            ], 401);
        }

        // correct values: store and return a token
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']) // hash password
        ]);

        $response = [
            'message' => 'Användarekonto för ' . $user["name"] . ' (' . $user["email"] . ') har nu skapats.',
            'user' => $user
        ];

        return response($response, 200);
    }

    // Login Function
    public function login(Request $request) {
       
        $validatedUser = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );


        // incorrect values
        if($validatedUser->fails()) {
            return response()->json([
                'message' => 'Inloggningsuppgifter validerar inte: ' . $request['email'] . " & " . $request['password'],
                'error' => $validatedUser->errors()
            ], 401);
        }

        // incorrect login credentials
        if(!auth()->attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Inloggningsuppgifter stämmer inte med varandra: ' . $request['email'] . " & " . $request['password'],
            ], 401);
        }

        // correct - return access token
        $user = User::where('email', $request->email)->first();
        return response()->json([
            'message' => 'Du är nu inloggade',
            'user' => $user,
            'token' => $user->createToken('APITOKEN')->plainTextToken
        ], 200);

    }

    // Logout function
    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        $response = [
            'message' => 'Du är nu utloggade.'
        ];

        return response($response, 200);

    }
}