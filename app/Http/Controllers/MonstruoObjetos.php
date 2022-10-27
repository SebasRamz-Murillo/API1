<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\MonstruoObjeto;

class MonstruoObjetos extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function insertar(Request $request)
    {
        $validator = validator::make(
            $request->all(),
            [
                'monstruo' => 'required|integer',
                'objeto' => 'required|integer'
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                "status" => 400,
                "message" => "Error en la validación!",
                "error" => $validator->errors(),
                "data" => []
            ], 400);
        }
        $Monsobj = new MonstruoObjeto();
        $Monsobj->monstruo = $request->monstruo;
        $Monsobj->objeto = $request->objeto;

        if ($Monsobj->save()) {
            return response()->json([
                "status" => 200,
                "message" => "Los datos fueron validados correctamente!",
                "error" => [],
                "data" => $validator->validate()
            ], 200);
        }
    }
    public function modificar(Request $request, int $id)
    {
        $validator = validator::make(
            $request->all(),
            [
                'monstruo' => 'required|integer',
                'objeto' => 'required|integer'
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                "status" => 400,
                "message" => "Error en la validación!",
                "error" => $validator->errors(),
                "data" => []
            ], 400);
        }
        $Monsobj = MonstruoObjeto::find($id);
        $Monsobj->monstruo = $request->monstruo;
        $Monsobj->objeto = $request->objeto;

        if ($Monsobj->save()) {
            return response()->json([
                "status" => 200,
                "message" => "La relacion $id fue modificado exitosamente",
                "error" => [],
                "data" => $validator->validate()
            ], 200);
        }
    }
    public function eliminar(int $id)
    {
        $MisObj = MonstruoObjeto::find($id);
        $MisObj->delete();
        return response()->json([
            "status" => 200,
            "message" => "La relacion $id fue eliminada exitosamente",
            "error" => [],
            "data" => []
        ], 200);
    }
}
