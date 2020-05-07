@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            @include('message.session')
            <div class="card">
                <div class="card-header">
                    Detallles de la categoria
                </div>
                    <div class="card-body">
                        <h4>Nombre:</h4>
                        <p><span>{{ $category->name }}</span></p>
                        <h4>Slug:</h4>
                        <p><span>{{ $category->slug }}</span></p>
                        <h4>Contenido:</h4>
                        <p><span>{{ $category->body }}</span></p>
                    </div>

                    <div class="d-flex justify-content-center">
                        <a class="btn btn btn-outline-primary btn-lg btn-block mx-2 mb-2" href="{{ route('categories.index') }}">Regresar</a>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
