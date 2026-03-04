<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class EducacionController extends Controller
{
    // Obtener educación de un usuario
    public function getEducacion($id_usuario)
    {
        $usuario = DB::table('usuarios')->where('id_usuario', $id_usuario)->first();

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $educacion = DB::table('educacion')
            ->leftJoin('instituciones_formacion', 'educacion.id_inst_for', '=', 'instituciones_formacion.id_inst_for')
            ->leftJoin('ocupaciones', 'educacion.id_ocupacion', '=', 'ocupaciones.id_ocupacion')
            ->leftJoin('tipos_grado', 'educacion.id_tipoGrado', '=', 'tipos_grado.id_tipoGrado')
            ->where('educacion.id_persona', $usuario->id_persona)
            ->select(
                'educacion.id_educacion as id',
                'educacion.fecha_int_prof as fechaInicio',
                'educacion.fecha_titulacion as fechaFin',
                'instituciones_formacion.nombre as institucion',
                'ocupaciones.nombre as ocupacion',
                'tipos_grado.nombre as tipoGrado'
            )
            ->orderBy('educacion.fecha_int_prof', 'desc')
            ->get();

        return response()->json($educacion, 200);
    }

    // Guardar educación para un usuario
    public function storeEducacion(Request $request, $id_usuario)
    {
        $validator = Validator::make($request->all(), [
            'fechaInicio' => 'nullable|date',
            'fechaFin' => 'nullable|date|after_or_equal:fechaInicio',
            'id_inst_for' => 'nullable|integer|exists:instituciones_formacion,id_inst_for',
            'id_ocupacion' => 'nullable|integer|exists:ocupaciones,id_ocupacion',
            'id_tipoGrado' => 'nullable|integer|exists:tipos_grado,id_tipoGrado',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Datos inválidos',
                'messages' => $validator->errors()
            ], 422);
        }

        $usuario = DB::table('usuarios')->where('id_usuario', $id_usuario)->first();
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $idEducacion = DB::table('educacion')->insertGetId([
            'id_persona' => $usuario->id_persona,
            'fecha_int_prof' => $request->fechaInicio ? Carbon::parse($request->fechaInicio)->format('Y-m-d H:i:s') : null,
            'fecha_titulacion' => $request->fechaFin ? Carbon::parse($request->fechaFin)->format('Y-m-d H:i:s') : null,
            'id_inst_for' => $request->id_inst_for,
            'id_ocupacion' => $request->id_ocupacion,
            'id_tipoGrado' => $request->id_tipoGrado,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $educacion = DB::table('educacion')
            ->where('id_educacion', $idEducacion)
            ->select('id_educacion as id')
            ->first();

        return response()->json([
            'message' => 'Educación añadida correctamente',
            'educacion' => $educacion
        ], 201);
    }

    // Actualizar educación de un usuario
    public function updateEducacion(Request $request, $id_usuario, $id_educacion)
    {
        $validator = Validator::make($request->all(), [
            'fechaInicio' => 'nullable|date',
            'fechaFin' => 'nullable|date|after_or_equal:fechaInicio',
            'id_inst_for' => 'nullable|integer|exists:instituciones_formacion,id_inst_for',
            'id_ocupacion' => 'nullable|integer|exists:ocupaciones,id_ocupacion',
            'id_tipoGrado' => 'nullable|integer|exists:tipos_grado,id_tipoGrado',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Datos inválidos',
                'messages' => $validator->errors()
            ], 422);
        }

        $usuario = DB::table('usuarios')->where('id_usuario', $id_usuario)->first();
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $educacion = DB::table('educacion')
            ->where('id_educacion', $id_educacion)
            ->where('id_persona', $usuario->id_persona)
            ->first();

        if (!$educacion) {
            return response()->json(['message' => 'Educación no encontrada para este usuario'], 404);
        }

        DB::table('educacion')
            ->where('id_educacion', $id_educacion)
            ->where('id_persona', $usuario->id_persona)
            ->update([
                'fecha_int_prof' => $request->fechaInicio ? Carbon::parse($request->fechaInicio)->format('Y-m-d H:i:s') : null,
                'fecha_titulacion' => $request->fechaFin ? Carbon::parse($request->fechaFin)->format('Y-m-d H:i:s') : null,
                'id_inst_for' => $request->id_inst_for,
                'id_ocupacion' => $request->id_ocupacion,
                'id_tipoGrado' => $request->id_tipoGrado,
                'updated_at' => now(),
            ]);

        return response()->json(['message' => 'Educación actualizada correctamente'], 200);
    }

    // Eliminar educación de un usuario
    public function destroyEducacion($id_usuario, $id_educacion)
    {
        $usuario = DB::table('usuarios')->where('id_usuario', $id_usuario)->first();

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $educacion = DB::table('educacion')
            ->where('id_educacion', $id_educacion)
            ->where('id_persona', $usuario->id_persona)
            ->first();

        if (!$educacion) {
            return response()->json(['message' => 'Educación no encontrada para este usuario'], 404);
        }

        DB::table('educacion')
            ->where('id_educacion', $id_educacion)
            ->where('id_persona', $usuario->id_persona)
            ->delete();

        return response()->json(['message' => 'Educación eliminada correctamente'], 200);
    }
}
