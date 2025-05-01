<?php
namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index(){
        $users=User::all();
        if($users->isEmpty()){
            return response()->json(
                ['message'=> 'No hay usuarios registrados'],
                404
            );
        }
        return response()->json(
            [
                'data'=> $users
            ],
            200
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'is_admin' => 'required|boolean',
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                    'message'=> 'Error en la validacion de Usuario',
                    'errors'=> $validator->errors()
                ],400
            );
        }

        $new_user= User::create([
            'username' => $request->username,  
            'password' => $request->password,  
            'full_name' => $request->full_name,  
            'email' => $request->email,
            'is_admin' => $request->is_admin,
            'created_at' => now()
        ]);
        return response()->json(
            [
                'data'=> $new_user,
            ],201
        );
    }

    public function show($id){
        $user = Users::find($id);
        if(!$user){
            return response()->json(
                [
                    'message'=> 'El usuario no ha sido encontrado',
                ],404
            );
        }
        return response()->json(
            [
                'data'=>$user,
            ],200
    );
    }

    public function destroy($id){
        $user = Users::find($id);
        if(!user){
            return response()->json(
                [
                    'message'=>'El usuario no ha sido encontrado',
                ],404);
        }

        $user->delete();

        return response()->json(
            [
                'message'=> 'Usuario eliminado con exito',
            ],200
        );
    }

}
