<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required | min:3'
            ],
            [
                'name.required' => 'El campo nombre no puede estar vacio',
                'name.min'      => 'El campo nombre Requiere un MINIMO de 3 caracteres',
            ]
        );

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success','Categoria creada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $categoria)
    {
      return view('categories.show',compact('categoria'));
    }

    public function edit($id)
    {
        $categoria = Category::find($id);
        return view('categories.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required | min:3'
            ],
            [
                'name.required' => 'El campo nombre no puede estar vacio',
                'name.min'      => 'El campo nombre Requiere un MINIMO de 3 caracteres',
            ]
        );

        $categoria = Category::find($id);
        $categoria->name  = $request->post('name');
        $categoria->save();

        return redirect()->route("categories.index")->with("success", "Actulizado con Exito!!!");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $categoria = Category::find($id)->delete();

        return redirect()->route('categories.index')
                        ->with('success','Categoria eliminada.');
    }
}
