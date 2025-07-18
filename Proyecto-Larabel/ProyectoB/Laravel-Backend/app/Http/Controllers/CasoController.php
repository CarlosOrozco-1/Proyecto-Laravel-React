<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use Illuminate\Http\Request;

class CasoController extends Controller
{
    /**
     * Muestra todos los casos
     * GET /api/casos
     */
    public function index()
    {
        return Caso::all();
    }

    /**
     * Crea un nuevo caso //probando github
     * POST /api/casos
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            'estado' => 'required|string',
            'fecha_creacion' => 'required|date',
            'fecha_actualizacion' => 'required|date',
            'id_usuario' => 'required|integer',
        ]);

        $caso = Caso::create($request->all());
        return response()->json($caso, 201);
    }

    /**
     * Muestra un caso por ID
     * GET /api/casos/{id}
     */
    public function show($id)
    {
        $caso = Caso::find($id);

        if (!$caso) {
            return response()->json(['message' => 'Caso no encontrado'], 404);
        }

        return $caso;
    }

    /**
     * Actualiza un caso por ID
     * PUT /api/casos/{id}
     */
    public function update(Request $request, $id)
    {
        $caso = Caso::find($id);

        if (!$caso) {
            return response()->json(['message' => 'Caso no encontrado'], 404);
        }

        $caso->update($request->all());
        return response()->json($caso, 200);
    }

    /**
     * Elimina un caso por ID
     * DELETE /api/casos/{id}
     */
    public function destroy($id)
    {
        $caso = Caso::find($id);

        if (!$caso) {
            return response()->json(['message' => 'Caso no encontrado'], 404);
        }

        $caso->delete();
        return response()->json(null, 204);
    }
}
