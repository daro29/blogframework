@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card">
                @include('message.session')
                <div class="card-header">
                    Listado de Entradas
                    <a class="btn btn-primary btn-sm float-right" href="{{ route('posts.create') }}">
                        Crear Entrada
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th class="text-center" colspan="3">Acciones:</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->name }}</td>
                                    <td width=10px>
                                        <a
                                        class="btn btn-outline-info btn-sm"
                                        href="{{ route('posts.show', $post) }}">
                                        Ver
                                        </a>
                                    </td>

                                    <td width=10px>
                                        <a
                                        class="btn btn-outline-dark btn-sm"
                                        href="{{ route('posts.edit', $post) }}">
                                        Editar
                                        </a>
                                    </td>

                                    <td width=10px>
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                            @method('DElETE')
                                            @csrf
                                            <input
                                            class="btn btn-outline-danger btn-sm"
                                            type="submit"
                                            value="Eliminar">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $posts->render() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
