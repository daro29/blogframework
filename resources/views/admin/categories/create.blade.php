@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                @include('message.errors')
                <form class="px-4 shadow-lg p-3 mb-5 bg-white rounded p-3 mb-5 bg-white rounded" action="{{ route('categories.store') }}" method="POST">
                    <h4 class="display-6 text-center">Nueva Categoría</h4>
                    <hr>
                    @include('admin.categories.partials._form', ['btn' => 'Crear Categoria'])
                </form>
            </div>
        </div>
    </div>
@endsection
