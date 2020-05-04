@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            @include('message.errors')

            <form action="{{ route('tags.store') }}" method="POST">
                @include('admin.tags.partials._form', ['btn' => 'Crear etiqueta'])
            </form>
        </div>
    </div>
</div>
@endsection
