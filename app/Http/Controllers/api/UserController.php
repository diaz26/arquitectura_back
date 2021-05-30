<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{

    public function index()
    {
        $users = User::all();/* select('id', 'email', 'name', \DB::raw("DATE_FORMAT(created_at,'%d/%m/%Y %H:%i:%s') as created_at"))->get(); */
        return response()->json(['users' => $users], 200);
    }

    public function store(Request $request)
    {
        try {
            $user = new User();
            $request['password'] = \Hash::make('123456789');
            $user->forceFill($request->all())->save();
            return response()->json(['message' => 'Registro creado!'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error!', 'error' => $th->getMessage()], 401);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);

            $request['password'] = (isset($request->password)) ? \Hash::make($request->password) : $user->password;

            if (!empty($user)) {
                $user->forceFill($request->all())->save();
                return response()->json(['message' => 'Registro actualizado!'], 200);
            } else {
                return response()->json(['message' => 'Usuario no encontrado!'], 401);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error!', 'error' => $th->getMessage()], 401);
        }
    }

    public function destroy($id)
    {
        try {
            User::where('id', $id)->delete();
            return response()->json(['message' => 'Registro eliminado!'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error!', 'error' => $th->getMessage()], 401);
        }
    }
}
