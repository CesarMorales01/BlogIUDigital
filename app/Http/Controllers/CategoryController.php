<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestCategory;
use App\Models\CategoryModel;

class CategoryController extends Controller{

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
        CategoryModel::create($request->validated());
        $categorias= CategoryModel::all();
        return view('dashboard.category.index', ['categorias'=>$categorias]);
    }


    public function show(CategoryModel $category){
        // vista mostrar una categoria
        return view('dashboard.category.show', ["category"=> $category]);
    }

    public function edit(CategoryModel $category){
        // vista formulario editar
        return view('dashboard.category.edit', ['category'=>$category]);
    }

    public function update(RequestCategory $request, CategoryModel $category){
        // edita en la base de datos
        $category->name=$request->name;
        $category->description=$request->description;
        $request->validated();
        $category->save();
       // return view('dashboard.category.show', ["category"=> $category]);
        return back()->with('status', 'Categoria actualizada con éxito');
    }

    public function destroy(CategoryModel $category){
        $category->delete();
        return back()->with('status', 'Categoria eliminada!');
    }
}
