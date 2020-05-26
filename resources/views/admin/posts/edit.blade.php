@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            {{-- {{ dd($post) }} --}}
            @include('message.errors')
            @include('message.session')
            <form enctype="multipart/form-data"  accept-charset="UTF-8" class="px-4 shadow-lg p-3 mb-5 bg-white rounded p-3 mb-5 bg-white rounded" action="{{ route('posts.update', $post) }}" method="POST">
                <h1 class="display-6 text-center">Editar Entrada</h1>
                <hr>
                @method('PATCH')
                @include('admin.posts.partials._form', ['btn' => 'Editar Entrada'])
            </form>
        </div>
    </div>
</div>
@endsection
