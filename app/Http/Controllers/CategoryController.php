<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestCategory;
use App\Models\CategoryModel;

class CategoryController extends Controller{

    public function __construct() {
        $this->middleware(['auth', 'rol.publicista']);
    }

    public function index() {
        $categorias= CategoryModel::all();
        return view('dashboard.category.index', ['categorias'=>$categorias]);
    }

    public function create(){
        // Retorna la vista para crear
        return view('dashboard.category.create', ['category'=>new CategoryModel()]);
    }

    public function store(RequestCategory $request){
        // Crea la categoria en la base de datos
        $request->validated();
        CategoryModel::create(
            [
                'name'=> $request['name'],
                'description'=> $request['description'], 
                'user'=> auth()->user()->email 
            ]
        );
        $categorias= CategoryModel::all();
        //return response()->json($categorias, 200, []);
        return view('dashboard.category.index', ['categorias'=>$categorias]);
    }

    public function show(CategoryModel $category){
        // vista mostrar una categoria
        return view('dashboard.category.show', ["category"=> $category]);
    }

    public function edit(CategoryModel $category){
        // Se valida el rol del usuario y si es publicista se verifica si es autor de la categoria.
        if(auth()->user()->rol_id==3){
            $this->authorize('autor' ,$category);
        }
        // vista formulario editar
        return view('dashboard.category.edit', ['category'=>$category]);
    }

    public function update(RequestCategory $request, CategoryModel $category){
        // edita en la base de datos
        if(auth()->user()->rol_id==3){
            $this->authorize('autor' ,$category);
        }
        $category->name=$request->name;
        $category->description=$request->description;
        $request->validated();
        $category->save();
        return back()->with('status', 'Categoria actualizada con éxito');
    }

    public function destroy(CategoryModel $category){
        if(auth()->user()->rol_id==3){
            $this->authorize('autor' ,$category);
        }
        $category->delete();
        return back()->with('status', 'Categoria eliminada!');
    }
    // return response()->json($categorias, 200, []);
}
