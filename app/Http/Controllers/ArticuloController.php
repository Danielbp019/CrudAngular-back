<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return Articulo::all();
        $articulo = Articulo::select('id', 'titulo', 'cuerpo', 'autor', 'created_at', 'updated_at')
            ->get();
        return response()->json($articulo);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $nuevoArticulo = Articulo::create([
                'titulo' => trim($request['titulo']),
                'cuerpo' => trim($request['cuerpo']),
                'autor' => trim($request['autor'])
            ]);
            // Devolver el artículo creado
            return array('success' => true, 'message' => 'Se creo correctamente.', 'articulo' => $nuevoArticulo);
        } catch (\Exception $e) {
            // Si existe error.
            return array('success' => false, 'message' => $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        return Articulo::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $editarArticulo = Articulo::find($id);
            $editarArticulo->fill([
                'titulo' => trim($request['titulo']),
                'cuerpo' => trim($request['cuerpo']),
                'autor' => trim($request['autor'])
            ]);
            $editarArticulo->save();
            // Devolver el artículo actualizado
            return array('success' => true, 'message' => 'Se edito correctamente.', 'articulo' => $editarArticulo);
        } catch (\Exception $e) {
            // Si existe error.
            return array('success' => false, 'message' => $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $borrararticulo = Articulo::findOrFail($id);
            $borrararticulo->delete();
        } catch (\Exception $e) {
            //Si existe error.
            return array('success' => false, 'message' => $e->getMessage());
        } //Si se ejecuta bien.
        return array('success' => true, 'message' => 'Registro eliminado correctamente.');
    }

    //End controller
}
