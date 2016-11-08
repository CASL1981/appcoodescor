<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\Creditor;

class ArticleController extends Controller
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
        $article = Article::orderBy('name', 'asc')->paginate(10);
        $articles = Article::All();
        //consulta para generar el select de acreedores
        $creditors = Creditor::lists('name', 'id');

        return view('article.create', compact('article', 'articles', 'creditors'));
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
            'name' => 'required|min:3|max:150',
            'unidad' => 'required|max:20',
            'marca' => 'max:20',
            'costo' => 'required',
            'tasa' => 'in:0,5,16',
            );

        $this->validate($request, $rules);

        Article::create($request->All());

        return redirect()->route('article.create');
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
    public function edit(Article $article)
    {
        return view('article.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->update($request->all());
        return redirect()->route('article.create');
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
            
            Article::findOrFail($id)->delete();
            return response()->json([
                'mensaje' => 'Acreedor fue eliminado con exito'
                ]);
        }
        
        return redirect()->route('article.create');
    }
}
