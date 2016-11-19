<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Stationery;
use App\Article;
use App\Order;

class StationeryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //solicitamos todas las requisiciones de papeleria del usuario sin aprobar

        $user = $request->user()->id;

        $stationery = Stationery::where('user_id', $user)
                                ->where('estado', 0)
                                ->get();
        
        return view('papeleria.requisicion', compact('stationery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        /* Creamos la solicitud de papeleria */
        

        //$id = $request->user()->id;
        $user = $request->user();

        //instanciamos el modelo relacionado
        $stationery = new Stationery();
        //guardamos el id del usuario en la tabl stationey
        $user->stationeries()->save($stationery);


        //consulta de las requisiciones pendientes
        $user = $request->user()->id;

        $stationery = Stationery::where('user_id', $user)
                                ->where('estado', 0)
                                ->get();

        return view('papeleria.requisicion', compact('stationery'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requisicion = $id;

        //consulta para generar el select de acreedores
        $article = Article::lists('name', 'id');

        //consulta para visualizar los articulos solicitados
        //$orden = Order::where('papeleria_id', $id)->get();
        $orden = Article::find($id)->orders;

        // var_dump($orden);

        return view('papeleria.create', compact('requisicion', 'article', 'orden'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }
}
