@extends('layouts.app')
<div class="content">
</div>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @auth
                Bienvenido al sistema {{ auth()->user()->name }}
                <br>
                Rol id : {{ auth()->user()->rol_id }}
            @endauth
            <br><br>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <!-- {{ auth()->user()->rol }} -->
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br><br>
                    <div style="text-align: center" class="row">
                        <div class="col-6">
                            <a href="{{ route('post.show') }}" class="btn btn-success">Ir a publicaciones</a>
                        </div>
                        @if (auth()->user()->rol_id==1)
                            <div class="col-6">
                                <a href="{{ route('user.index') }}" class="btn btn-success">Módulo usuarios</a>
                            </div>
                        @endif
                       
                    </div>
                   
                    <br><br>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
