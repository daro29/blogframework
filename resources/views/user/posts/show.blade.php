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
                        <h4 class="text-primary font-weight-bold text-center">Nombre:</h4>
                        <p class="text-center font-italic"><span>{{ $post->name }}</span></p>

                        <h4 class="text-primary font-weight-bold text-center">Url:</h4>
                        <p class="text-center font-italic"><span>{{ $post->slug }}</span></p>

                        <h4 class="text-primary font-weight-bold text-center">Contenido:</h4>
                        <p class="text-center font-italic"><span>{!! $post->body !!}</span></p>

                        <h4 class="text-primary font-weight-bold text-center">Extracto:</h4>
                        <p class="text-center font-italic"><span>{{ $post->excerpt }}</span></p>

                        <h4 class="text-primary font-weight-bold text-center">Categoria de la entrada:</h4>
                        <p class="text-center font-italic"><span>{{ $post->category->name }}</span></p>

                        <h4 class="text-primary font-weight-bold text-center">Estado de la entrada:</h4>
                        @if($post->status == "PUBLISHED")
                            <p class="text-center font-italic"><span>Publicado</span></p>
                        @else
                            <p class="text-center font-italic"><span>Borrador</span></p>
                        @endif

                        <h4 class="text-primary font-weight-bold text-center">Imagen de la entrada:</h4>
                        @if($post->file)
                            <div class="text-center">
                                <img src="{{ $post->file }}" class="img-fluid border border rounded-sm rounded mx-auto d-block" alt="...">
                            </div>
                        @endif

                    </div>

                    <div class="d-flex justify-content-center">
                        <a class="btn btn btn-outline-primary btn-lg btn-block mx-2 mb-2" href="{{ route('posts.index') }}">Regresar</a>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
