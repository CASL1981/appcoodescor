<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Co;

class CoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $co = Co::orderBy('codigo', 'asc')->paginate(5);
        $cos = Co::All();

        return view('co.create', compact('co', 'cos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'codigo' => 'required|min:3|max:3',            
            'nombre' => 'required|max:100',          
            );

        $this->validate($request, $rules);

        Co::create($request->All());

        return redirect()->route('mantenimiento.Co.create');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Co $Co)
    {
        return view('co.edit', ['Co' => $Co]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Co $Co)
    {
        $Co->update($request->All());
        return redirect()->route('mantenimiento.Co.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            
            Co::findOrFail($id)->delete();
            return response()->json([
                'mensaje' => 'Centro de Operación fue eliminado con exito'
                ]);
        }
        
        return redirect()->route('mantenimiento.Co.create');
    }
}
