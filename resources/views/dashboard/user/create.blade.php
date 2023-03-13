@extends('dashboard.master')

@section('userCreate')
    @include('dashboard.partials.validation-error')

    <form action="{{ route('user.store') }}" method="POST">
        @include('dashboard.user._form', ['pasw'=>true])

    </form>
@endsection