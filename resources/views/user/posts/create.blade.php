@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                @include('message.errors')
                <form  accept-charset="UTF-8" enctype="multipart/form-data" class="px-4 shadow-lg p-3 mb-5 bg-white rounded p-3 mb-5 bg-white rounded" action="{{ route('user.posts.store') }}" method="POST">
                    <h4 class="display-6 text-center">Nuevo Articulo</h4>
                    <hr>
                    @include('user.posts.partials._form', ['btn' => 'Crear Entrada'])
                </form>
            </div>
        </div>
    </div>
@endsection
