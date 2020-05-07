@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card">
                @include('message.session')
                <div class="card-header">
                    Listado de categorias
                    <a class="btn btn-primary btn-sm float-right" href="{{ route('categories.create') }}">
                        Crear Categoría
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
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td width=10px>
                                        <a
                                        class="btn btn-outline-info btn-sm"
                                        href="{{ route('categories.show', $category) }}">
                                        Ver
                                        </a>
                                    </td>

                                    <td width=10px>
                                        <a
                                        class="btn btn-outline-dark btn-sm"
                                        href="{{ route('categories.edit', $category) }}">
                                        Editar
                                        </a>
                                    </td>

                                    <td width=10px>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST">
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
                    {{ $categories->render() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
