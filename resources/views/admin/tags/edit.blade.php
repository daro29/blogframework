@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            @include('message.errors')
            @include('message.session')
            <form class="px-4 shadow-lg p-3 mb-5 bg-white rounded p-3 mb-5 bg-white rounded" action="{{ route('tags.update', $tag) }}" method="POST">
                <h1 class="display-6 text-center">Editar Etiqueta</h1>
                <hr>
                @method('PATCH')
                @include('admin.tags.partials._form', ['btn' => 'Editar Etiqueta'])
            </form>
        </div>
    </div>
</div>
@endsection
