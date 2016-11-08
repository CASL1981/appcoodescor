<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests;
use App\User;


class UserController extends Controller
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
        $user = User::paginate(5);

        return view('auth.create', compact('user'));
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
            'co' => 'required',            
            'nick' => 'required|max:20',
            'name' => 'required|max:100',
            'email' => 'required|email|max:255|unique:users',
            'area' => 'required|in:Administracion,Comercial,Farmacias',
            );

        $this->validate($request, $rules);

        // User::create($request->All());

        $user = new User();

        $user->name = $request->name;
        $user->nick = $request->nick;
        $user->co = $request->co;
        $user->area = $request->area;
        $user->email = $request->email;
        $user->password = Hash::make('12345');
        $user->save();

        return redirect()->route('mantenimiento.User.create');
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
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('auth.edit', compact('user'));
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
        
        $user = User::findOrFail($id)->update($request->All());

        return redirect()->route('mantenimiento.User.create');
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
            $user = User::findOrFail($id)->delete();

            return response()->json([
                'mensaje' => 'Usuario fue eliminado con exito'
                ]);
        }

        

        return redirect()->route('mantenimiento.User.create');
    }
}
