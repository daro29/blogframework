@extends('layouts.app')

@section('content')
  <div class="container">
        <div class="row  justify-content-center">
          <div class="col-md-8 col-md-offset-4">
            <div class="card">

                @if(session('message'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('message') }}
                </div>
                @endif
                <div class="card-header">
                    Detalles de la etiqueta:
                </div>
                <div class="card-body">
                    <h4>Nombre:</h4>
                    <p><span>{{ $tag->name }}</span></p>

                    <h4>Slug:</h4>
                    <p><span>{{ $tag->slug }}</span></p>
                </div>

                <div class="d-flex justify-content-center">
                    <a class="btn btn btn-outline-secondary mb-2" href="{{ route('tags.index') }}">Regresar</a>
                </div>

            </div>

          </div>
      </div>
  </div>
@endsection
