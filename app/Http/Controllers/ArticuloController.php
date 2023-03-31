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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $articulo = Articulo::create($request->all());
        // return $articulo;
        $nuevoArticulo = Articulo::create([
            'titulo' => $request['titulo'],
            'cuerpo' => $request['cuerpo'],
            'autor' => $request['autor']
        ]);
        if ($nuevoArticulo) {
            return array('success' => true, 'message' => 'Se creo correctamente.');
        } else {
            return array('success' => false, 'message' => 'Error al crear.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Articulo::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if (Articulo::where('id', $id)->exists()) {
            $editarArticulo = Articulo::find($id);
            $editarArticulo->fill([
                'titulo' => $request['titulo'],
                'cuerpo' => $request['cuerpo'],
                'autor' => $request['autor']
            ]);
            $editarArticulo->save();

            if ($editarArticulo) {
                return array('success' => true, 'message' => 'Se edito correctamente.');
            } else {
                return array('success' => false, 'message' => 'Error al editar.');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Articulo::where('id', $id)->exists()) {
            $borrararticulo = Articulo::find($id);
            $borrararticulo->delete();

            if ($borrararticulo) {
                return array('success' => true, 'message' => 'Se borro correctamente.');
            } else {
                return array('success' => false, 'message' => 'Error al borrar.');
            }
        }
    }
}
