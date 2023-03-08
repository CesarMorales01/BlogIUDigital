@extends('dashboard.master')
@section('formularioCrearCategoria')
    @include('dashboard.partials.validation-error')

    <div class="container">
        <h4 class="centrar">Crear categoria</h4>
        <form action="{{ route('category.store')}}" method="post">
           @include('dashboard.category._form')
           <div class="row center">
            <div class="col s6">
                <a class="btn btn-danger btn-sm" href="{{ route('categories') }}">Cancelar</a>
                <button class="btn btn-success btn-sm">Crear</button>
            </div>
        </div>    
        </form>
    </div>
@endsection