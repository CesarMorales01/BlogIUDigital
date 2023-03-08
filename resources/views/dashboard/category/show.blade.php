@extends('dashboard.master')
@section('formularioCrearCategoria')
    <h4 class="centrar">Categoria</h4>
        <div class="row">
           <div class="form-group">
               <label for="title">Nombre categoria</label>
                    <input readonly class="form-control" type="text" name="title" id="title" value="{{ $category->name }}">
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="url_clean">Descripción</label>
                    <input readonly class="form-control" name="description" id="description" rows="10" value="{{ $category->description }}"/>
                </div>
            </div> 
            <a class="btn btn-success btn-sm" href="{{ route('categories') }}">Regresar</a>
@endsection      