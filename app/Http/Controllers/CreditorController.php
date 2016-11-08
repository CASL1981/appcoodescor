<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Creditor;

class CreditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $creditor = Creditor::orderBy('name', 'asc')->paginate(5);
        $creditors = Creditor::All();

        return view('creditor.create', compact('creditor', 'creditors'));
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
            'nit' => 'required|min:7|numeric',            
            'name' => 'required|max:100',
            'formapago' => 'in:Contado,Credito,Anticipo',
            'plazo' => 'digits:2|required_if:formapago,Credito|numeric'
            );

        $this->validate($request, $rules);

        Creditor::create($request->All());

        return redirect()->route('creditor.create');
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
    public function edit(Creditor $creditor)
    {
        return view('creditor.edit', ['creditor' => $creditor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Creditor $creditor)
    {
        $creditor->update($request->all());
        return redirect()->route('creditor.create');
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
            
            Creditor::findOrFail($id)->delete();
            return response()->json([
                'mensaje' => 'Acreedor fue eliminado con exito'
                ]);
        }
        
        return redirect()->route('creditor.create');
    }
}
