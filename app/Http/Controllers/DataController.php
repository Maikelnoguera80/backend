<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class DataController extends Controller
{
    // Mostrar todos los datos
    public function index()
    {
        $datos = Data::where('user_id', auth()->id())->get();
        return response()->json($datos);
    }

    // Mostrar un dato específico
    public function show($id)
    {
        $dato = Data::findOrFail($id);
        return response()->json($dato);
    }

    // Almacenar un nuevo dato
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fecha' => 'required|date',
            'monto' => 'required|numeric',
        ]);

        $dato = Data::create([
            'user_id' => auth()->id(),
            'fecha' => $validatedData['fecha'],
            'monto' => $validatedData['monto'],
        ]);

        return response()->json($dato, 201);
    }

    // Actualizar un dato existente
    public function update(Request $request, $id)
    {
        $dato = Data::findOrFail($id);

        $validatedData = $request->validate([
            'fecha' => 'required|date',
            'monto' => 'required|numeric',
        ]);

        $dato->update([
            'fecha' => $validatedData['fecha'],
            'monto' => $validatedData['monto'],
        ]);

        return response()->json($dato, 200);
    }

    // Eliminar un dato
    public function destroy($id)
    {
        $dato = Data::findOrFail($id);
        $dato->delete();

        return response()->json(null, 204);
    }
}
