<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller{
    
    public function __construct() {
        $this->middleware(['auth']);
        $this->middleware(['permission:ver-categorias'])->only('index');
        $this->middleware(['permission:crear-categorias'])->only('create', 'store');
        $this->middleware(['permission:editar-categorias'])->only('edit', 'update');
        $this->middleware(['permission:eliminar-categorias'])->only('destroy');
    }

    public function index() {
        $categorias= Category::all();
        return view('dashboard.category.index', ['categorias'=>$categorias]);
    }

    public function create(){
        return view('dashboard.category.create', ['category'=>new Category()]);
    }

    public function store(RequestCategory $request){
        $request->validated();
        Category::create(
            [
                'name'=> $request['name'],
                'description'=> $request['description'], 
                'user'=> auth()->user()->email 
            ]
        );
        $categorias= Category::all();
        return view('dashboard.category.index', ['categorias'=>$categorias]);
    }

    public function show(Category $category){
        return view('dashboard.category.show', ["category"=> $category]);
    }

    public function edit(Category $category){
        // Se valida el rol del usuario y si es publicista se verifica si es autor de la categoria.
        return view('dashboard.category.edit', ['category'=>$category]);
    }

    public function update(RequestCategory $request, Category $category){
        $category->name=$request->name;
        $category->description=$request->description;
        $request->validated();
        $category->save();
        return back()->with('status', 'Categoria actualizada con éxito');
    }

    public function destroy(Category $category){
           /*
           if(auth()->user()->email!=$category->user){
             return back()->with('status', 'El rol publicista solo puede eliminar las propias categorias!'); 
           }
        */
        $category->delete();
        return back()->with('status', 'Categoria eliminada!');
    }

    // return response()->json($categorias, 200, []);
    // php artisan cache:clear
    // php artisan view:clear
    // php artisan config:clear
    // php artisan route:clear
	// composer dump-autoload -o
	// php artisan serve --host 192.168.20.20
	// npm run dev -- --host=192.168.20.20
}
