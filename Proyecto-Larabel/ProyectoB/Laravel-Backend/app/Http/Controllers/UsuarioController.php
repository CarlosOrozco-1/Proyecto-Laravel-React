<?php

namespace App\Http\Controllers;

// Importa el modelo que vas a usar
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Muestra todos los usuarios
     * GET /api/usuarios
     */
    public function index()
    {
        // Devuelve todos los registros de la tabla usuarios como JSON
        return Usuario::all();
    }

    /**
     * Guarda un nuevo usuario en la base de datos
     * POST /api/usuarios
     */
    public function store(Request $request)
    {
        // Valida que el request tenga todos estos campos obligatorios y con tipo correcto
        $request->validate([
            'nombre_usuario' => 'required|string',
            'contrasena' => 'required|string',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'departamento' => 'required|string',
            'direccion' => 'required|string',
        ]);

        // Crea un nuevo usuario usando los datos del request
        $usuario = Usuario::create($request->all());

        // Devuelve el usuario recién creado y un código HTTP 201 (Created)
        return response()->json($usuario, 201);
    }

    /**
     * Muestra un usuario específico por ID
     * GET /api/usuarios/{id}
     */
    public function show($id)
    {
        // Busca el usuario por su ID
        $usuario = Usuario::find($id);

        // Si no lo encuentra, devuelve error 404
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        // Si lo encuentra, lo devuelve como JSON
        return $usuario;
    }

    /**
     * Actualiza un usuario existente por ID
     * PUT /api/usuarios/{id}
     */
    public function update(Request $request, $id)
    {
        // Busca el usuario por su ID
        $usuario = Usuario::find($id);

        // Si no lo encuentra, devuelve error 404
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        // Actualiza los campos recibidos. Aquí puedes poner reglas de validación si quieres
        $usuario->update($request->all());

        // Devuelve el usuario actualizado
        return response()->json($usuario, 200);
    }

    /**
     * Elimina un usuario por ID
     * DELETE /api/usuarios/{id}
     */
    public function destroy($id)
    {
        // Busca el usuario por su ID
        $usuario = Usuario::find($id);

        // Si no lo encuentra, devuelve error 404
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        // Si lo encuentra, lo borra
        $usuario->delete();

        // Devuelve respuesta vacía con código 204 (sin contenido)
        return response()->json(null, 204);
    }
}
