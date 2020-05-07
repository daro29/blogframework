@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            @include('message.errors')

            <form class="px-4 shadow-lg p-3 mb-5 bg-white rounded p-3 mb-5 bg-white rounded" action="{{ route('tags.store') }}" method="POST">
                <h4 class="display-6 text-center">Nueva Etiqueta</h4>
                <hr>
                @include('admin.tags.partials._form', ['btn' => 'Crear etiqueta'])
            </form>
        </div>
    </div>
</div>
@endsection
