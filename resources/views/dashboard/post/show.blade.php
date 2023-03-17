@extends('dashboard.master')
@section('content')
    <div class="container">
        <h4 style="margin-top: 0.5em" class="centrar">Publicación {{ $post->id }}</h4>
        <div class="row">
            <br>
            <div class="form-group col-lg-8">
                <label for="title">Titulo</label>
                <input readonly class="form-control" type="text" name="name" id="name" value="{{ $post->name }}">
            </div>
            <div class="col-lg-4">
                <label for="category">Categoria</label>
                <br>
                <input readonly class="form-control" type="text" name="category" id="category" value="{{ $post->category->name }}">
            </div>
            <div style="margin-top: 0.5em" class="form-group col-lg-12">
                <label for="description">Descripción</label>
                <textarea readonly class="form-control" id="description" name="description" rows="3">{{ $post->description }}</textarea>
            </div>
        </div>
        <br> 
           <div class="row center">
            <div class="col s6">
                <a class="btn btn-success btn-sm" href="{{ route('post.index') }}">Regresar</a>
            </div>
        </div>    
    </div>
@endsection
